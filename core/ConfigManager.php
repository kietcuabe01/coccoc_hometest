<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 10/24/20
 * Time: 11:56 AM
 */

class ConfigManager
{
    private $config;

    private $cached = [];

    private static $instance = null;

    private function __construct()
    {
        $this->config = require_once 'core/config.php';
    }

    public static function getInstance() : ConfigManager
    {
        if (!static::$instance) {
            static::$instance = new ConfigManager();
        }

        return static::$instance;
    }

    public function get($path, $default = null)
    {
        if (!isset($this->cached[$path])) {
            $result = $this->config;
            $arrayPath = explode('.', $path);
            foreach ($arrayPath as $key) {
                if (isset($result[$key])) {
                    $result = $result[$key];
                } else {
                    $this->cached[$path] = $default;
                    break;
                }
            }
            $this->cached[$path] = $result;
        }
        return $this->cached[$path];
    }

    private function __clone()
    {
    }
}