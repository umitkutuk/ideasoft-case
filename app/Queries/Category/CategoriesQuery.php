<?php

namespace App\Queries\Category;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CategoriesQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        // Resolve services, repositories etc. here...
        // $userService = resolve(UserServiceInterface::class);
        $categoryRepository = resolve(CategoryRepositoryInterface::class);

        $builder = $categoryRepository->getBuilder();

        parent::__construct($builder, $request);

        // Put your filters, sorts etc. here:
        // $this->allowedFilters(...
        $this
            ->allowedSorts([
                'created_at'
            ])->allowedFilters([
                AllowedFilter::exact('id'),
            ]);
    }
}
