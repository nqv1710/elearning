<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequests;
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

        $data = [
            'name' =>    $request->name,
            'email' =>   $request->email,
            'password' =>  Hash::make($request->password),
            'created_at' =>  date('Y-m-d H:i:s')

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequests $request, $id)
    {
        if (!empty($id)) {
            $userDetail = $this->users->findOneByID($id);
            if (!empty($userDetail[0])) {
                $data = [
                    'name' =>    $request->name,
                    'email' =>   $request->email,
                    'password' =>   $request->password,
                    'updated_at' =>  date('Y-m-d H:i:s')
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
