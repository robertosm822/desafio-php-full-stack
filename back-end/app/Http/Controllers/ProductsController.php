<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductException;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->productRepository->getAllProducts()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $productDetails = $request->only([
                'name',
                'category_id'
            ]);

            return response()->json(
                [
                    'data' => $this->productRepository->createProduct($productDetails)
                ],
                Response::HTTP_CREATED
            );
        } catch (ProductException $e) {
            return response()->json(['Error'=> $e], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Request $request): JsonResponse
    {
        $productId = $request->route('id');

        return response()->json([
            'data' => $this->productRepository->getProductById($productId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $productId = $request->route('id');
        try {
            $productDetails = $request->only([
                'name'
            ]);

            return response()->json([
                'data' => $this->productRepository->updateProduct($productId, $productDetails)
            ], Response::HTTP_PARTIAL_CONTENT);
        } catch (ProductException $e) {
            return response()->json(['Error'=> $e], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function delete(Request $request): JsonResponse
    {

        try {
            $productId = $request->route('id');
            $this->productRepository->deleteProduct($productId);

            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (ProductException $e) {
            return response()->json(['Error'=> $e], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
