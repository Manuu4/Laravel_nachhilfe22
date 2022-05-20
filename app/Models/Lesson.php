<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lesson extends Model
{
    use HasFactory;

    //Ein Nachhilfeangebot gehört zu einem Kurs
    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }

    protected $fillable = ['title', 'description', 'timeslot1', 'timeslot2', 'truetimeslot', 'status'];
    //properties that are writable

    //Ein Nachhilfeangebot gehört zu einem Nachhilfegeber
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
