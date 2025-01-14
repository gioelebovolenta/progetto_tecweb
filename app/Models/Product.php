<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'subject',
        'type',
        'file_path',
        'pages',
        'user_id',
    ];

    public function scopeAvailableForOthers($query)
    {
    return $query->where('user_id', '!=', auth()->id());
    }

}
