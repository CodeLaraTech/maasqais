<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // {"en":"John Doe", "ur":"جان ڈو", "ar":"جون دو"}
            $table->json('bio')->nullable(); // {"en":"Bio text", "ur":"...", "ar":"..."}
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('photo')->nullable();
            $table->string('reference')->unique(); // SID from reference_schemas
            $table->string('password'); // hashed password
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('students');
    }
};
