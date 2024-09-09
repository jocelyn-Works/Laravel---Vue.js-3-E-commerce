<?php

namespace App\Models;

use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Order extends Model {

    use HasFactory, Notifiable, HasApiTokens;



    protected $table = 'orders';


    protected $primaryKey = 'id';


    protected $fillable = [
        'status',
        'created_at',
        'updated_at',
        'user_id',
        'custom_product_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }

    public function customProducts(): HasMany
    {
        return $this->hasMany(CustomProduct::class);
    }
}

