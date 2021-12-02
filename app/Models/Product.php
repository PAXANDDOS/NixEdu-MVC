<?php

class Product extends Model
{
    public static function all()
    {
        return json_decode(file_get_contents(DB_DIR . 'data.json'), true);;
    }

    public static function find($id)
    {
        $products = json_decode(file_get_contents(DB_DIR . 'data.json'), true);
        foreach ($products as $value => $key) {
            if ($key['id'] == $id) {
                $result = $products[$value];
                break;
            }
        }
        if (!$result)
            Router::ErrorPage404();
        return $result;
    }

    public static function update($data, $id)
    {
    }

    public static function create($data)
    {
    }

    public static function destroy($id)
    {
    }
}
