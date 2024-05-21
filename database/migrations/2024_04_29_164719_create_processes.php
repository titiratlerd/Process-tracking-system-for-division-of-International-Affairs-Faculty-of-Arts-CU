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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->enum('step_id', range(1,13));
            $table->string('process_name',300);
            $table->enum('process_status',['Pending', 'Successful']);
            $table->string('deadline',300);
            $table->enum('semester',['ภาคต้น', 'ภาคปลาย']);
            $table->integer('year');
            $table->enum('exchange_type',['Inbound', 'Outbound']);  
            $table->string('done_by', 300)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
