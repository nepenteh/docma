<?php

spl_autoload_register(function ($class) {
    require str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
});


