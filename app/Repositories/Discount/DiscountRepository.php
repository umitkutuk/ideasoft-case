<?php

namespace App\Repositories\Discount;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
class DiscountRepository implements DiscountRepositoryInterface
{
    /**
     * @var \App\Models\Discount|\Illuminate\Database\Eloquent\Builder
     */
    protected Discount|Builder $builder;

    /**
     * @var \App\Models\Discount
     */
    protected Discount $model;

    public function __construct(Discount $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Discount
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
    public function findOrFail(string $id): Discount
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Discount
    {
        return $this->getBuilder()->firstOrCreate([
                'order_id' => $attributes['order_id'],
                'product_id' => $attributes['product_id']
            ],
            $attributes
        );
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, string $id, array $options = []): Discount
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id): Discount
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function getDiscountByOrderId(int $id)
    {
        return $this->getBuilder($id)
            ->where('order_id', $id)
            ->get();
    }
}
