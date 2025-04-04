<?php
spl_autoload_register(function ($class) {
    $prefix = 'LegacyDbz\\'; // Define your namespace prefix
    $base_dir = __DIR__ . '/../src/'; // Define the base directory for your classes

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return; // Class does not use the prefix
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
