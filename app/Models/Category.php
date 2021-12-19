<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 *
 * @property string id
 * @property string name
 *
 * @method static CategoryFactory factory(...$parameters)
 *
 */
class Category extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels Category
     *
     * @var array
     */
    public static $labels = [
        'name' => 'Kategori'
    ];

}
