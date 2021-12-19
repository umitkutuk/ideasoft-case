<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var \App\Repositories\Category\CategoryRepositoryInterface
     */
    public CategoryRepositoryInterface $categoryRepository;

    /**
     * @param \App\Repositories\Category\CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @inheritDoc
     */
    public function createCategory(array $data): Category
    {
        $category = $this->categoryRepository->create($data);

        return $category;
    }

    /**
     * @inheritDoc
     */
    public function getCategoryById(string $id): Category
    {
        return $this->categoryRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateCategory(array $data, string $id): Category
    {
        $category = $this->categoryRepository->update($data, $id);

        return $category;
    }

    /**
     * @inheritDoc
     */
    public function destroyCategory(string $id): Category
    {
        $category = $this->categoryRepository->destroy($id);

        return $category;
    }
}
