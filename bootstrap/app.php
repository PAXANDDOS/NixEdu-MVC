<?php

(new \Framework\DotEnv(dirname(dirname(__FILE__)) . '/.env'))->load();

foreach (glob(dirname(dirname(__FILE__)) . '/config' . '/*.php') as $file)
    require_once $file;

\Framework\Handler::register();
\Framework\Session::protect();

\Framework\Route::start();
