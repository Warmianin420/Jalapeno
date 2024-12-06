<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pepper_id',
        'quantity',
        'order_date',
        'items',
        'total_price',
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'items' => 'array', // Jeśli kolumna `items` przechowuje dane w formacie JSON
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pepper(): BelongsTo
    {
        return $this->belongsTo(Pepper::class, 'pepper_id');
    }
}
