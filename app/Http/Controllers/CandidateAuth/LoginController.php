<?php

namespace App\Http\Controllers\CandidateAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use URL;
use Session;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/candidate/home';
    public $loginPath = '/candidate/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('candidate.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if(URL::previous() != url('/')){
            session()->put('backUrl', URL::previous());
        }
        
        return view('candidate.auth.login');
    }

    public function username()
    {
        $identity  = request()->get('username');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
        // return 'email';
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect('/candidate/login')->withErrors(['status' => "Username and password doesn't match"])->withInput();
    }

    public function redirectPath()
    {
        return (session()->get('backUrl') &&  session()->get('backUrl') != url('/')) ? session()->get('backUrl') : $this->redirectTo;   
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */

    public function loginWithGmail(){
        return Socialite::driver('google')->redirect();
    }

    protected function guard()
    {
        return Auth::guard('candidate');
    }


}
