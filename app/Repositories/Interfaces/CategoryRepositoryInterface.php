<?php

namespace App\Repositories\Interfaces;


interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function find($id);
    public function create(array $data);
    public function update($id,array $data);
    public function delete($id);
    
}