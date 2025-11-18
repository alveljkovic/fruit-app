<?php

try {
    require "vendor/autoload.php";
} catch (\Throwable $th) {
    die("Please execute composer install command in the project root!");
}

use MassdataFruits\Bootstrap\App;

// App entry point
(new App())->run();
