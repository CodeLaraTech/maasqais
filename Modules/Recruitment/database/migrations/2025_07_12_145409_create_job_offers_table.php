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
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('job_application_id');
            $table->string('employer_name');
            $table->string('candidate_name');
            $table->decimal('basic_salary', 15, 2)->default(0);
            $table->decimal('transport_allowance', 15, 2)->nullable()->default(0);
            $table->decimal('house_rent', 15, 2)->nullable()->default(0);
            $table->decimal('other_allowance', 15, 2)->nullable()->default(0);
            $table->decimal('gross_salary', 15, 2)->default(0);
            $table->string('currency', 3)->default('USD');
            $table->boolean('accommodation_available')->default(false);
            $table->date('offer_date')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offers');
    }
};
