<?php

namespace App\Http\Controllers\Website;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Providers\SocialFacebookAccountService;
use App\SocialFacebookAccount;
use App\User;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

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
    public function create(Request $request)
    {
        $providerUser = session(SocialFacebookAccount::PROVIDER_SESSION, null);
        \session()->forget(SocialFacebookAccount::PROVIDER_SESSION);
        return view('registration', compact('providerUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $avatar = $request->input('avatar');
        $provider_user_id = $request->input('provider_user_id');
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
            if ($provider_user_id) {
                return Redirect::to('/customers')->withErrors($e->getMessage())->withInput($request->input());
            } else {
                return Redirect::back()->withErrors($e->getMessage())->withInput($request->input());
            }
        }

        $customer = new Customer();
        $customer->phone = $phone;
        if ($avatar) {
            $customer->image_url = $avatar;
        } else {
            $customer->image_url = 'https://www.nepic.co.uk/wp-content/uploads/2016/11/blank-staff-circle-male.png';
        }
        $customer->gender = $gender;
        $customer->user_id = $user->id;
        $customer->save();


        if ($provider_user_id) {
            $socialAccount = new SocialFacebookAccount();
            $socialAccount->user_id = $user->id;
            $socialAccount->provider_user_id = $provider_user_id;
            $socialAccount->provider = 'facebook';
            $socialAccount->save();
            $this->autoLogin($socialAccount);
            return Redirect::to('/customers/' . $customer->id);
        } else {
            return Redirect::to('/customers');
        }

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
            return Redirect::back()->withErrors("You have been disabled for " . $delay . " min(s)");
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

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback(SocialFacebookAccountService $service)
    {
        $providerUser = $service->getProviderUser(Socialite::driver('facebook')->user());
        $account = SocialFacebookAccount::where('provider', 'facebook')
            ->where('provider_user_id', $providerUser->getId())
            ->first();
        if ($account) {
            $this->autoLogin($account);
        } else {
            $splitName = explode(' ', $providerUser->name, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
            $first_name = $splitName[0];
            $last_name = !empty($splitName[1]) ? $splitName[1] : ''; // If last name doesn't exist, make it empty
            $providerUser->first_name = $first_name;
            $providerUser->last_name = $last_name;
            return Redirect::to('/customers/create')->with(SocialFacebookAccount::PROVIDER_SESSION, $providerUser);
        }
    }

    public function autoLogin($account)
    {
        $user = Sentinel::findById($account->user_id);
        if ($user->hasAccess([User::ADMIN_PERMISSION])) {
            return Redirect::back()->withErrors('You do not have any customer access');
        } else {
            Sentinel::logout();
            Sentinel::login($user);
            return Redirect::to('/');
        }
    }
}
