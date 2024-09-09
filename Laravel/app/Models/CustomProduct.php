<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomProduct extends Model
{

    public function frame(): BelongsTo
    {
        return $this->BelongTo(Frame::class);
    }
    public function roue(): BelongsTo
    {
        return $this->BelongsTo(Wheel::class);
    }

    public function handlebars(): BelongsTo
    {
        return $this->BelongsTo(Handlebars::class);
    }

    public function moyendepropulsion(): BelongsTo
    {
        return $this->BelongsTo(PropulsionMethod::class);
    }
    public function pedale(): BelongsTo
    {
        return $this->BelongsTo(Pedal::class);
    }
    public function poignier(): BelongsTo
    {
        return $this->BelongsTo(Handle::class);
    }
    public function portebagage(): BelongsTo
    {
        return $this->BelongsTo(LuggageRack::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    use HasFactory;
}
