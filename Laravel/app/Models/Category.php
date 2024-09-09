<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name', 'description'];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
