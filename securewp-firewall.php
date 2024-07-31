<?php

/*
Plugin Name: SecureWP Firewall
Description: A security plugin to enhance WordPress security by implementing a firewall and adding necessary security headers.
Version: 1.0
Author: Tarek Tarabichi
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/firewall.php';
require_once plugin_dir_path(__FILE__) . 'includes/security-headers.php';

// Initialize the plugin
function securewp_init()
{
    SecureWP_Firewall::init();
    SecureWP_Security_Headers::init();
}
add_action('init', 'securewp_init');