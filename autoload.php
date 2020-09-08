<?php

namespace app;

spl_autoload_register(function ($class) {
    if (stripos($class, __NAMESPACE__) === 0) {
        @include(__DIR__ . str_replace('\\', DIRECTORY_SEPARATOR,
                strtolower(substr($class, strlen(__NAMESPACE__)))) . '.php');
    }
}
);