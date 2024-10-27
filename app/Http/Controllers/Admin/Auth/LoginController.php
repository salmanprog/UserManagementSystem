<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function signup(Request $request)
    {
        if( $request->isMethod('post') )
            return self::_signup($request);

        return $this->__cbAdminView('auth.signup');
    }

    public function login(Request $request)
    {
        if( $request['auth_token'] != config('constants.ADMIN_AUTH_TOKEN') )
            return abort(404);

        if( $request->isMethod('post') )
            return self::_login($request);

        return $this->__cbAdminView('auth.login');
    }

    private function _login($request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $auth = User::auth('admin',$request['email'],$request['password']);
        if( $auth )
            return redirect()->route('admin.dashboard');
        else
            return redirect()->back()->with('error','Invalid credential');

    }

    private function _signup($request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => ['required','min:3','max:50','regex:/^([A-Za-z0-9\s])+$/'],
            'email'            => 'required|email|max:100|unique:users,email,NULL,deleted_at',
            'mobile_no_'        => [
                'required',
                'unique:users,mobile_no,NULL,deleted_at',
                //'regex:/^(\+?\d{1,3}[-])\d{9,11}$/'
            ],
            'password'         => [
                'required',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8,150}$/'
            ],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::createProfile($request->all());

        if( $user )
            return redirect()->route('admin.signup')->with('success','Account has been created successfully');
        else
            return redirect()->back()->with('error','Somthing went wrong please try again');

        
    }
}
