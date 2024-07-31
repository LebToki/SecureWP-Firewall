<?php

/*
Plugin Name: SecureWP Firewall
Description: A security plugin to enhance WordPress security by implementing a firewall and adding necessary security headers.
Version: 1.0
Author: Tarek Tarabichi
 */

class SecureWP_Security_Headers
{
    public static function init()
    {
        add_action('send_headers', array(__CLASS__, 'add_security_headers'));
    }

    public static function add_security_headers()
    {
        header("Content-Security-Policy: default-src 'self'");
        header("Permissions-Policy: geolocation 'self'");
        header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
        header("X-Content-Type-Options: nosniff");
        header("X-Permitted-Cross-Domain-Policies: none");
    }
}