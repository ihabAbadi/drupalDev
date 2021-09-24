<?php

namespace Drupal\module_with_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Product entity type entity.
 *
 * @ConfigEntityType(
 *   id = "product_entity_type",
 *   label = @Translation("Product entity type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\module_with_entity\ProductEntityTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\module_with_entity\Form\ProductEntityTypeForm",
 *       "edit" = "Drupal\module_with_entity\Form\ProductEntityTypeForm",
 *       "delete" = "Drupal\module_with_entity\Form\ProductEntityTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\module_with_entity\ProductEntityTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "product_entity_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "product_entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/product_entity_type/{product_entity_type}",
 *     "add-form" = "/admin/structure/product_entity_type/add",
 *     "edit-form" = "/admin/structure/product_entity_type/{product_entity_type}/edit",
 *     "delete-form" = "/admin/structure/product_entity_type/{product_entity_type}/delete",
 *     "collection" = "/admin/structure/product_entity_type"
 *   },
 *   config_export = {
 *      "id", "label"
 *    }
 * )
 */
class ProductEntityType extends ConfigEntityBundleBase implements ProductEntityTypeInterface {

  /**
   * The Product entity type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Product entity type label.
   *
   * @var string
   */
  protected $label;

}
