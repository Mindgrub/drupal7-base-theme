<?php
/**
 * @file
 * Stub file for "region" theme hook [pre]process functions.
 */

/**
 * Pre-processes variables for the "region" theme hook.
 *
 * See template for list of available variables.
 *
 * @see region.tpl.php
 *
 * @ingroup theme_preprocess
 */
function mindgrub_subtheme_preprocess_region(&$variables) {
  global $theme;

  $region = $variables['region'];
  $classes = &$variables['classes_array'];
  $region_attributes = [];

  switch($region) {
    case 'help':
      if (!empty($variables['content'])) {
        $variables['content'] = _bootstrap_icon('question-sign') . $variables['content'];
        $classes[] = 'alert';
        $classes[] = 'alert-info';
        $classes[] = 'messages';
        $classes[] = 'info';
      }
      break;
    case 'sidebar_first':
    case 'sidebar_second':
      $variables['region_wrapper'] = 'aside';
      $region_attributes['role'] = 'complementary';
      break;
    case 'footer':
      $variables['region_wrapper'] = 'footer';
      break;
    default:
      $variables['region_wrapper'] = 'section';
      break;
  }

  $variables['region_attributes'] = drupal_attributes($region_attributes);

  // Support for "well" classes in regions.
  static $wells;
  if (!isset($wells)) {
    foreach (system_region_list($theme) as $name => $title) {
      $wells[$name] = bootstrap_setting('region_well-' . $name);
    }
  }
  if (!empty($wells[$region])) {
    $classes[] = $wells[$region];
  }
}
