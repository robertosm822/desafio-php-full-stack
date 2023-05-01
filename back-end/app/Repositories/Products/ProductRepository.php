<?php
namespace App\Repositories\Products;

use App\Models\Product;
use App\Repositories\Products\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
    public function getAllProducts()
    {
        $products = $this->model::paginate(10);
        return $products;
    }
    public function getProductById($productId)
    {
        return $this->model::with(['categories'])->findOrFail($productId);
    }
    public function createProduct(array $productDetails)
    {
        return $this->model::create($productDetails);
    }
    public function updateProduct($productId, array $newDetails)
    {
        return $this->model::whereId($productId)->update($newDetails);
    }
    public function deleteProduct($id)
    {
        $this->model::destroy($id);
    }
}
