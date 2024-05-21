<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Process extends Model
{
    use HasFactory;

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class, 'processes_documents');
    }
}
