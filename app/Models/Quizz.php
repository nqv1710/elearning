<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Quizz extends Model
{
    use HasFactory;
    protected $table = 'quizzs';
    public $timestamps = TRUE;
    protected $fillable = [
        'question',
        'optionA',
        'optionB',
        'optionC',
        'optionD',
        'answer',
        'lesson_id',
    ];

    public function getAllQuizzes()
    {
        return DB::table($this->table)->get();
    }
}
