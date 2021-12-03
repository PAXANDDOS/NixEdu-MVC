<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public $model;
    public $view;

    abstract public function MainAction();
}
