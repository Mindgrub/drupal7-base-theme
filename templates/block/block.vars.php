<?php
/**
 * @file
 * Stub file for "block" theme hook [pre]process functions.
 */

/**
 * Pre-processes variables for the "block" theme hook.
 *
 * See template for list of available variables.
 *
 * @see block.tpl.php
 *
 * @ingroup theme_preprocess
 */
function mindgrub_subtheme_preprocess_block(&$variables) {
  $block = $variables['elements']['#block'];
  $variables['title_element'] = 'h2';
  // Use a bare template for the page's main content.
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'][] = 'block__no_wrapper';
  }
  $variables['title_attributes_array']['class'][] = 'block-title';

  // Add a class for block region.
  $variables['classes_array'][] = drupal_html_class('block-region-' . $block->region);

  // Add a class for block delta.
  $variables['classes_array'][] = drupal_html_class('block-' . $block->bid);

  // Remove block titles for nav regions.
  if ($block->region == 'navigation' || $block->region == 'footer') {
    $variables['title'] = '';
  }

  if ($block->delta == 'main-menu') {
    $menu_tree = menu_tree($block->delta);
    $menu_tree['#theme_wrappers'] = ['menu_tree__primary'];
    $variables['content'] = drupal_render($menu_tree);
  }
}
