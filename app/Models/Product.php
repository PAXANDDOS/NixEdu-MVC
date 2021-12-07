<?php

namespace App\Models;

/**
 * Contains fields and methods for the Product model.
 */
class Product extends Model
{
    public int $id;
    public string $name;
    public string $description;
    public float $price;
    public int $stock;
    public string $image;

    /**
     * Converts the database data into an array of Product objects.
     *
     * @return array Array of products.
     */
    public static function getAll(): array
    {
        $data = Product::getData();
        $products = [];
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

    /**
     * Gets the variable value from $_SESSION.
     *
     * @param  int $id ID of the requested product.
     * @return Product Single product object.
     */
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
            throw new \Framework\Exceptions\NotFoundException("Product not found.");

        return $product;
    }

    /**
     * Reads data from a fake database;
     *
     * @return array JSON decoded array of data.
     */
    protected static function getData(): array
    {
        return json_decode(file_get_contents(DB_DIR . 'data.json'), true);
    }
}
