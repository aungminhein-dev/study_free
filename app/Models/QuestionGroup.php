<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'publish_status', 'chapter_id', 'user_id'];

    // This assumes that the question group is directly related to a chapter
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    // You can access the subject through the chapter
    public function subject()
    {
        return $this->hasOneThrough(Subject::class, Chapter::class, 'id', 'id', 'chapter_id', 'subject_id');
    }
}
