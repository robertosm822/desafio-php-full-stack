<?php
namespace App\Repositories\Products;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductById($productId);
    public function createProduct(array $productDetails);
    public function updateProduct($productId, array $newDetails);
    public function deleteProduct($id);
}
