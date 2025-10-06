<?php

use App\Models\User;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail_url')->nullable();
            $table->longText('description');
            $table->longText('details');                      // product full details
            $table->decimal('price', 20, 2)->default(4);
            $table->integer('inventory')->default(0);         // what we have in stock
            $table->integer('discount_percent')->nullable();
            $table->boolean('featured')->default(false);      // show as featured product
            $table->boolean('reviewable')->default(true);     // customers can review product
            $table->string('status')->default('Active');      // active, inactive, draft, archived
            $table->foreignIdFor(User::class, 'created_by');  // who created this product
            $table->foreignIdFor(User::class, 'updated_by');  // who updated this product
            $table->foreignId('department_id')->index()->constrained();
            $table->foreignId('category_id')->index()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
