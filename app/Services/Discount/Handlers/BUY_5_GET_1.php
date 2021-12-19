<?php

namespace App\Services\Discount\Handlers;

use App\Models\Order;
use App\Services\Discount\AbstractDiscountHandler;
use App\Services\Discount\DiscountServiceInterface;
use App\Services\Product\ProductServiceInterface;

class BUY_5_GET_1 extends AbstractDiscountHandler
{
    private const BUY_COUNT = 5;
    private const DISCOUNT_REASON = 'BUY_5_GET_1';

    public function handle(Order $order, array $items): ?array
    {
        foreach ($items as $item) {
            if ($item['quantity'] < self::BUY_COUNT){
                continue;
            }

            $product = resolve(ProductServiceInterface::class)
                ->getProductById($item['product_id']);

            resolve(DiscountServiceInterface::class)
                ->createDiscount([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'discount_reason' => self::DISCOUNT_REASON,
                    'discount_amount' => $product->price
                ]);
        }

        return parent::handle($order, $items);
    }
}
