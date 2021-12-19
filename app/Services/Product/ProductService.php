<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{
    /**
     * @var \App\Repositories\Product\ProductRepositoryInterface
     */
    public ProductRepositoryInterface $productRepository;

    /**
     * @param \App\Repositories\Product\ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @inheritDoc
     */
    public function createProduct(array $data): Product
    {
        $product = $this->productRepository->create($data);

        return $product;
    }

    /**
     * @inheritDoc
     */
    public function getProductById(string $id): Product
    {
        return $this->productRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateProduct(array $data, string $id): Product
    {
        $product = $this->productRepository->update($data, $id);

        return $product;
    }

    /**
     * @inheritDoc
     */
    public function destroyProduct(string $id): Product
    {
        $product = $this->productRepository->destroy($id);

        return $product;
    }

    /**
     * @inheritDoc
     */
    public function getSumPriceProductByIds(array $ids): int
    {
        return $this->productRepository->getSumPriceProductByIds($ids);;
    }
}
