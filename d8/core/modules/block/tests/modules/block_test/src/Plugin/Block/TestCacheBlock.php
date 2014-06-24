<?php

/**
 * @file
 * Contains \Drupal\block_test\Plugin\Block\TestCacheBlock.
 */

namespace Drupal\block_test\Plugin\Block;

use Drupal\block\BlockBase;

/**
 * Provides a block to test caching.
 *
 * @Block(
 *   id = "test_cache",
 *   admin_label = @Translation("Test block caching")
 * )
 */
class TestCacheBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $content = \Drupal::state()->get('block_test.content');

    $build = array();
    if (!empty($content)) {
      $build['#markup'] = $content;
    }
    return $build;
  }

}
