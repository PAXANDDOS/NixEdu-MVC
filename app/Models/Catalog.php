<?php

class Catalog extends Model
{
    private $products = array(
        array(
            'id' => 1,
            'name' => 'Charmander',
            'price' => '$14.99',
            'stock' => 59,
            'image' => '/public/images/charmander.jpg'
        ),
        array(
            'id' => 2,
            'name' => 'Eevee',
            'price' => '$14.99',
            'stock' => 40,
            'image' => '/public/images/eevee.jpg'
        ),
        array(
            'id' => 3,
            'name' => 'Lapras',
            'price' => '$15.99',
            'stock' => 60,
            'image' => '/public/images/lapras.jpg'
        ),
        array(
            'id' => 4,
            'name' => 'Dratini',
            'price' => '$13.99',
            'stock' => 52,
            'image' => '/public/images/dratini.jpg'
        ),
        array(
            'id' => 5,
            'name' => 'Jigglypuff',
            'price' => '$12.99',
            'stock' => 36,
            'image' => '/public/images/jigglypuff.jpg'
        ),
        array(
            'id' => 6,
            'name' => 'Pikachu',
            'price' => '$14.99',
            'stock' => 20,
            'image' => '/public/images/pikachu.jpg'
        ),
        array(
            'id' => 7,
            'name' => 'Vulpix',
            'price' => '$13.99',
            'stock' => 29,
            'image' => '/public/images/vulpix.jpg'
        ),
        array(
            'id' => 8,
            'name' => 'Ponyta',
            'price' => '$16.99',
            'stock' => 42,
            'image' => '/public/images/ponyta.jpg'
        ),
        array(
            'id' => 9,
            'name' => 'Sword and Shield',
            'price' => '$23.99',
            'stock' => 40,
            'image' => '/public/images/g1.jpg'
        ),
        array(
            'id' => 10,
            'name' => 'Let\'s Go Eevee',
            'price' => '$23.99',
            'stock' => 31,
            'image' => '/public/images/g2.jpg'
        ),
        array(
            'id' => 11,
            'name' => 'Hoodie',
            'price' => '$29.99',
            'stock' => 50,
            'image' => '/public/images/m6.jpg'
        ),
        array(
            'id' => 12,
            'name' => 'Ponyta T-Shirt',
            'price' => '$23.99',
            'stock' => 50,
            'image' => '/public/images/m7.jpg'
        ),
        array(
            'id' => 13,
            'name' => 'Gen VII Backpack',
            'price' => '$29.99',
            'stock' => 50,
            'image' => '/public/images/m8.jpg'
        ),
        array(
            'id' => 14,
            'name' => 'Gen VII T-Shirt',
            'price' => '$23.99',
            'stock' => 50,
            'image' => '/public/images/m9.jpg'
        )
    );

    public function get()
    {
        return $this->products;
    }

    public function show($product)
    {
        $result = null;
        foreach ($this->products as $value => $key) {
            if ($key['name'] == $product) {
                $result = $this->products[$value];
                break;
            }
        }
        if (!$result) {
            header("HTTP/1.1 404 Not Found");
            exit;
        }
        return $result;
    }
}
