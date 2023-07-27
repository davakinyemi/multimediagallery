<?php

/**
 * display error for development mode
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require './vendor/autoload.php';

date_default_timezone_set('Europe/Berlin');
