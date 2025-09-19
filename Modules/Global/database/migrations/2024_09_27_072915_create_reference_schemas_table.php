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
        Schema::create('reference_schemas', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique(); // e.g., 'sales_order', 'purchase_order', 'invoice'
            $table->string('prefix')->nullable(); // e.g., 'SO-', 'PO-', 'INV-'
            $table->integer('initial_value')->default(1);
            $table->integer('increment')->default(1);
            $table->integer('next_value')->default(1);
            $table->integer('digits')->default(6);
            $table->string('status')->default('active'); // Status of the schema
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_schemas');
    }
};
