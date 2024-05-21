<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('student_processes', function (Blueprint $table) {
            $table->string('process_num')->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('student_processes', function (Blueprint $table) {
            $table->dropColumn('process_num');
        });
    }
};
