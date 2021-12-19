<?php

namespace App\Http\Controllers;

use App\Events\Category\CategoryCreated;
use App\Events\Category\CategoryDeleted;
use App\Events\Category\CategoryUpdated;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryResource;
use App\Queries\Category\CategoriesQuery;
use App\Services\Category\CategoryServiceInterface;

class CategoryController extends Controller
{
    /**
     * @var \App\Services\Category\CategoryServiceInterface
     */
    public CategoryServiceInterface $categoryService;

    /**
     * CategoryController constructor.
     * @param \App\Services\Category\CategoryServiceInterface $categoryService
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\Category\CategoryCollection
     */
    public function index(): CategoryCollection
    {
        $categories = (new CategoriesQuery())->safelyPaginate();

        return new CategoryCollection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Category\CategoryStoreRequest $request
     * @return \App\Http\Resources\Category\CategoryResource
     */
    public function store(CategoryStoreRequest $request): CategoryResource
    {
        $data = $request->validated();

        $category = $this->categoryService->createCategory($data);

        event(new CategoryCreated($category));

        return new CategoryResource($category);
    }

    /**
     * @param string $id
     * @return \App\Http\Resources\Category\CategoryResource
     */
    public function show(string $id): CategoryResource
    {
        $category = $this->categoryService->getCategoryById($id);

        return new CategoryResource($category);
    }

    /**
     * @param \App\Http\Requests\Category\CategoryUpdateRequest $request
     * @param string $id
     * @return \App\Http\Resources\Category\CategoryResource
     */
    public function update(CategoryUpdateRequest $request, string $id): CategoryResource
    {
        $category = $this->categoryService->updateCategory($request->validated(), $id);

        event(new CategoryUpdated($category));

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \App\Http\Resources\Category\CategoryResource
     * @throws \Exception
     */
    public function destroy(string $id): CategoryResource
    {
        $category = $this->categoryService->destroyCategory($id);

        event(new CategoryDeleted($category));

        return new CategoryResource($category);
    }
}
