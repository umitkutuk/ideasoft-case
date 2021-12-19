<?php

namespace App\Services\Discount;

use App\Models\Discount;
use App\Models\Order;

interface DiscountServiceInterface
{
    /**
     * @param array $data
     * @return \App\Models\Discount
     */
    public function createDiscount(array $data): Discount;

    /**
     * @param string $id
     * @return \App\Models\Discount
     */
    public function getDiscountById(string $id): Discount;

    /**
     * @param array $data
     * @param string $id
     * @return \App\Models\Discount
     */
    public function updateDiscount(array $data, string $id): Discount;

    /**
     * @param string $id
     * @return \App\Models\Discount
     * @throws \Exception
     */
    public function destroyDiscount(string $id): Discount;

    /**
     * @param Order $order
     * @param array $items
     * @return void
     */
    public function handler(Order $order, array $items): void;

    /**
     * @param int $id
     */
    public function getDiscountByOrderId(int $id);
}
