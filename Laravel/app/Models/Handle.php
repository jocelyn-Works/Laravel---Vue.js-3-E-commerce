<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\PostHandleFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Handle extends Model
{
    use HasFactory;

    protected $table = 'handles';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ["name", "color","material", "price", "image"];


    protected static function newFactory(): Factory
    {
        return PostHandleFactory::new();
    }
    public function customProducts(): HasMany
    {
        return $this->hasMany(CustomProduct::class);
    }
}
