<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Courses;

class CategoriesCourse extends Model
{
    protected $table = 'categories_course';
    use HasFactory;
    public $timestamps = TRUE;

    protected $fillable = [
        'name_category_courses',
        'slug',
    ];

    public function getAllCategoriesCourses()
    {
        $categoriesCourse = DB::table($this->table)->get();
        return $categoriesCourse;
    }

    public function getNameCategoriesCourses()
    {
        $categoriesCourse = DB::table($this->table)->select()->get();
        return $categoriesCourse;
    }

    public function saveCategoriesCourse($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function findByCategoryCourseID($id)
    {
        return DB::table($this->table)->where('id', $id)->get();
    }

    public function updateCategoryCourse($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function deleteCategoryCourse($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }


}
