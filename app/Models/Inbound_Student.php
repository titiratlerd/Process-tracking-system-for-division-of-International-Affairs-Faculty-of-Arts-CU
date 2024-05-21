<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inbound_Student extends Model
{
    use HasFactory;


    /*protected $hidden = [
        'passport_num'
    ];*/

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
    
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }


    public function advisor(): BelongsTo
    {
        return $this->belongsTo(Advisor::class);
    }

    public function student_process(): Hasmany
    {
        return $this->hasMany(StudentProcess::class, 'student_id');
    }


}
