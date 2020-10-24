<?php

if (!function_exists('config_get')) {
    function config_get($path, $default = null) {
        return ConfigManager::getInstance()->get($path, $default);
    }
}
