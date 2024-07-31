<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'education_type_id'];

    public function educationType()
    {
        return $this->belongsTo(EducationType::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
