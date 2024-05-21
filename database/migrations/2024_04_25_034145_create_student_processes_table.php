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
        Schema::create('student_processes', function (Blueprint $table) {
            $table->id();
            $table->string('process_name',300);
            $table->enum('process_status',['Pending', 'Done']);
            $table->enum('semester', ['ภาคต้น', 'ภาคปลาย', 'ภาคฤดูร้อน']);
            $table->integer('year');
            $table->foreignId('student_id')
            ->constrained('inbound__students')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_processes');
    }
};
