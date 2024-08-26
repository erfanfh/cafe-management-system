<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
    ];

    public function tables(): BelongsToMany
    {
        return $this->belongsToMany(Table::class)->withPivot('quantity');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
