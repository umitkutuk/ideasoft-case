<?php

namespace App\Queries\Discount;

use App\Repositories\Discount\DiscountRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DiscountsQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        // Resolve services, repositories etc. here...
        // $userService = resolve(UserServiceInterface::class);
        $discountRepository = resolve(DiscountRepositoryInterface::class);

        $builder = $discountRepository->getBuilder();

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
