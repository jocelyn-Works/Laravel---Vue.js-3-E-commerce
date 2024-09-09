<?php

use App\Models\Frame;
use App\Models\Handlebars;
use App\Models\LuggageRack;
use App\Models\Order;
use App\Models\Pedal;
use App\Models\Handle;
use App\Models\PropulsionMethod;
use App\Models\Wheel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_products', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignIdFor(Frame::class);
            $table->foreignIdFor(PropulsionMethod::class);
            $table->foreignIdFor(Wheel::class);
            $table->foreignIdFor(LuggageRack::class);
            $table->foreignIdFor(Handlebars::class);
            $table->foreignIdFor(Pedal::class);
            $table->foreignIdFor(Handle::class);
            $table->foreignIdFor(Order::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_products');
    }
};
