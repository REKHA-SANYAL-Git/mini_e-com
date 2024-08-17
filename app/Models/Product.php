<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

       // The attributes that should be cast to dates
       protected $dates = ['deleted_at']; // Specify deleted_at as a date

    protected $fillable=[
        'name',
        'description',
        'price',
        'stock'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
