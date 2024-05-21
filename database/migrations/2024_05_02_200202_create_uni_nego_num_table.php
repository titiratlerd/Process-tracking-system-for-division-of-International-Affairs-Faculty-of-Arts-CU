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
        Schema::create('uni_nego_num', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')
            ->constrained('universities')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->integer('qty');
            $table->enum('semester', ['ภาคต้น', 'ภาคปลาย']);
            $table->integer('year');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uni_nego_num');
    }
};
