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
        Schema::table('universities', function (Blueprint $table) {
            $table->renameColumn('city', 'uni_city');
            $table->renameColumn('country', 'uni_country');
        });
    }

    public function down()
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->renameColumn('uni_city', 'city');
            $table->renameColumn('uni_country', 'country');
        });
    }
};
