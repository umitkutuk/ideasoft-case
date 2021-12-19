<?php

namespace App\Services\Category;

use App\Models\Category;

interface CategoryServiceInterface
{
    /**
     * @param array $data
     * @return \App\Models\Category
     */
    public function createCategory(array $data): Category;

    /**
     * @param string $id
     * @return \App\Models\Category
     */
    public function getCategoryById(string $id): Category;

    /**
     * @param array $data
     * @param string $id
     * @return \App\Models\Category
     */
    public function updateCategory(array $data, string $id): Category;

    /**
     * @param string $id
     * @return \App\Models\Category
     * @throws \Exception
     */
    public function destroyCategory(string $id): Category;
}
