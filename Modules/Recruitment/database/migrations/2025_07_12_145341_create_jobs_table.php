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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('customer_id')->nullable();
            $table->string('employer_name');
            $table->string('location');
            $table->string('type');
            $table->string('title');
            $table->string('slug')->nullable()->unique();
            $table->text('description')->nullable();
            $table->decimal('basic_salary', 15, 2)->nullable();
            $table->decimal('transportation', 15, 2)->nullable();
            $table->decimal('house_rent', 15, 2)->nullable();
            $table->decimal('other_allowances', 15, 2)->nullable();
            $table->boolean('accommodation')->default(false);
            $table->decimal('gross_salary', 15, 2)->nullable();
            $table->timestamp('posted_at')->nullable();
            $table->timestamp('expiry_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
