<?php

namespace App\Services\Discount;

use App\Models\Discount;
use App\Models\Order;
use App\Repositories\Discount\DiscountRepositoryInterface;
use App\Services\Discount\Handlers\BUY_5_GET_1;
use App\Services\Discount\Handlers\PERCENT_10_OVER_1000;

class DiscountService implements DiscountServiceInterface
{
    /**
     * @var \App\Repositories\Discount\DiscountRepositoryInterface
     */
    public DiscountRepositoryInterface $discountRepository;

    /**
     * @param \App\Repositories\Discount\DiscountRepositoryInterface $discountRepository
     */
    public function __construct(DiscountRepositoryInterface $discountRepository)
    {
        $this->discountRepository = $discountRepository;
    }

    /**
     * @inheritDoc
     */
    public function createDiscount(array $data): Discount
    {
        $discount = $this->discountRepository->create($data);

        return $discount;
    }

    /**
     * @inheritDoc
     */
    public function getDiscountById(string $id): Discount
    {
        return $this->discountRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateDiscount(array $data, string $id): Discount
    {
        $discount = $this->discountRepository->update($data, $id);

        return $discount;
    }

    /**
     * @inheritDoc
     */
    public function destroyDiscount(string $id): Discount
    {
        $discount = $this->discountRepository->destroy($id);

        return $discount;
    }

    /**
     * @inerhitDoc
     */
    public function handler(Order $order, array $items): void
    {
        $BUY_5_GET_1 = new BUY_5_GET_1();
        $PERCENT_10_OVER_1000 = new PERCENT_10_OVER_1000();

        $BUY_5_GET_1
            ->setNext($PERCENT_10_OVER_1000);

        $BUY_5_GET_1->handle($order, $items);
    }

    public function getDiscountByOrderId(int $id)
    {
        return $this->discountRepository->getDiscountByOrderId($id);
    }
}
