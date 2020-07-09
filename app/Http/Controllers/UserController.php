<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
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
        $admins = User::where('type', User::TYPE_ADMIN)->paginate(5);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $error = $this->userValidation($username, $password);
        if ($error) {
            return Redirect::back()->withErrors($error)->withInput($request->input());
        }
        $user = new User;
        $user->username = $username;
        $user->password = $password;
        $user->type = User::TYPE_ADMIN;
        $user->save();

        return Redirect::to('admin');
    }

    public function userValidation($username, $password, $id = null)
    {

        if (!$id) {
            $existingUser = User::where('username', $username)->first();
        } else {
            $existingUser = User::where('username', $username)
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
        return view('admin/edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $error = $this->userValidation($username, $password, $id);
        if ($error) {
            return Redirect::back()->withErrors($error)->withInput($request->input());
        }
        $admin = User::find($id);
        $admin->username = $username;
        $admin->password = $password;
        $admin->save();
        return Redirect::to('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::to('admin');
    }

    public function login(Request $request)
    {
        Sentinel::logout();
        $email = $request->input('email');
        $password = $request->input('password');
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        $user = Sentinel::authenticate($credentials);

        if (!$user) {
            return Redirect::back()->withErrors('Wrong credentials')->withInput($request->input());
        } else {
            return Redirect::to('dashboard');
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return Redirect::to('/admin/login');
    }
}
