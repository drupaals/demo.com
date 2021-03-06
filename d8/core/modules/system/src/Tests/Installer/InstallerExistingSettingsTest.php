<?php

/**
 * @file
 * Contains \Drupal\system\Tests\Installer\InstallerExistingSettingsTest.
 */

namespace Drupal\system\Tests\Installer;

use Drupal\simpletest\InstallerTestBase;
use Drupal\Core\Database\Database;

/**
 * Tests the installer to make sure existing values in settings.php appear.
 */
class InstallerExistingSettingsTest extends InstallerTestBase {

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => 'Installer existing settings',
      'description' => 'Tests the installer with an existing settings file.',
      'group' => 'Installer',
    );
  }

  /**
   * {@inheritdoc}
   *
   * Fully configures a preexisting settings.php file before invoking the
   * interactive installer.
   */
  protected function setUp() {
    // Pre-configure hash salt.
    // Any string is valid, so simply use the class name of this test.
    $this->settings['settings']['hash_salt'] = (object) array(
      'value' => __CLASS__,
      'required' => TRUE,
    );

    // Pre-configure database credentials.
    $connection_info = Database::getConnectionInfo();
    unset($connection_info['default']['pdo']);
    unset($connection_info['default']['init_commands']);

    $this->settings['databases']['default'] = (object) array(
      'value' => $connection_info,
      'required' => TRUE,
    );

    // Pre-configure config directories.
    $this->settings['config_directories'] = array(
      CONFIG_ACTIVE_DIRECTORY => (object) array(
        'value' => conf_path() . '/files/config_active',
        'required' => TRUE,
      ),
      CONFIG_STAGING_DIRECTORY => (object) array(
        'value' => conf_path() . '/files/config_staging',
        'required' => TRUE,
      ),
    );
    mkdir($this->settings['config_directories'][CONFIG_ACTIVE_DIRECTORY]->value, 0777, TRUE);
    mkdir($this->settings['config_directories'][CONFIG_STAGING_DIRECTORY]->value, 0777, TRUE);

    parent::setUp();
  }

  /**
   * {@inheritdoc}
   */
  protected function setUpSettings() {
    // This step should not appear, since settings.php is fully configured
    // already.
  }

  /**
   * Verifies that installation succeeded.
   */
  public function testInstaller() {
    $this->assertUrl('user/1');
    $this->assertResponse(200);
  }

}
