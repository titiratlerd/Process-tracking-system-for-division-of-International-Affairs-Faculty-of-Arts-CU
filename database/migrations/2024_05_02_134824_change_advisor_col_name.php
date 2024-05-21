<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('advisors', function (Blueprint $table) {
            $table->renameColumn('email', 'advisor_email');
        });
    }

    public function down()
    {
        Schema::table('advisors', function (Blueprint $table) {
            $table->renameColumn('advisor_email', 'email');
        });
    }
};
