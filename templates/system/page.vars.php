<?php
/**
 * @file
 * Stub file for "page" theme hook [pre]process functions.
 */

/**
 * Pre-processes variables for the "page" theme hook.
 *
 * See template for list of available variables.
 *
 * @see page.tpl.php
 *
 * @ingroup theme_preprocess
 */
function mindgrub_subtheme_preprocess_page(&$variables) {

  if (theme_get_setting('default_logo')) {
    // Try to use an SVG logo so we can be sure it's not blurry.
    $logo = file_create_url(drupal_get_path('theme', 'mindgrub_subtheme') . '/logo.svg');
    if (file_exists($logo)) {
      $variables['logo'] = $logo;
    }
  }

  // Navbar classes.
  if (bootstrap_setting('navbar_position') !== '') {
    $variables['navbar_classes_array'][] = 'navbar-' . bootstrap_setting('navbar_position');
  }
  elseif (bootstrap_setting('fluid_container') == 1) {
    $variables['navbar_classes_array'][] = 'container-fluid';
  }
  else {
    $variables['navbar_classes_array'][] = 'container';
  }
  if (bootstrap_setting('navbar_inverse')) {
    $variables['navbar_classes_array'][] = 'navbar-inverse';
  }
  else {
    $variables['navbar_classes_array'][] = 'navbar-default';
  }
}