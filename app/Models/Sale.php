<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_id',
        'quantity',
        'purchase_price',
        'retail_price',
        'total_price',
        'stock_id',
//        'category_id'
    ];

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }


}
