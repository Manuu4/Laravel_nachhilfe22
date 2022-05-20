<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    public function isFourthSemester() : bool {
        return $this->semester = 4;
    }

    public function scopeFourthSemester($query) {
        return $query->where('semester', '=', 4);
    }
    //in tinker: App\Models\Course::fourthSemester()->get();

    protected $fillable = ['name', 'description', 'semester'];
    //properties that are writable

    //Ein Kurs hat mehrere Nachhilfeangebote
    public function lessons() : HasMany {
        return $this->hasMany(Lesson::class);
    }
}
