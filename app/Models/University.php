<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_name',
        'faculty_name',
        'uni_city',
        'uni_country'
    ];

    public static function getDistinctUniversityNames()
    {
        return self::select('university_name')->distinct()->pluck('university_name');
    }

    public static function getDistinctFacultyNames()
    {
        return self::select('faculty_name')->distinct()->pluck('faculty_name');
    }

    public function student(): HasMany
    {
        return $this->hasMany(Inbound_Student::class);
    }
}
