<?php

/*
Plugin Name: SecureWP Firewall
Description: A security plugin to enhance WordPress security by implementing a firewall and adding necessary security headers.
Version: 1.0
Author: Tarek Tarabichi
 */

class SecureWP_Firewall
{
    public static function init()
    {
        add_action('wp', array(__CLASS__, 'block_malicious_requests'));
    }

    public static function block_malicious_requests()
    {
        $headers = getallheaders();
        $blocked_headers = array('malicious_header_1', 'malicious_header_2');
        $blocked_cookies = array('malicious_cookie_1', 'malicious_cookie_2');
        $blocked_globals = array('malicious_global_1', 'malicious_global_2');

        foreach ($headers as $header => $value) {
            if (in_array($header, $blocked_headers)) {
                self::block_request();
            }
        }

        foreach ($_COOKIE as $cookie => $value) {
            if (in_array($cookie, $blocked_cookies)) {
                self::block_request();
            }
        }

        foreach ($GLOBALS as $global => $value) {
            if (in_array($global, $blocked_globals)) {
                self::block_request();
            }
        }
    }

    private static function block_request()
    {
        status_header(403);
        exit('Forbidden');
    }
}