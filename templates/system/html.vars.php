<?php
/**
 * @file
 * Stub file for "html" theme hook [pre]process functions.
 */

/**
 * Pre-processes variables for the "html" theme hook.
 *
 * See template for list of available variables.
 *
 * @see html.tpl.php
 *
 * @ingroup theme_preprocess
 */
function mindgrub_subtheme_preprocess_html(&$variables) {

  // Add Google Font using WebFont Loader.
  drupal_add_js('https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js', array('type' => 'external'));
  drupal_add_js("WebFont.load({google: {families: ['Lato:300,400,700']}});", array('type' => 'inline'));

  // Add class for view pages.
  if (function_exists('views_get_page_view') && $view = views_get_page_view()) {
    $variables['classes_array'][] = 'view-page';
    $variables['classes_array'][] = drupal_html_class('view-page-' . $view->name);
  }

  // Add class for active and inactive regions.
  if (isset($variables['page'])) {
    $theme_regions = array_keys(system_region_list('mindgrub_subtheme'));
    $page_regions = element_children($variables['page']);
    foreach ($page_regions as $page_region) {
      $variables['classes_array'][] = drupal_html_class('has-region-' . $page_region);
    }
    $missing_regions = array_diff($theme_regions, $page_regions);
    foreach ($missing_regions as $missing_region) {
      $variables['classes_array'][] = drupal_html_class('no-region-' . $missing_region);
    }
  }

}
