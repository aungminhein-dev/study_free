<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question_group_id', 'type', 'question_text', 'options', 'answer'];

    protected $casts = [
        'options' => 'array', // Cast the JSON field to an array
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
