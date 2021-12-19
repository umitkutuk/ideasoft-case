<?php

namespace App\Repositories\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface OrderRepositoryInterface
{
    /**
     * @return \App\Models\Order
     */
    public function getModel(): Order;

    /**
     * @return \App\Models\Order|\Illuminate\Database\Eloquent\Builder
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
     * @return \App\Models\Order[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param string $id
     * @return \App\Models\Order
     */
    public function findOrFail(string $id): Order;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Models\Order
     */
    public function create(array $attributes): Order;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param string $id
     * @param array $options
     * @return \App\Models\Order
     */
    public function update(array $attributes, string $id, array $options = []): Order;

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \App\Models\Order
     * @throws \Exception
     */
    public function destroy(string $id): Order;

    /**
     * @param int $customerId
     * @return mixed
     */
    public function findOrderByCustomerId(int $customerId);
}
