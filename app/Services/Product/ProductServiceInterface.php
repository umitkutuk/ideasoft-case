<?php

namespace App\Services\Product;

use App\Models\Product;

interface ProductServiceInterface
{
    /**
     * @param array $data
     * @return \App\Models\Product
     */
    public function createProduct(array $data): Product;

    /**
     * @param string $id
     * @return \App\Models\Product
     */
    public function getProductById(string $id): Product;

    /**
     * @param array $data
     * @param string $id
     * @return \App\Models\Product
     */
    public function updateProduct(array $data, string $id): Product;

    /**
     * @param string $id
     * @return \App\Models\Product
     * @throws \Exception
     */
    public function destroyProduct(string $id): Product;

    /**
     * @param array $ids
     * @return int
     */
    public function getSumPriceProductByIds(array $ids): int;
}
