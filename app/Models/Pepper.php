<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pepper extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description'];

    public $timestamps = false;

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
