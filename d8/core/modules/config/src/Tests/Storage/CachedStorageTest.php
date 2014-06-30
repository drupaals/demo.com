<?php

/**
 * @file
 * Definition of Drupal\config\Tests\Storage\CachedStorageTest.
 */

namespace Drupal\config\Tests\Storage;

use Drupal\Core\Config\FileStorage;
use Drupal\Core\Config\CachedStorage;
use Drupal\Core\Database\Database;
use Drupal\Core\DependencyInjection\ContainerBuilder;

/**
 * Tests CachedStorage operations.
 */
class CachedStorageTest extends ConfigStorageTestBase {

  /**
   * The cache backend the cached storage is using.
   *
   * @var \Drupal\Core\Cache\CacheBackendInterface
   */
  protected $cache;

  /**
   * The file storage the cached storage is using.
   *
   * @var \Drupal\Core\Config\FileStorage
   */
  protected $filestorage;

  public static function getInfo() {
    return array(
      'name' => 'CachedStorage operations',
      'description' => 'Tests CachedStorage operations.',
      'group' => 'Configuration',
    );
  }

  function setUp() {
    parent::setUp();
    $this->filestorage = new FileStorage($this->configDirectories[CONFIG_ACTIVE_DIRECTORY]);
    $this->storage = new CachedStorage($this->filestorage, \Drupal::service('cache_factory'));
    $this->cache = \Drupal::service('cache_factory')->get('config');
    // ::listAll() verifications require other configuration data to exist.
    $this->storage->write('system.performance', array());
  }

  /**
   * {@inheritdoc}
   */
  public function testInvalidStorage() {
    // No-op as this test does not make sense.
  }

  /**
   * {@inheritdoc}
   */
  protected function read($name) {
    $data = $this->cache->get($name);
    // Cache misses fall through to the underlying storage.
    return $data ? $data->data : $this->filestorage->read($name);
  }

  /**
   * {@inheritdoc}
   */
  protected function insert($name, $data) {
    $this->filestorage->write($name, $data);
    $this->cache->set($name, $data);
  }

  /**
   * {@inheritdoc}
   */
  protected function update($name, $data) {
    $this->filestorage->write($name, $data);
    $this->cache->set($name, $data);
  }

  /**
   * {@inheritdoc}
   */
  protected function delete($name) {
    $this->cache->delete($name);
    unlink($this->filestorage->getFilePath($name));
  }

  /**
   * {@inheritdoc}
   */
  public function containerBuild(ContainerBuilder $container) {
    parent::containerBuild($container);
    // Use the regular database cache backend to aid testing.
    $container->register('cache_factory', 'Drupal\Core\Cache\DatabaseBackendFactory')
      ->addArgument(Database::getConnection());
  }

}
