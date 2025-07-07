<?php

namespace App\Interface;

interface TodoRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function update($id, $data);
    public function delete($id);
}
