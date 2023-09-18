<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $courses;
    public function __construct()
    {
        $this->courses = new Courses();
    }
    public function index()
    {
        $title = 'Quản lý khóa học';
        $courses = $this->courses->getAllCourses();
        return view('courses.index', compact('title', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm khóa học';
        return view('courses.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courses = new Courses();

        $get_image = $request->image;
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $extension = $get_image->getClientOriginalExtension();
            $new_image = $name_image . '.' . $extension;
            $get_image->move('../public/img', $new_image);
            $courses->image = $new_image;
        } else {
            $courses->image = "";
        }
        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $request->image,
            'description' => $request->description,
        ];
        $this->courses->addCourse($data);
        if ($this->courses->addCourse($data)) {
            return redirect()->route('courses.index')->with('msg', 'Thêm khóa học ' . $request->name . 'thành công');
        } else
            return redirect()->route('courses.index')->with('msg', 'Thêm khóa học thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $id = $request->id;
        // $request->session()->put('id', $id);
        $courses = Courses::where('id', $id)->get();
        $title = 'Chỉnh sửa khóa học';
        dd($courses);
        // return view('courses.update', compact('courses', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
