<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var \App\Models\Category|\Illuminate\Database\Eloquent\Builder
     */
    protected Category|Builder $builder;

    /**
     * @var \App\Models\Category
     */
    protected Category $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Category
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
    public function findOrFail(string $id): Category
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Category
    {
        return $this->getBuilder()->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, string $id, array $options = []): Category
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id): Category
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }
}
