<?php
/**
 * Application configuration
 *
 * PHP version 7.0
 */
define("APPPATH", 'http://localhost/shop/');

class Config
{
    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';
    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'shop';
    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';
    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '';
    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;
    /**
     * Site URL
     * @var string
     */
    const SITE_URL = 'http://localhost/shop/';
    
    /**
     * Site name
     * @var string
     */
    const SITE_NAME = 'shop';

    /**
     * ext image
     * @var string
     */
    const EXT_IMG = '.png';
}