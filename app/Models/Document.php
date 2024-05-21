<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory;

    public function processes(): BelongsToMany
    {
        return $this->belongsToMany(Processes::class, 'processes_documents');
    }
}
