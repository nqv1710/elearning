<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lesson extends Model
{
    use HasFactory;
    protected $table = 'lessons';

    public $timestamps = TRUE;

    protected $fillable = [
        'title',
        'content',
        'courses_id',
    ];

    public function getLessons()
    {
        return DB::table($this->table)->get();
    }
    public function saveLessons($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function findOneByLessons($id)
    {
        return DB::table($this->table)->where('id', $id)->get();
    }
    public function updateLessons($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function deleteLessons($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
