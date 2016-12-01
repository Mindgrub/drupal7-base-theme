<?php

/**
 * Implements hook_preprocess_entity().
 */
function mindgrub_subtheme_preprocess_entity(&$variables) {
  $elements = $variables['elements'];

  if (!empty($elements['#entity_type'])) {
    $type = $elements['#entity_type'];
    // Add a combo entity type/view mode class to all entities for easier theming.
    $variables['classes_array'][] = drupal_html_class($type . '-' . $variables['view_mode']);
    if (!empty($elements['#bundle'])) {
      $variables['classes_array'][] = drupal_html_class($type . '-' . $elements['#bundle']);
    }
  }

}