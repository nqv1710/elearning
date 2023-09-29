<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriesCourseRequest;
use App\Models\CategoriesCourse;

use Carbon\Carbon;



class CategoriesCourseController extends Controller
{
    private $categoriesCourse;

    public function __construct()
    {
        $this->categoriesCourse = new CategoriesCourse();
    }
    public function index()
    {
        $title = 'Quản lý thể loại khóa học';
        $message = '';
        $listCategories =  $this->findAll();
        return view('categories-course.index',compact('listCategories'));
    }

    private function findAll()
    {
        $listCategories = $this->categoriesCourse->getAllCategoriesCourses();
        return $listCategories;
    }

    public function create()
    {
        $message = null;
        return view('categories-course.addcategories', compact('message'));
    }

    public function store(CategoriesCourseRequest $request)
    {
        $data = [
            'name_category_courses' => $request->name_category_courses,
            'slug' => $request->slug,
            'created_at' => Carbon::now()
        ];

        $this->categoriesCourse->saveCategoriesCourse($data);
        $message = 'Thêm thành công';
        return view('categories-course.addcategories', compact('message'));
    }

    public function show($id)
    {
        $message = null;
        if (!empty($id)) {

            $categoriesCourse = $this->categoriesCourse->findByCategoryCourseID($id);
            if (!empty($categoriesCourse[0])) {
                $categoriesCourse = $categoriesCourse[0];
            }
            return view('categories-course.editcategories', compact('categoriesCourse', 'message'));
        } else {
            return redirect()->route('admin.categories-course.index');
        }
    }

    public function update(CategoriesCourseRequest $request, $id)
    {
        $message = 'Cập nhật thành công';
        if (!empty($id)) {

            $categoriesCourse = $this->categoriesCourse->findByCategoryCourseID($id);
            if (!empty($categoriesCourse[0])) {
                $categoriesCourse = $categoriesCourse[0];


                $data = [
                    'name_category_courses' => $request->name_category_courses,
                    'slug' => $request->slug,
                    'updated_at' => Carbon::now()
                ];
                $this->categoriesCourse->updateCategoryCourse($data, $id);
            }
            return view('categories-course.editcategories', compact('categoriesCourse', 'message'));
        } else {
            return redirect()->route('admin.categories-course.index');
        }
    }

    public function destroy($id)
    {
        $message = 'Xóa thành công';

        if (!empty($id)) {
            $this->categoriesCourse->deleteCategoryCourse($id);
            $listCategories =  $this->findAll();
            return view('categories-course.index', compact('message', 'listCategories'));
        } else {
            return redirect()->route('admin.categories-course.index');
        }
    }
}
