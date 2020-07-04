<?php

namespace App\Http\Controllers\Website;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration');
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
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $error = (new UserController())->userValidation($username, $password);
        if ($error) {
            return Redirect::back()->withErrors($error)->withInput($request->input());
        }
        $user = new User;
        $user->username = $username;
        $user->password = $password;
        $user->type = User::TYPE_CUSTOMER;
        $user->save();

        $customer = new Customer();
        $customer->name = $name;
        $customer->email = $email;
        $customer->phone = $phone;
        $customer->image_url = 'https://www.nepic.co.uk/wp-content/uploads/2016/11/blank-staff-circle-male.png';
        $customer->gender = $gender;
        $customer->user_id = $user->id;
        $customer->save();
        return Redirect::to('/customers');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('profile', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $user = User::where('username', $username)->where('password', $password)
            ->where('type', User::TYPE_CUSTOMER)->first();
        if (!$user) {
            return Redirect::back()->withErrors('Wrong username or password')->withInput($request->input());
        } else {
            $customer = Customer::where('user_id', $user->id)->first();
            Session::put(User::SESSION_CUSTOMER_LOGIN, $customer);
            return Redirect::to('/');
        }
    }

    public function logout()
    {
        if (Session::has(User::SESSION_CUSTOMER_LOGIN)) {
            Session::forget(User::SESSION_CUSTOMER_LOGIN);
            return Redirect::to('/');
        }
    }
}
