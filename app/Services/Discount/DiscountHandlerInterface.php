<?php

namespace App\Services\Discount;

use App\Models\Order;

interface DiscountHandlerInterface
{
    public function setNext(DiscountHandlerInterface $handler): DiscountHandlerInterface;

    public function handle(Order $order, array $items): ?array;
}
