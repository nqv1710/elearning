<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriesCourse;

class Courses extends Model
{
    protected $table = 'courses';
    use HasFactory;
    public $timestamps = TRUE;

    protected $fillable = [
        'name_course',
        'image',
        'category_id',
        'description',
    ];

    public function getAllCourses()
    {

        $courses = DB::table('courses')
            ->get();
        return $courses;
    }

    public function addCourse($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function deleteCourse($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
    public function findByOneCourse($id)
    {
        return DB::table($this->table)->where('id', $id)->get();
    }
    public function updateCourse($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
}
