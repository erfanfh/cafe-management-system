<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'product_table';

    protected $fillable = [
        'quantity',
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
