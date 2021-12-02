<?php

abstract class Controller
{
    public $model;
    public $view;

    abstract function __construct();
    abstract function action_index();
}
