<?php

namespace App\Models;

use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package App\Models
 *
 * @property string id
 * @property string name
 *
 * @method static CustomerFactory factory(...$parameters)
 *
 */
class Customer extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'name',
        'since',
        'revenue',
    ];

    protected $dates = [
        'since',
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels Customer
     *
     * @var array
     */
    public static $labels = [
        'name' => 'Müşteri'
    ];

}
