<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Lesson;
use App\Http\Requests\LessonsRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LessonController extends Controller
{
    private $courses;
    private $lessons;
    public function __construct()
    {
        $this->courses = new Courses();
        $this->lessons = new Lesson();
    }
    //
    public function index()
    {
        $message = null;
        $listLessons = $this->lessons->getLessons();
         return view('lessons.index', compact('listLessons', 'message'));
    }
    public function create()
    {
        $message = null;
        $listCourses = $this->courses->getAllCourses();
        return view('lessons.create', compact('listCourses', 'message'));
    }
    public function store(Request $request)
    {
        $message = 'Thêm thành công';
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'courses_id' => $request->courses_id,
            'created_at' => Carbon::now()
        ];
        $listCourses = $this->courses->getAllCourses();
        $result =  $this->lessons->saveLessons($data);
        if ($result) {
            return view('lessons.create', compact('message','listCourses'));
        } else {
            return redirect()->route('admin.lessons.create', compact('message'));
        }
    }

    public function show($id)
    {
        $message = null;
        if (!empty($id)) {
            $listCourses = $this->courses->getAllCourses();
            $lesson = $this->lessons->findOneByLessons($id);
            if (!empty($lesson[0])) {
                $lesson = $lesson[0];
                return view('lessons.edit', compact('message', 'listCourses', 'lesson'));
            }
        }
    }
    public function update(LessonsRequest $request, $id)
    {
        $message = 'Cập nhật thành công';
        if (!empty($id)) {
            $listCourses = $this->courses->getAllCourses();
            $lesson = $this->lessons->findOneByLessons($id);
            if (!empty($lesson[0])) {
                $lesson = $lesson[0];
                $data = [
                    'title' => $request->title,
                    'content' => $request->content,
                    'courses_id' => $request->courses_id,
                    'updated_at' => Carbon::now()
                ];
                $result = $this->lessons->updateLessons($id, $data);
                if ($result) {
                    return view('lessons.edit', compact('message', 'listCourses', 'lesson'));
                } else {
                    return redirect()->route('admin.lessons.index', compact('message'));
                }
            }
        }
    }

    public function destroy($id)
    {
        $message = 'Xóa thành công';
        if (!empty($id)) {
            $result = $this->lessons->deleteLessons($id);

            if ($result) {
                $listLessons = $this->lessons->getLessons();
                return view('lessons.index', compact('listLessons', 'message'));
            } else {
            }
        }
    }
}
