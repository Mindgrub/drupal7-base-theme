<?php

/**
 * Implements template_preprocess_node().
 */
function mindgrub_subtheme_preprocess_node(&$variables) {
  $type = $variables['type'];
  $view_mode = $variables['view_mode'];

  // Add combo content type/view mode class for easier theming.
  $variables['classes_array'][] = drupal_html_class('node-' . $type . '-' . $view_mode);
}

