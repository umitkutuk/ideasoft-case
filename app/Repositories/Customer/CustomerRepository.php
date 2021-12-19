<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var \App\Models\Customer|\Illuminate\Database\Eloquent\Builder
     */
    protected Customer|Builder $builder;

    /**
     * @var \App\Models\Customer
     */
    protected Customer $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Customer
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
    public function findOrFail(string $id): Customer
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Customer
    {
        return $this->getBuilder()->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, string $id, array $options = []): Customer
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id): Customer
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }
}
