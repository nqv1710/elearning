<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequests;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $users;

    public function __construct()
    {
        $this->users = new User();
    }
    public function index()
    {
        $title = 'Quản lý người dùng';
        $message = '';
        $usersList = $this->users->getAllUsers();
        // dd($usersList);
        return view('users.index', compact('title', 'usersList', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = new Roles;
        // $title = 'Thêm người dùng';

        $message = null;
        return view('users.adduser', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequests $request)
    {
        $fileName = '';
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);
        }

        $data = [
            'name' =>    $request->name,
            'email' =>   $request->email,
            'password' =>  Hash::make($request->password),
            'profile_photo_path' => $fileName,
            'created_at' =>  Carbon::now()

        ];
        $this->users->saveUser($data);
        return view('users.adduser')->with('message', 'Thêm thành công');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = '';
        if (!empty($id)) {
            $userDetail = $this->users->findOneByID($id);
            if (!empty($userDetail[0])) {
                $userDetail = $userDetail[0];
                session(['id' => $userDetail->id]);
                return view('users.edituser', compact('userDetail'));
            } else {
                return redirect()->route('admin.users.index');
            }
        }
        return redirect()->route('admin.users.index');
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
    public function update(UserRequests $request, $id)
    {
        $fileName = '';
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);
        }
      


        if (!empty($id)) {
            $userDetail = $this->users->findOneByID($id);
            if (!empty($userDetail[0])) {
                $data = [
                    'name' =>    $request->name,
                    'email' =>   $request->email,
                    'password' =>  Hash::make($request->password),
                    'profile_photo_path' => $fileName,
                    'updated_at' => Carbon::now()
                ];
                $this->users->updateUser($data, $id);
                return redirect()->route('admin.users.index')->with('message', 'Cập nhật thành công');
            }
        }
        return redirect()->route('admin.users.index');
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
        if (!empty($id)) {

            $this->users->deleteUser($id);
            return redirect()->route('admin.users.index');
        }
        return 'delete';
    }
}
