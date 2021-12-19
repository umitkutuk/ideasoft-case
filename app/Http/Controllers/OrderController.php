<?php

namespace App\Http\Controllers;

use App\Events\Order\OrderCreated;
use App\Events\Order\OrderDeleted;
use App\Events\Order\OrderUpdated;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Http\Resources\Order\OrderCollection;
use App\Http\Resources\Order\OrderDiscountResource;
use App\Http\Resources\Order\OrderResource;
use App\Queries\Order\OrdersQuery;
use App\Services\Order\OrderServiceInterface;

class OrderController extends Controller
{
    /**
     * @var \App\Services\Order\OrderServiceInterface
     */
    public OrderServiceInterface $orderService;

    /**
     * OrderController constructor.
     * @param \App\Services\Order\OrderServiceInterface $orderService
     */
    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\Order\OrderCollection
     */
    public function index(): OrderCollection
    {
        $orders = (new OrdersQuery())->safelyPaginate();

        return new OrderCollection($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Order\OrderStoreRequest $request
     * @return \App\Http\Resources\Order\OrderResource
     */
    public function store(OrderStoreRequest $request): OrderResource
    {
        $data = $request->validated();

        $order = $this->orderService->createOrder($data);

        event(new OrderCreated($order));

        return new OrderResource($order);
    }

    /**
     * @param string $id
     * @return \App\Http\Resources\Order\OrderResource
     */
    public function show(string $id): OrderResource
    {
        $order = $this->orderService->getOrderById($id);

        $order->load([
            'customer',
            'discounts',
            'items'
        ]);

        return new OrderResource($order);
    }

    /**
     * @param \App\Http\Requests\Order\OrderUpdateRequest $request
     * @param string $id
     * @return \App\Http\Resources\Order\OrderResource
     */
    public function update(OrderUpdateRequest $request, string $id): OrderResource
    {
        $order = $this->orderService->updateOrder($request->validated(), $id);

        $order->load([
            'customer',
            'discounts',
            'items'
        ]);

        event(new OrderUpdated($order));

        return new OrderResource($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \App\Http\Resources\Order\OrderResource
     * @throws \Exception
     */
    public function destroy(string $id): OrderResource
    {
        $order = $this->orderService->destroyOrder($id);

        event(new OrderDeleted($order));

        return new OrderResource($order);
    }

    /**
     * @param int $id
     * @return OrderDiscountResource
     */
    public function discounts(int $id): OrderDiscountResource
    {
        $order = $this->orderService->getOrderById($id);

        $order->load([
            'discounts',
        ]);

        return new OrderDiscountResource($order);
    }
}
