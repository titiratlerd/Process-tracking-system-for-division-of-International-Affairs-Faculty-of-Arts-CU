<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [

        'name_title',
        'firstname',
        'lastname',
        'thai_fname',
        'thai_lname',
        'date_of_birth',
        'nationality',
        'sex',
        'passport_num',
        'address',
        'city', 
        'country',
        'zipcode',
        'email',
        'university_id',
        'degree',
        'exchange_program',
        'semester',
        'year',
        'exchange_period',
        'student_id',
        'inbound_type',
        'grading',
        'english_test',
        'english_score',
        'student_status',
        'arrival_date',
        'advisor_id',
    ];


}
