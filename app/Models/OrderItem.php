<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderItems
 * @package App\Models
 *
 * @property string id
 * @property string name
 *
 * @method static OrderFactory factory(...$parameters)
 *
 */
class OrderItem extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'product_id',
        'quantity',
        'unit_price',
        'total',
        'discount_amount',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels Order
     *
     * @var array
     */
    public static $labels = [
    ];

}
