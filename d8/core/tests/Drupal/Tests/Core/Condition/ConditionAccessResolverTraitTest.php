<?php

/**
 * @file
 * Contains \Drupal\Tests\Core\Condition\ConditionAccessResolverTraitTest.
 */

namespace Drupal\Tests\Core\Condition;

use Drupal\Component\Plugin\Exception\ContextException;
use Drupal\Core\Condition\ConditionAccessResolverTrait;
use Drupal\Tests\UnitTestCase;

/**
 * Tests resolving a set of conditions.
 *
 * @coversDefaultClass \Drupal\Core\Condition\ConditionAccessResolverTrait
 *
 * @group Drupal
 * @group Condition
 */
class ConditionAccessResolverTraitTest extends UnitTestCase {

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => 'Tests resolving a set of conditions',
      'description' => '',
      'group' => 'Condition',
    );
  }

  /**
   * Tests the resolveConditions() method.
   *
   * @covers ::resolveConditions
   *
   * @dataProvider providerTestResolveConditions
   */
  public function testResolveConditions($conditions, $logic, $expected) {
    $trait_object = new TestConditionAccessResolverTrait();
    $this->assertEquals($expected, $trait_object->resolveConditions($conditions, $logic));
  }

  public function providerTestResolveConditions() {
    $data = array();

    $condition_true = $this->getMock('Drupal\Core\Condition\ConditionInterface');
    $condition_true->expects($this->any())
      ->method('execute')
      ->will($this->returnValue(TRUE));
    $condition_false = $this->getMock('Drupal\Core\Condition\ConditionInterface');
    $condition_false->expects($this->any())
      ->method('execute')
      ->will($this->returnValue(FALSE));
    $condition_exception = $this->getMock('Drupal\Core\Condition\ConditionInterface');
    $condition_exception->expects($this->any())
      ->method('execute')
      ->will($this->throwException(new ContextException()));

    $conditions = array();
    $data[] = array($conditions, 'and', TRUE);
    $data[] = array($conditions, 'or', FALSE);

    $conditions = array($condition_false);
    $data[] = array($conditions, 'or', FALSE);
    $data[] = array($conditions, 'and', FALSE);

    $conditions = array($condition_true);
    $data[] = array($conditions, 'or', TRUE);
    $data[] = array($conditions, 'and', TRUE);

    $conditions = array($condition_true, $condition_false);
    $data[] = array($conditions, 'or', TRUE);
    $data[] = array($conditions, 'and', FALSE);

    $conditions = array($condition_exception);
    $data[] = array($conditions, 'or', FALSE);
    $data[] = array($conditions, 'and', FALSE);

    $conditions = array($condition_true, $condition_exception);
    $data[] = array($conditions, 'or', TRUE);
    $data[] = array($conditions, 'and', FALSE);

    $conditions = array($condition_exception, $condition_true);
    $data[] = array($conditions, 'or', TRUE);
    $data[] = array($conditions, 'and', FALSE);

    $conditions = array($condition_false, $condition_exception);
    $data[] = array($conditions, 'or', FALSE);
    $data[] = array($conditions, 'and', FALSE);

    $conditions = array($condition_exception, $condition_false);
    $data[] = array($conditions, 'or', FALSE);
    $data[] = array($conditions, 'and', FALSE);
    return $data;
  }

}

class TestConditionAccessResolverTrait {
  use \Drupal\Core\Condition\ConditionAccessResolverTrait {
    resolveConditions as public;
  }
}
