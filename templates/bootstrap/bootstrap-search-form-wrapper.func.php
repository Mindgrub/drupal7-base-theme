<?php
/**
 * @file
 * Stub file for bootstrap_bootstrap_search_form_wrapper().
 */

/**
 * Returns HTML for the Bootstrap search form wrapper.
 *
 * @ingroup theme_functions
 */
function mindgrub_subtheme_bootstrap_search_form_wrapper($variables) {
  return $variables['element']['#children'] .
    '<button type="submit" class="btn btn-link btn-search">' .
    '<i class="glyphicon glyphicon-search"></i>' .
    '<span class="btn-text">' . t('Search') .
    '</span></button>';
}
