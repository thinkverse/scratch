<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'status',
    ];

    public function getStatusAttribute($status)
    {
        return [
            0 => 'Unpublished',
            1 => 'Under Review',
            2 => 'Published',
            3 => 'Rejected',
        ][$status];
    }
}
