<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'publish_status', 'chapter_id', 'user_id'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function subject()
    {
        return $this->hasOneThrough(Subject::class, Chapter::class, 'id', 'id', 'chapter_id', 'subject_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
