<?php

namespace App\Repositories\Discount;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface DiscountRepositoryInterface
{
    /**
     * @return \App\Models\Discount
     */
    public function getModel(): Discount;

    /**
     * @return \App\Models\Discount|\Illuminate\Database\Eloquent\Builder
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
     * @return \App\Models\Discount[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param string $id
     * @return \App\Models\Discount
     */
    public function findOrFail(string $id): Discount;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Models\Discount
     */
    public function create(array $attributes): Discount;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param string $id
     * @param array $options
     * @return \App\Models\Discount
     */
    public function update(array $attributes, string $id, array $options = []): Discount;

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \App\Models\Discount
     * @throws \Exception
     */
    public function destroy(string $id): Discount;

    /**
     * @param int $id
     */
    public function getDiscountByOrderId(int $id);
}
