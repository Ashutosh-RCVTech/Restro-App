<?php

namespace App\Services\Interfaces;

interface CategoryServiceInterface
{
    public function getAllCategories();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}