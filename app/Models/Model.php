<?php

abstract class Model
{
    abstract static public function all();

    abstract static public function create($data);

    abstract static public function find($id);

    abstract static public function update($data, $id);

    abstract static public function destroy($id);
}
