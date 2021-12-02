<?php

class CartController extends Controller
{
    function action_index()
    {
        $this->view->generate('cart_view.php', 'template_view.php');
    }
}
