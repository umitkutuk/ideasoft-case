<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Services\Discount\DiscountServiceInterface;
use App\Services\Product\ProductServiceInterface;

class OrderService implements OrderServiceInterface
{
    public OrderRepositoryInterface $orderRepository;

    public DiscountServiceInterface $discountService;

    public ProductServiceInterface $productService;

    /**
     * @param \App\Repositories\Order\OrderRepositoryInterface $orderRepository
     */
    public function __construct(
        OrderRepositoryInterface $orderRepository,
        DiscountServiceInterface $discountService,
        ProductServiceInterface $productService
    )
    {
        $this->orderRepository = $orderRepository;
        $this->discountService = $discountService;
        $this->productService = $productService;
    }

    /**
     * @inheritDoc
     */
    public function createOrder(array $data): Order
    {
        $order = $this->orderRepository->findOrderByCustomerId($data['customer_id']);

        if (null == $order) {
            $order = $this->orderRepository->create($data);
        }

        $this->createOrderItems($order, $data['items']);

        return $order;
    }

    /**
     * @inheritDoc
     */
    public function getOrderById(string $id): Order
    {
        return $this->orderRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateOrder(array $data, string $id): Order
    {
        $order = $this->orderRepository->update($data, $id);

        return $order;
    }

    /**
     * @inheritDoc
     */
    public function destroyOrder(string $id): Order
    {
        $order = $this->orderRepository->destroy($id);

        return $order;
    }

    /**
     * @inheritDoc
     */
    public function createOrderItems(Order $order, array $items): Order
    {
        //Chain Design Pattern
        $this->discountService->handler($order, $items);

        $orderDiscount = $this->discountService->getDiscountByOrderId($order->id);

        //burayı değiştir
        foreach ($items as $item){
            $product = $this->productService->getProductById($item['product_id']);

            $orderItem = $order->items()
                ->where('product_id', $product->id)
                ->first();

            if (null == $orderItem) {
                $orderItemTotal = ($item['quantity'] * $product->price);
                $orderItemDiscountTotal = $orderDiscount
                    ->where('product_id', $product->id)
                    ->sum('discount_amount');

                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->price,
                    'total' => ($orderItemTotal - $orderItemDiscountTotal),
                    'discount_amount' => $orderItemDiscountTotal
                ]);
            } else {
                $order->items()
                    ->where('product_id', $product->id)
                    ->update([
                        'product_id' => $product->id,
                        'quantity' => $item['quantity'],
                        'unit_price' => $product->price,
                        'total' => ($orderItemTotal - $orderItemDiscountTotal),
                        'discount_amount' => $orderItemDiscountTotal
                    ]);
            }
        }

        $order->update([
            'total' => $order->items()->sum('total'),
            'discount_amount' => $orderDiscount->sum('discount_amount')
        ]);

        return $order;
    }
}
