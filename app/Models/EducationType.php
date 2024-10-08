<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationType extends Model
{
    use HasFactory;


    protected $fillable = ['name','description','publish_status'];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function academicLevels()
    {
        return $this->hasMany(AcademicLevel::class);
    }
}
