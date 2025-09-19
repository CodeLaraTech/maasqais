<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('students_users', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique(); // SID
            $table->string('username')->unique();
            $table->string('email')->nullable();   // optional, used if you want to send email
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('students_users');
    }
};
