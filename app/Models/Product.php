<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 *
 * @property string id
 * @property string name
 *
 * @method static ProductFactory factory(...$parameters)
 *
 */
class Product extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'stock',
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels Product
     *
     * @var array
     */
    public static $labels = [
    ];

}
