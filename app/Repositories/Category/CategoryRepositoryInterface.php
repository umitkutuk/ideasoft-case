<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface CategoryRepositoryInterface
{
    /**
     * @return \App\Models\Category
     */
    public function getModel(): Category;

    /**
     * @return \App\Models\Category|\Illuminate\Database\Eloquent\Builder
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
     * @return \App\Models\Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param string $id
     * @return \App\Models\Category
     */
    public function findOrFail(string $id): Category;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Models\Category
     */
    public function create(array $attributes): Category;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param string $id
     * @param array $options
     * @return \App\Models\Category
     */
    public function update(array $attributes, string $id, array $options = []): Category;

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \App\Models\Category
     * @throws \Exception
     */
    public function destroy(string $id): Category;
}
