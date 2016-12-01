<?php

/**
 * Implements hook_css_alter().
 */
function mindgrub_subtheme_css_alter(&$css) {
  // Remove invasive styles provided by modules.
  unset($css[drupal_get_path('module', 'field') . '/theme/field.css']);
  unset($css[drupal_get_path('module', 'node') . '/node.css']);
  unset($css[drupal_get_path('module', 'views') . '/css/views.css']);
}
