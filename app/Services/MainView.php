<?php

namespace app\Services;

/**
 * Class MainView
 * 
 * @package app\Services
 */
class MainView
{
    /**
     * @var string $header
     * @var string $headerAuth
     * @var string $footer
     */
    private static string $header = 'public/views/layouts/header.php';
    private static string $headerAuth = 'public/views/layouts/header-auth.php';
    private static string $footer = 'public/views/layouts/footer.php';
    // private static string $aside = 'public/views/layouts/aside.php';

    /**
     * Render view passed to method, using params.
     * 
     * @param mixed $view
     * @param array $params
     * 
     * @return void
     */
    public static function render($view, $params = [])
    {
        require self::$header;
        require "public/views/$view.php";
        // require self::$aside;
        require self::$footer;
        die();
    }

    /**
     * Render special (auth) view.
     * 
     * @param mixed $view
     * @param array $params
     * 
     * @return void
     */
    public static function renderAuth($view, $params = [])
    {
        require self::$headerAuth;
        require "public/views/$view.php";
        require self::$footer;
        die();
    }
}
