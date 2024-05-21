<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentProcess extends Model
{
    use HasFactory;

    protected $table = 'student_processes';


    protected $fillable = [
        'process_num',
        'process_name',
        'process_status',
        'semester',
        'year',
        'student_id'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Inbound_Student::class,'student_id');
    }

}
