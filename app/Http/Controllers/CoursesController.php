<?php

namespace App\Http\Controllers;

use App\Models\CategoriesCourse;
use App\Models\Courses;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\CourseRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $courses;
    private $categoriesCourse;
    public function __construct()
    {
        $this->courses = new Courses();
        $this->categoriesCourse = new CategoriesCourse();
    }
    public function index()
    {

        $title = 'Quản lý khóa học';
        $message = null;
        $courses = $this->courses->getAllCourses();
        return view('courses.index', compact('title', 'courses', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm khóa học';
        $message = null;
        $cate = $this->categoriesCourse->getNameCategoriesCourses();
        return view('courses.create', compact('title', 'cate', 'message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $message = 'Thêm thành công';
        $get_image = $request->image;
        $new_image = '';
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $extension = $get_image->getClientOriginalExtension();
            $new_image = $name_image . '.' . $extension;
            $get_image->move('../public/img', $new_image);
        } else {
            $this->courses->image = "";
        }
        $data = [
            'name_course' => $request->name_course,
            'image' =>  $new_image,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'created_at' => Carbon::now()

        ];
        $result = $this->courses->addCourse($data);
        $cate = $this->categoriesCourse->getNameCategoriesCourses();

        if ($result) {
            return view('courses.create', compact('message', 'cate'));
        } else {
            return redirect()->route('admin.courses.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = null;
        $cate = $this->categoriesCourse->getNameCategoriesCourses();

        if (!empty($id)) {
            $courses = $this->courses->findByOneCourse($id);
            if (!empty($courses[0])) {
                $courses = $courses[0];
            }
            return view('courses.edit', compact('courses', 'cate', 'message'));
        } else {
            return redirect()->route('admin.courses.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $message = 'Cập nhật thành công';
        $get_image = $request->image;
        $new_image = '';
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $extension = $get_image->getClientOriginalExtension();
            $new_image = $name_image . '.' . $extension;
            $get_image->move('../public/img', $new_image);
        } else {
            $this->courses->image = "";
        }
        
        if (!empty($id)) {
            $data = [
                'name_course' => $request->name_course,
                'image' => $new_image,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'updated_at' => Carbon::now()
            ];
            $result =   $this->courses->updateCourse($id, $data);
            $cate = $this->categoriesCourse->getNameCategoriesCourses();
            if ($result) {
                return view('courses.create', compact('message', 'cate'));
            } else {
                return redirect()->route('admin.courses.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!empty($id)) {
            $result = $this->courses->deleteCourse($id);
            if ($result > 0) {
                $message = 'Xóa thành công';
                $title = 'Quản lý khóa học';
                $courses = $this->courses->getAllCourses();
                return view('courses.index', compact('title', 'courses', 'message'));
            }
        }
    }
}
