<?php

namespace Drupal\module_with_entity\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Product entity entities.
 *
 * @ingroup module_with_entity
 */
interface ProductEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Product entity name.
   *
   * @return string
   *   Name of the Product entity.
   */
  public function getName();

  /**
   * Sets the Product entity name.
   *
   * @param string $name
   *   The Product entity name.
   *
   * @return \Drupal\module_with_entity\Entity\ProductEntityInterface
   *   The called Product entity entity.
   */
  public function setName($name);

  /**
   * Gets the Product entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Product entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Product entity creation timestamp.
   *
   * @param int $timestamp
   *   The Product entity creation timestamp.
   *
   * @return \Drupal\module_with_entity\Entity\ProductEntityInterface
   *   The called Product entity entity.
   */
  public function setCreatedTime($timestamp);

}
