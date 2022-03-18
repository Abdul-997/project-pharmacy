<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'generic_name',
        'purchase_price',
        'retail_price',
        'medicine_code',
        'grams',
        'category_id',
        'medicine_name',
        'description'
    ];

    public function medicineCategory(){
        return $this->belongsTo(MedicineCategory::class);
    }
    public function stocks(){
        return $this->hasMany(Stock::class, 'medicine_id');
    }
    public function carts(){
        return $this->hasMany(Cart::class, 'medicine_id');
    }
    public function sales(){
        return $this->hasMany(sale::class, 'medicine_id');
    }
}
