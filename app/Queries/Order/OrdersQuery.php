<?php

namespace App\Queries\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class OrdersQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        // Resolve services, repositories etc. here...
        // $userService = resolve(UserServiceInterface::class);
        $orderRepository = resolve(OrderRepositoryInterface::class);

        $builder = $orderRepository->getBuilder()
            ->with([
                'customer',
                'discounts',
                'items'
            ]);

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
