<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'medicine_id',
        'quantity',
        'manu_date',
        'exp_date',
        'pur_date',
        'status',
        'quantity_remained'
    ];
    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class, 'stock_id');
    }
}
