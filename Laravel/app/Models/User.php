<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * Get the comments for the blog post.
     */

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'users';

    protected $fillable = ["first_name","last_name", "email", "password","civility","adress","city","phone_number","is_admin"];

    protected $hidden = ['password', 'remember_token',];

    public static function find(mixed $request)
    {
    }


    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

