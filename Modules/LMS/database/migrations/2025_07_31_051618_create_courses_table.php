<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->json('name');                         // name[en,ar,ur]
            $table->json('description')->nullable();      // description[en]
            $table->json('objectives')->nullable();
            $table->json('requirements')->nullable();
            $table->json('outcomes')->nullable();

            $table->string('slug')->unique();             // SEO-friendly slug

            $table->decimal('fee', 10, 2)->nullable();     // actual numeric fee
            $table->string('price_display')->nullable();  // string for frontend
            $table->integer('duration_value')->nullable();// e.g. 6
            $table->string('duration_type')->nullable();  // weeks, months, etc.
            $table->integer('enrollments')->default(0);   // total enrolled
            $table->string('image')->nullable(); 
                     // uploaded path
            $table->string('currency', 10)->default('INR');

            $table->boolean('status')->default(true);     // active/inactive
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

