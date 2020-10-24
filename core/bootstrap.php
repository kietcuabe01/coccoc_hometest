<?php
set_include_path(__DIR__.'/..');
require 'core/ConfigManager.php';
require 'core/ContainerIoc.php';
require 'core/helper.php';

set_error_handler(function ($n, $m, $f, $l) {
    throw new Exception($m);
}, E_ALL);

$autoload_psr4 = function ($class) {
    $mapNamespaceSource = config_get('psr4');
    foreach ($mapNamespaceSource as $namespaceConfig => $source) {
        $explode = explode('\\', $class);
        $namespace = array_shift($explode);
        if ($namespace !== $namespaceConfig) {
            continue;
        }

        $file = $source.'/src/'.implode('/', $explode).'.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
};

$autoload_unitTest = function ($class) {
    $testPath = config_get('test_path');
    if (file_exists($testPath)) {
        require_once $testPath.'/'.$class.'.php';
    }
};

spl_autoload_register($autoload_psr4);
spl_autoload_register($autoload_unitTest);