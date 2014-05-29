<?php

/**
 * @file
 * Contains \Drupal\field\Tests\FieldImportDeleteUninstallUiTest.
 */

namespace Drupal\field\Tests;

/**
 * Tests config sync of deleting fields and instances and uninstalling modules.
 *
 * @see \Drupal\field\ConfigImporterFieldPurger
 * @see field_config_import_steps_alter()
 * @see field_form_config_admin_import_form_alter()
 */
class FieldImportDeleteUninstallUiTest extends FieldTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = array('entity_test', 'telephone', 'config', 'filter', 'text');

  public static function getInfo() {
    return array(
      'name' => 'Field config delete and uninstall UI tests',
      'description' => 'Delete field and instances during config synchronization and uninstall module that provides the field type through the UI.',
      'group' => 'Field API',
    );
  }

  function setUp() {
    parent::setUp();

    $this->web_user = $this->drupalCreateUser(array('synchronize configuration'));
    $this->drupalLogin($this->web_user);
  }

  /**
   * Tests deleting fields and instances as part of config import.
   */
  public function testImportDeleteUninstall() {
    // Create a telephone field and instance.
    $field = entity_create('field_config', array(
      'name' => 'field_tel',
      'entity_type' => 'entity_test',
      'type' => 'telephone',
    ));
    $field->save();
    $tel_field_uuid = $field->uuid();
    entity_create('field_instance_config', array(
      'entity_type' => 'entity_test',
      'field_name' => 'field_tel',
      'bundle' => 'entity_test',
    ))->save();

    // Create a text field and instance.
    $text_field = entity_create('field_config', array(
      'name' => 'field_text',
      'entity_type' => 'entity_test',
      'type' => 'text',
    ));
    $text_field->save();
    $text_field_uuid = $field->uuid();
    entity_create('field_instance_config', array(
      'entity_type' => 'entity_test',
      'field_name' => 'field_text',
      'bundle' => 'entity_test',
    ))->save();

    // Create an entity which has values for the telephone and text field.
    $entity = entity_create('entity_test');
    $value = '+0123456789';
    $entity->field_tel = $value;
    $entity->field_text = $this->randomName(20);
    $entity->name->value = $this->randomName();
    $entity->save();

    // Delete the text field before exporting configuration so that we can test
    // that deleted fields that are provided by modules that will be uninstalled
    // are also purged and that the UI message includes such fields.
    $text_field->delete();

    // Verify entity has been created properly.
    $id = $entity->id();
    $entity = entity_load('entity_test', $id);
    $this->assertEqual($entity->field_tel->value, $value);
    $this->assertEqual($entity->field_tel[0]->value, $value);

    $active = $this->container->get('config.storage');
    $staging = $this->container->get('config.storage.staging');
    $this->copyConfig($active, $staging);

    // Stage uninstall of the Telephone module.
    $core_extension = \Drupal::config('core.extension')->get();
    unset($core_extension['module']['telephone']);
    $staging->write('core.extension', $core_extension);

    // Stage the field deletion
    $staging->delete('field.field.entity_test.field_tel');
    $staging->delete('field.instance.entity_test.entity_test.field_tel');
    $this->drupalGet('admin/config/development/configuration');
    // Test that the message for one field being purged during a configuration
    // synchronization is correct.
    $this->assertText('This synchronization will delete data from the field entity_test.field_tel.');

    // Stage an uninstall of the text module to test the message for multiple
    // fields.
    unset($core_extension['module']['text']);
    $staging->write('core.extension', $core_extension);
    $this->drupalGet('admin/config/development/configuration');
    $this->assertText('This synchronization will delete data from the fields: entity_test.field_tel, entity_test.field_text.');

    // This will purge all the data, delete the field and uninstall the
    // Telephone and Text modules.
    $this->drupalPostForm(NULL, array(), t('Import all'));
    $this->assertNoText('Field data will be deleted by this synchronization.');
    $this->rebuildContainer();
    $this->assertFalse(\Drupal::moduleHandler()->moduleExists('telephone'));
    $this->assertFalse(entity_load_by_uuid('field_config', $tel_field_uuid), 'The telephone field has been deleted by the configuration synchronization');
    $deleted_fields = \Drupal::state()->get('field.field.deleted') ?: array();
    $this->assertFalse(isset($deleted_fields[$tel_field_uuid]), 'Telephone field has been completed removed from the system.');
    $this->assertFalse(isset($deleted_fields[$text_field_uuid]), 'Text field has been completed removed from the system.');
  }

}
