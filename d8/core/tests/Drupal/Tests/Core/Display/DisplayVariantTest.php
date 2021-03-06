<?php

/**
 * @file
 * Contains \Drupal\Tests\Core\Display\DisplayVariantTest.
 */

namespace Drupal\Tests\Core\Display;

use Drupal\Tests\UnitTestCase;

/**
 * Tests the base variant plugin.
 *
 * @coversDefaultClass \Drupal\Core\Display\VariantBase
 *
 * @group Drupal
 * @group Display
 */
class DisplayVariantTest extends UnitTestCase {

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => 'Display variant',
      'description' => '',
      'group' => 'Display variant',
    );
  }

  /**
   * Sets up a display variant plugin for testing.
   *
   * @param array $configuration
   *   An array of plugin configuration.
   * @param array $definition
   *   The plugin definition array.
   *
   * @return \Drupal\Core\Display\VariantBase|\PHPUnit_Framework_MockObject_MockObject
   *   A mocked display variant plugin.
   */
  public function setUpDisplayVariant($configuration = array(), $definition = array()) {
    return $this->getMockBuilder('Drupal\Core\Display\VariantBase')
      ->setConstructorArgs(array($configuration, 'test', $definition))
      ->setMethods(array('build'))
      ->getMock();
  }

  /**
   * Tests the label() method.
   *
   * @covers ::label
   */
  public function testLabel() {
    $display_variant = $this->setUpDisplayVariant(array('label' => 'foo'));
    $this->assertSame('foo', $display_variant->label());
  }

  /**
   * Tests the label() method using a default value.
   *
   * @covers ::label
   */
  public function testLabelDefault() {
    $display_variant = $this->setUpDisplayVariant();
    $this->assertSame('', $display_variant->label());
  }

  /**
   * Tests the getWeight() method.
   *
   * @covers ::getWeight
   */
  public function testGetWeight() {
    $display_variant = $this->setUpDisplayVariant(array('weight' => 5));
    $this->assertSame(5, $display_variant->getWeight());
  }

  /**
   * Tests the getWeight() method using a default value.
   *
   * @covers ::getWeight
   */
  public function testGetWeightDefault() {
    $display_variant = $this->setUpDisplayVariant();
    $this->assertSame(0, $display_variant->getWeight());
  }

  /**
   * Tests the getConfiguration() method.
   *
   * @covers ::getConfiguration
   *
   * @dataProvider providerTestGetConfiguration
   */
  public function testGetConfiguration($configuration, $expected) {
    $display_variant = $this->setUpDisplayVariant($configuration);

    $this->assertSame($expected, $display_variant->getConfiguration());
  }

  /**
   * Provides test data for testGetConfiguration().
   */
  public function providerTestGetConfiguration() {
    $data = array();
    $data[] = array(
      array(),
      array(
        'id' => 'test',
        'label' => '',
        'uuid' => '',
        'weight' => 0,
      ),
    );
    $data[] = array(
      array('label' => 'Test'),
      array(
        'id' => 'test',
        'label' => 'Test',
        'uuid' => '',
        'weight' => 0,
      ),
    );
    $data[] = array(
      array('id' => 'foo'),
      array(
        'id' => 'test',
        'label' => '',
        'uuid' => '',
        'weight' => 0,
      ),
    );
    return $data;
  }

  /**
   * Tests the access() method.
   *
   * @covers ::access
   */
  public function testAccess() {
    $display_variant = $this->setUpDisplayVariant();
    $this->assertTrue($display_variant->access());
  }

  /**
   * Tests the submitConfigurationForm() method.
   *
   * @covers ::submitConfigurationForm
   */
  public function testSubmitConfigurationForm() {
    $display_variant = $this->setUpDisplayVariant();
    $this->assertSame('', $display_variant->label());

    $form = array();
    $label = $this->randomName();
    $form_state['values']['label'] = $label;
    $display_variant->submitConfigurationForm($form, $form_state);
    $this->assertSame($label, $display_variant->label());
  }

}
