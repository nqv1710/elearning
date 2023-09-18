<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Courses extends Model
{
    protected $table = 'courses';
    use HasFactory;
    public $timestamps = TRUE;

    protected $fillable = [
        'name',
        'image',
        'category_id',
        'description',
    ];
    public function getAllCourses()
    {
        $courses = DB::table($this->table)->get();
        return $courses;
    }
    public function addCourse($data)
    {
        return DB::table($this->table)->insert($data);
    }
}
