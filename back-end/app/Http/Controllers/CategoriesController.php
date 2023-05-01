<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Exceptions\CategoryException;

use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): JsonResponse
    {
        /*
        return response()->json([
            'data' => $this->categoryRepository->getAllCategories()
        ]);
        */
        return response()->json($this->categoryRepository->getAllCategories());
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $categoryDetails = $request->only([
                'name'
            ]);

            return response()->json(
                [
                    'data' => $this->categoryRepository->createCategory($categoryDetails)
                ],
                Response::HTTP_CREATED
            );
        } catch (CategoryException $e) {
            return response()->json(['Error'=> $e], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Request $request): JsonResponse
    {
        $categoryId = $request->route('id');

        return response()->json([
            'data' => $this->categoryRepository->getCategoryById($categoryId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $categoryId = $request->route('id');
        try {
            $categoryDetails = $request->only([
                'name'
            ]);

            return response()->json([
                'data' => $this->categoryRepository->updateCategory($categoryId, $categoryDetails)
            ], Response::HTTP_PARTIAL_CONTENT);
        } catch (CategoryException $e) {
            return response()->json(['Error'=> $e], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function delete(Request $request): JsonResponse
    {

        try {
            $categoryId = $request->route('id');
            $this->categoryRepository->deleteCategory($categoryId);

            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (CategoryException $e) {
            return response()->json(['Error'=> $e], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
