<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table ='books';
    protected $fillable =
    [
        'name',
        'description',
        'file',
        'status',
        'price'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
