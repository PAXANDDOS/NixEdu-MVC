<?php

require_once APP_MODELS . 'Product.php';

class CatalogController extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
        $products = Product::all();
        $cards = null;
        foreach ($products as $value => $key) {
            $cards = $cards . '<a href="/catalog?id=' . $key['id'] . '">' .
                '<div class="single">' .
                '<img src="' . $key['image'] . '">' .
                '<h3>' . $key['name'] . '</h3>' .
                '<span>' . $key['price'] . '</span>' .
                '<label>BUY</label>' .
                '</div>' .
                '</a>';
        }

        $this->view->generate('catalog_view.php', 'template_view.php', array(
            'cards' => $cards
        ));
    }

    public function withQuery($query)
    {
        $product = Product::find($query['id']);
        $this->view->generate('product_view.php', 'template_view.php', array(
            'product' => $product
        ));
    }
}
