<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

// Add includes that aren't overriding Bootstrap files/functions.
foreach (glob(dirname(__FILE__) . '/inc/*') as $filename) {
    include_once $filename;
}
