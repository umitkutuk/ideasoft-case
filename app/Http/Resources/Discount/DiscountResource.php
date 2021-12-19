<?php

namespace App\Http\Resources\Discount;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Discount
 */
class DiscountResource extends JsonResource
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
        ];
    }
}
