<?php

namespace App\Models;

use App\Models\EducationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicLevel extends Model
{
    use HasFactory;
    protected $fillable = ['education_type_id','name'];

    public function educationType()
    {
        return $this->belongsTo(EducationType::class);
    }
}
