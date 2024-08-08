<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'academic_level_id'];

    public function academicLevel()
    {
        return $this->belongsTo(AcademicLevel::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
