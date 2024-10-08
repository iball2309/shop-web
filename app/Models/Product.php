<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'detail',
        'image',
        'price',
        'stock'
    ];

    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
