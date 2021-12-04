<?php

namespace App\Models;

class Product extends Model
{
    public int $id;
    public string $name;
    public string $description;
    public float $price;
    public int $stock;
    public string $image;

    public static function getAll(): array
    {
        $data = Product::getData();
        $products = array();
        foreach ($data as $item) {
            $product = new Product();
            $product->id = $item['id'];
            $product->name = $item['name'];
            $product->price = $item['price'];
            $product->stock = $item['stock'];
            $product->image = $item['image'];
            $products[] = $product;
        }

        return $products;
    }

    public static function findOne(int $id): Product
    {
        $data = Product::getData();
        $product = new Product();
        foreach ($data as $item) {
            if ($item['id'] === $id) {
                $product->id = $item['id'];
                $product->name = $item['name'];
                $product->price = $item['price'];
                $product->stock = $item['stock'];
                $product->image = $item['image'];
                break;
            }
        }

        if (!(array)$product)
            throw new \Framework\Exceptions\InternalServerException("Product not found.");

        return $product;
    }

    // public static function update($data, int $id): Product
    // {
    // }

    // public static function create($data): Product
    // {
    // }

    // public static function destroy(int $id): bool
    // {
    //     return false;
    // }

    protected static function getData(): array
    {
        return json_decode(file_get_contents(DB_DIR . 'data.json'), true);
    }
}
