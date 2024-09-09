<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\PostLuggageRackFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LuggageRack extends Model
{
    use HasFactory;

    protected $table = 'luggage_racks';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ["name", "volume", "price", "image", 'stock'];

    protected static function newFactory(): Factory
    {
        return PostLuggageRackFactory::new();
    }
    public function customProducts(): HasMany
    {
        return $this->hasMany(CustomProduct::class);
    }
}
