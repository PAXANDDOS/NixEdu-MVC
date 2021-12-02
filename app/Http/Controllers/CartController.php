<?php

class CartController extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('cart_view.php', 'template_view.php');
    }
}
