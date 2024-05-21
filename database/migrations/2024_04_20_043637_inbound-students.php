<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    /* Before creating Inbound student mugration you have to create & migrate universities and advisors
    (the field that is included as a foriegn key in the table)*/
    public function up(): void
    {
        Schema::create('inbound__students', function (Blueprint $table) {
            $table->id();
            $table->enum('name_title', ['Mr.', 'Ms.', 'Mrs.']);
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('thai_fname', 100)->nullable();
            $table->string('thai_lname', 100)->nullable();
            $table->date('date_of_birth');
            $table->string('nationality', 100);
            $table->enum('sex', ['Male', 'Female']);
            $table->string('passport_num', 9)->unique();
            $table->string('address', 1000);
            $table->string('city', 500);
            $table->string('country', 1000);
            $table->string('zipcode', 10);
            $table->string('email', 100);

            $table->foreignId('university_id')
            ->constrained('universities')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->enum('degree', ["Bachelor", "Master", "Ph.D."]);
            $table->string('exchange_program', 100);
            $table->enum('semester', ['ภาคต้น', 'ภาคปลาย']);
            $table->integer('year');
            $table->enum('exchange_period', ['1 ปีการศึกษา', '1 ภาคเรียน']);
            $table->string('student_id', 10)->unique();
            $table->enum('inbound_type', ['F-level', 'U-level', 'Visiting','Visiting 7+1']);
            $table->enum('grading', ['ABCDF', 'S/U', 'V/W'])->default('ABCDF');
            $table->enum('english_test', ['IELTS', 'TOEFL']);
            $table->double('english_score');
            $table->enum('student_status', ['Active', 'Inactive'])->default('Active');
            $table->date('arrival_date')->nullable();


            $table->foreignId('advisor_id')
            ->nullable()
            ->constrained('advisors')
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
        Schema::dropIfExists('inbound__students');
    }
};
