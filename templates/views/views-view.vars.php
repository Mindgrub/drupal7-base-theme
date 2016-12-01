<?php

/**
 * Implements template_preprocess_views_view().
 */
function mindgrub_subtheme_preprocess_views_view(&$variables) {
  template_preprocess_views_view($variables);
  $view = $variables['view'];
  $display_handler = $view->display_handler;
  $display_plugin = $display_handler->get_plugin();

  // Add the view name + current display as a class to the view
  $variables['classes_array'][] = drupal_html_class('view-' . $view->name . '-' . $view->current_display);

  // Add display plugin to view as a class.
  $variables['classes_array'][] = drupal_html_class('views-display-' . $display_plugin->plugin_name);
}