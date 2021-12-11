<?php

namespace App\Models;

interface Model
{
    public static function getAll(): array;

    public static function create(array $data): Model;

    public static function findOne(int $id): Model;

    public static function update(array $data, int $id): Model;

    public static function destroy(int $id): bool;
}
