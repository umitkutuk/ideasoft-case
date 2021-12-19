<?php

namespace App\Models;

use Database\Factories\DiscountFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Discount
 * @package App\Models
 *
 * @property string id
 * @property string name
 *
 * @method static DiscountFactory factory(...$parameters)
 *
 */
class Discount extends Model
{
    /**
     * @inheritDoc
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'discount_reason',
        'discount_amount',
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels Discount
     *
     * @var array
     */
    public static $labels = [
    ];

}
