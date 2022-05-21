<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Proposal extends Model
{
    use HasFactory;

    //Ein Vorschlag gehört zu einer Lehreinheit
    public function lesson() : BelongsTo {
        return $this->belongsTo(Lesson::class);
    }

    protected $fillable = ['time', 'message', 'status'];
    //properties that are writable

    //Ein Vorschlag gehört zu einem Nachhilfenehmer
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
