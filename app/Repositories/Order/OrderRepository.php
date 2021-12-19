<?php

namespace App\Repositories\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var \App\Models\Order|\Illuminate\Database\Eloquent\Builder
     */
    protected Order|Builder $builder;

    /**
     * @var \App\Models\Order
     */
    protected Order $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Order
    {
        return $this->model;
    }

    /**
     * @inheritDoc
     */
    public function getBuilder()
    {
        return $this->builder = $this->getModel()::query();
    }

    /**
     * @inheritDoc
     */
    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function all($columns = ['*'])
    {
        return $this->getBuilder()->get($columns);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail(string $id): Order
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Order
    {
        return $this->getBuilder()->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, string $id, array $options = []): Order
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id): Order
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function findOrderByCustomerId(int $customerId)
    {
        return $this->getBuilder()
            ->where('customer_id', $customerId)
            ->first();
    }
}
