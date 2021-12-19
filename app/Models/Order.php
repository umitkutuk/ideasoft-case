<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 *
 * @property string id
 * @property string name
 *
 * @method static OrderFactory factory(...$parameters)
 *
 */
class Order extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'customer_id',
        'total',
        'discount_amount',
    ];

    /**
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * @return HasMany
     */
    public function discounts(): HasMany
    {
        return $this->hasMany(Discount::class);
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
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
