<?php

namespace App\Http\Controllers;

use App\AranozUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = AranozUser::where('type', AranozUser::TYPE_ADMIN)->paginate(5);
        return view('admin/list', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $request->input('username');
        $password =  $request->input('password');
        $error = $this->userValidation($username, $password);
        if ($error) {
            return Redirect::back()->withErrors($error)->withInput($request->input());
        }
        $user = new AranozUser;
        $user->username = $username;
        $user->password = $password;
        $user->type = AranozUser::TYPE_ADMIN;
        $user->save();

        return Redirect::to('admin');
    }

    public function userValidation($username, $password, $id = null)
    {

        if (!$id) {
            $existingUser = AranozUser::where('username', $username)->first();
        } else {
            $existingUser = AranozUser::where('username', $username)
                ->where('id', '!=', $id)
                ->first();
        }

        if (!$username || !$password) {
            return ('Please insert your inputs correctly.');
        } else if ($existingUser) {
            return ('Username already taken. Please try some different username.');
        } else {
            return null;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = AranozUser::find($id);
        return view('admin/edit', compact('admin'));
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
        $username = $request->input('username');
        $password =  $request->input('password');
        $error = $this->userValidation($username, $password, $id);
        if ($error) {
            return Redirect::back()->withErrors($error)->withInput($request->input());
        }
        $admin = AranozUser::find($id);
        $admin->username = $username;
        $admin->password = $password;
        $admin->save();
        return Redirect::to('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = AranozUser::find($id);
       $user->delete();
       return Redirect::to('admin');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password =  $request->input('password');
        $user = AranozUser::where('username', $username)->where('password', $password)->where('type', AranozUser::TYPE_ADMIN)->first();
        if (!$user) {
            return Redirect::back()->withErrors('Wrong username or password')->withInput($request->input());
        } else {
            Session::put(AranozUser::SESSION_ADMIN_LOGIN, $user);
            return Redirect::to('dashboard');
        }
    }

    public function logout()
    {
        if (Session::has(AranozUser::SESSION_ADMIN_LOGIN)) {
            Session::forget(AranozUser::SESSION_ADMIN_LOGIN);
            return Redirect::to('/admin/login');
        }
    }
}
