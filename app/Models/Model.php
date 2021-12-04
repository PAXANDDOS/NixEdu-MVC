<?php

namespace App\Models;

abstract class Model
{
    abstract public static function getAll(): array;

    // abstract public static function create($data): Model;

    abstract public static function findOne(int $id): Model;

    // abstract public static function update($data, int $id): Model;

    // abstract public static function destroy(int $id): bool;

    abstract protected static function getData(): array;
}
