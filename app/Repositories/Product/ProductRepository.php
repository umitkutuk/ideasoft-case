<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var \App\Models\Product|\Illuminate\Database\Eloquent\Builder
     */
    protected Product|Builder $builder;

    /**
     * @var \App\Models\Product
     */
    protected Product $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Product
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
    public function findOrFail(string $id): Product
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Product
    {
        return $this->getBuilder()->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, string $id, array $options = []): Product
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id): Product
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function getSumPriceProductByIds(array $ids): int
    {
        return $this->getBuilder()
            ->whereIn('id', $ids)
            ->sum('price');
    }
}
