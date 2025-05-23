<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepositoryInterface;
use App\Services\Interfaces\CategoryServiceInterface as CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function find($id){
        return $this->categoryRepository->find($id);
    }

    public function create(array $data){
        return $this->categoryRepository->create($data);
    }

    public function update($id,array $data){
        return $this->categoryRepository->update($id,$data);
    }

    public function delete($id){
        return $this->categoryRepository->delete($id);
    }
}