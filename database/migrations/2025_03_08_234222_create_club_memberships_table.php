<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('club_memberships', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('club_name');
            $table->date('membership_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('club_memberships');
    }
};

