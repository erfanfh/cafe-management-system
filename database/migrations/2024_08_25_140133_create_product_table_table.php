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
        Schema::create('product_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity')->default(1);
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
