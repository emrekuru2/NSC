<?php

namespace App\Interfaces;

interface CRUD
{
    public function read(string $param);

    public function update(int $id);

    public function create();

    public function delete(int $id);
}
