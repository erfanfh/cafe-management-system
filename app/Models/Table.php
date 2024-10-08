<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'orders')->withPivot('quantity');
    }

    public function orders(): HasMany
    {
        return $this->HasMany(Order::class);
    }
}
