<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\OrderItem\OrderItemResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Order
 */
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer' => $this->whenLoaded('customer', function () {
                return [
                    'id' => $this->customer->id,
                    'name' => $this->customer->name
                ];
            }),
            'items' => $this->whenLoaded('items', function () {
                return OrderItemResource::collection($this->items);
            }),
            'total' => $this->total,
        ];
    }
}
