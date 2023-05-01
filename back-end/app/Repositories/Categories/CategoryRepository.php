<?php

namespace App\Repositories\Categories;

use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getAllCategories()
    {
        $categories = $this->model::paginate(10);
        return $categories;
    }

    public function getCategoryById($categoryId)
    {
        return $this->model::findOrFail($categoryId);
    }

    public function createCategory(array $categoryDetails)
    {
        return $this->model::create($categoryDetails);
    }

    public function updateCategory($categoryId, array $newDetails)
    {
        return $this->model::whereId($categoryId)->update($newDetails);
    }

    public function deleteCategory($categoryId)
    {
        $this->model::destroy($categoryId);
    }
}
