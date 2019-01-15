<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create_staff_form(Request $request)
    {
       return view('staff.create');

    }

    /**
     * @param Request $request
     * @return string
     */
    public function create_staff(Request $request)
    {
        if(Gate::allows('is-superadmin')){
            $rule=['name'=>'required|unique:users|max:23','password'=>'required|max:13','email'=>'required|email|unique:users,email'];

            $validation=Validator::make($request->all(),$rule);
            if(!$validation->fails()){
                $request->offsetUnset('_token');
                $request->password=bcrypt('password');
              User::insert($request->all());
                Session::put('created','successfully created');

            }
            return Redirect::intended('admin/create_staff_form')
                ->withErrors($validation)
                ->withInput();

        }

    }
}
