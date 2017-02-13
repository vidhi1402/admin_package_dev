<?php

namespace Aii\Admin\Controller\Auth;

use Aii\Admin\Controller\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends AdminController
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'showLoginForm', 'login']]);
    }

    public function ShowLoginForm()
    {
        return view('admin::auth.login');
    }
    public function logout(Request $request)
    {
       // dd( $request->session()->all());
        $this->guard()->logout();


        //$request->session()->flush();

        $request->session()->regenerate();

        return redirect()->route('admin.auth.login');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
