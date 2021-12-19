<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface ProductRepositoryInterface
{
    /**
     * @return \App\Models\Product
     */
    public function getModel(): Product;

    /**
     * @return \App\Models\Product|\Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder();

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return $this
     */
    public function setBuilder(Builder $builder);

    /**
     * Get all of the models from the database.
     *
     * @param string[] $columns
     * @return \App\Models\Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param string $id
     * @return \App\Models\Product
     */
    public function findOrFail(string $id): Product;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Models\Product
     */
    public function create(array $attributes): Product;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param string $id
     * @param array $options
     * @return \App\Models\Product
     */
    public function update(array $attributes, string $id, array $options = []): Product;

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \App\Models\Product
     * @throws \Exception
     */
    public function destroy(string $id): Product;

    /**
     * @param array $ids
     * @return int
     */
    public function getSumPriceProductByIds(array $ids): int;
}
