<?php

namespace App\Services\Discount\Handlers;

use App\Models\Order;
use App\Services\Discount\AbstractDiscountHandler;
use App\Services\Discount\DiscountServiceInterface;
use App\Services\Product\ProductServiceInterface;

class PERCENT_10_OVER_1000 extends AbstractDiscountHandler
{
    private const OVER_PRICE = 100000;
    private const DISCOUNT_REASON = 'PERCENT_10_OVER_1000';

    public function handle(Order $order, array $items): ?array
    {
        $totalPrice = 0;
        foreach ($items as $item) {
            $product = resolve(ProductServiceInterface::class)->getProductById($item['product_id']);

            $totalPrice = $totalPrice + $product->price * $item['quantity'];
        }

        if ($totalPrice >= self::OVER_PRICE){
            resolve(DiscountServiceInterface::class)
                ->createDiscount([
                    'order_id' => $order->id,
                    'discount_reason' => self::DISCOUNT_REASON,
                    'discount_amount' => $totalPrice / 10
                ]);
        }

        return parent::handle($order, $items);
    }
}
