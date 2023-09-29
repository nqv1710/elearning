<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quizz;
use App\Models\Courses;

class QuizzController extends Controller
{
    //
    private $quiz;
    private $courses;


    public function __construct()
    {
        $this->quiz = new Quizz();
        $this->courses = new Courses();
    }
    public function index()
    {
        // $title = 'Quản lý người dùng';
        // $message = '';
        // dd($usersList);
        $listQuiz =   $this->quiz->getAllQuizzes();
        return view('quizzes.index', compact('listQuiz'));
    }

    public function create()
    {
        $message = null;
        $listCourses =   $this->courses->getAllCourses();
        return view('quizzes.create', compact('listCourses'));
    }
    public function store(Request $request)
    {
        return 'f';
    }
}
