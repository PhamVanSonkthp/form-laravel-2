<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->text('slug');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('category_id')->default(0);
            $table->bigInteger('price_import');
            $table->bigInteger('price_client');
            $table->bigInteger('price_agent');
            $table->bigInteger('price_partner')->default(0);
            $table->bigInteger('inventory')->default(0);
            $table->tinyInteger('product_visibility_id')->default(1);
            $table->bigInteger('group_product_id');
            $table->text('sku')->nullable();
            $table->bigInteger('provider_id')->default(0);
            $table->string('bar_code')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->tinyInteger('is_feature')->default(0);
            $table->timestamps();
            $table->index(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
