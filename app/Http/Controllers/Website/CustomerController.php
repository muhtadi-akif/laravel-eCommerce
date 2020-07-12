<?php

namespace App\Http\Controllers\Website;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\User;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
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
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $password = $request->input('password');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $credentials = [
            'email' => $email,
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
        ];

        try {
            $user = Sentinel::registerAndActivate($credentials);
            $role = Sentinel::findRoleByName(User::ROLE_CUSTOMER);
            $role->users()->attach($user);
        } catch (\Exception $e) {
            return Redirect::back()->withErrors($e->getMessage())->withInput($request->input());
        }

        $customer = new Customer();
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
        Sentinel::logout();
        $email = $request->input('email');
        $password = $request->input('password');
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        try {
            $user = Sentinel::authenticate($credentials);
        } catch (ThrottlingException $exception) {
            $delay = floor($exception->getDelay() / 60);
            return Redirect::back()->withErrors("You have been disabled for ". $delay." min(s)");
        }


        if (!$user) {
            return Redirect::back()->withErrors('Wrong credentials')->withInput($request->input());
        } else if ($user->hasAccess([User::ADMIN_PERMISSION])) {
            return Redirect::back()->withErrors('You do not have any customer access');
        } else {
            return Redirect::to('/');
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return Redirect::to('/');
    }
}
