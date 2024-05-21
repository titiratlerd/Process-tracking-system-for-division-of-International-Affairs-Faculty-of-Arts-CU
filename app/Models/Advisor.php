<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Advisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'advisor_fname',
        'advisor_lname',
        'advisor_email'
    ];

    public function student(): HasMany
    {
        return $this->hasMany(Inbound_Student::class);
    }
}
