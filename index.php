<?php

error_reporting(E_ERROR);
ini_set('display_errors', 1);

foreach (glob(__DIR__ . '/config' . '/*.php') as $file)
    require_once $file;
require_once  __DIR__ . '/bootstrap/app.php';
