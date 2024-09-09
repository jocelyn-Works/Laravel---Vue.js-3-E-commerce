<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\PostPedalFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedal extends Model
{
    use HasFactory;


    protected $table = 'pedals';

    protected $fillable = ["name","color","material","price","image","stock"];

    protected $hidden = ['created_at','updated_at'];


    protected static function newFactory(): Factory
    {
        return PostPedalFactory::new();
    }
    public function customProducts(): HasMany
    {
        return $this->hasMany(CustomProduct::class);
    }
}
