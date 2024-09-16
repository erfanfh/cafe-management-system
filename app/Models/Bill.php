<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'price',
    ];

    public function orders(): BelongsToMany
    {
        return $this->BelongsToMany(Order::class);
    }
}
