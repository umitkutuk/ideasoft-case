<?php

namespace App\Http\Resources\Discount;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DiscountCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function ($discounts) {
            return new DiscountResource($discounts);
        });

        return parent::toArray($request);
    }
}
