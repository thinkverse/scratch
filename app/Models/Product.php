<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['variations'];

    public function variations()
    {
        return $this->hasMany(ProductVariation::class)
            ->orderBy('order', 'asc');
    }
}
