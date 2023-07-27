<?php

namespace app\Routes;

/**
 * Class Router.
 * 
 * @package app\Routes
 */
class Router
{
    /**
     * @var array $request
     * @var string $url
     * @var array $post
     */
    private array $request;
    private string $url;
    private array $post;

    public function __construct()
    {
        $this->request = $_POST;
        $this->url = $_SERVER['REQUEST_URI'];
        $this->post = $_POST;
    }

    /**
     * @param string $path
     * @param string $class
     * @param string $params
     * 
     * @return void
     */
    public function get(string $path, string $class, string $params): void
    {
        if (strpos($this->url, $path) !== false) {
            (new $class)->$params();
        }
    }

    /**
     * @param string $path
     * @param string $class
     * @param string $params
     * 
     * @return void
     */
    public function post(string $path, string $class, string $params): void
    {
        if (!$this->request) return;

        if (strpos($this->url, $path) !== false) {
            (new $class)->$params();
        }
    }

    /**
     * @param string $path
     * @param string $class
     * @param string $params
     * 
     * @return void
     */
    public function put(string $path, string $class, string $params): void
    {
        if (!$this->request) return;

        if (strpos($this->url, $path) !== false) {
            (new $class)->$params();
        }
    }

    /**
     * @param string $path
     * @param string $class
     * @param string $params
     * 
     * @return void
     */
    public function delete(string $path, string $class, string $params): void
    {
        if (!$this->request) return;

        if (strpos($this->url, $path) !== false) {
            (new $class)->$params();
        }
    }
}
