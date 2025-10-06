<?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->string('discount_code')->nullable();
            $table->double('discount')->default(0.00);
            $table->double('subtotal')->default(0.00);
            $table->double('shipping')->default(0.00);
            $table->double('tax')->default(0.00);
            $table->double('total')->default(0.00);
            $table->string('currency')->default('ZAR');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
