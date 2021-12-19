<?php

namespace App\Services\Order;

use App\Models\Order;

interface OrderServiceInterface
{
    /**
     * @param array $data
     * @return \App\Models\Order
     */
    public function createOrder(array $data): Order;

    /**
     * @param string $id
     * @return \App\Models\Order
     */
    public function getOrderById(string $id): Order;

    /**
     * @param array $data
     * @param string $id
     * @return \App\Models\Order
     */
    public function updateOrder(array $data, string $id): Order;

    /**
     * @param string $id
     * @return \App\Models\Order
     * @throws \Exception
     */
    public function destroyOrder(string $id): Order;

    /**
     * @param Order $order
     * @param array $items
     * @return Order
     */
    public function createOrderItems(Order $order, array $items): Order;
}
