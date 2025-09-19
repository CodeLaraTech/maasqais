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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('reference',255)->unique();
            $table->string('opp_from');
            $table->string('lead_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('value')->nullable();
            $table->string('status', 20)->default('Open');
            $table->date('expected_close_date')->nullable();
            $table->date('followup_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
