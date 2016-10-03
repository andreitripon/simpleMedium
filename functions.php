<?php
/**
 * simpleMedium functions
 *
 * @package WordPress
 * @subpackage simpleMedium
 * @since 1.0
 * @author Andrei Tripon <contact@andreitripon.ro>
 */

/**
 * Config
 */
define('SM_DOMAIN', 'simpleMedium');

/**
 * Autoloading
 */
require get_template_directory() . '/vendor/autoload.php';

/**
 * Main instance of simpleMedium.
 *
 * Returns the main instance of simpleMedium to prevent the need to use globals.
 *
 * @since 1.0
 * @return
 */
function initSimpleMedium(){
    return new simpleMediumCore\Bootstrap();
}

// Global for backwards compatibility.
$GLOBALS['initSimpleMedium'] = initSimpleMedium();