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
            $table->decimal('tax_rate', 5, 2)->default(0);    // tax rate percentage
            $table->decimal('cost_price', 20, 2)->default(0); // cost to acquire or make the product
            $table->integer('inventory')->default(0);         // what we have in stock
            $table->integer('security_stock')->default(0);    // minimum stock level before reordering
            $table->integer('discount_percent')->nullable();

            $table->boolean('is_featured')->default(false);      // show as featured product
            $table->boolean('is_reviewable')->default(true);     // customers can review product
            $table->boolean('is_returnable')->default(true);  // is product returnable
            $table->boolean('is_digital')->default(false);    // is product a digital good
            $table->boolean('is_taxable')->default(true);     // is product taxable
            $table->boolean('is_shippable')->default(true);   // does product require shipping
            $table->boolean('is_active')->default(true);      // is product active

            $table->string('status')->default('available');   // available, out_of_stock, discontinued, coming_soon
            $table->string('sku')->unique()->nullable();                  // stock keeping unit
            $table->string('barcode')->unique()->nullable();              // barcode number
            $table->decimal('weight', 8, 2)->default(0);      // weight in kg
            $table->foreignIdFor(User::class, 'created_by')->nullable();  // who created this product
            $table->foreignIdFor(User::class, 'updated_by')->nullable();  // who updated this product
            $table->foreignId('brand_id')->index()->nullable()->constrained();
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
