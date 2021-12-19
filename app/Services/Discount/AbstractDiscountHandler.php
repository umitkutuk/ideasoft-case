<?php

namespace App\Services\Discount;

use App\Models\Order;

class AbstractDiscountHandler implements DiscountHandlerInterface
{
    /**
     * @var DiscountHandlerInterface
     */
    private $nextHandler;

    public function setNext(DiscountHandlerInterface $handler): DiscountHandlerInterface
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function handle(Order $order, array $items): ?array
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($order, $items);
        }

        return null;
    }
}
