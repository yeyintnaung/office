<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class StaffController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Locked');
    }

    public function show_staff()
    {
        if (Gate::allows('is-superadmin')) {
            $users = User::all();
            return view('staff.all', ['users' => $users]);


        }


    }

    public function show_staff_topup()
    {
        if (Gate::allows('is-superadmin')) {
            $users =DB::connection('mysql2')->table('users')->get();
            return view('staff.all_topup', ['users' => $users]);


        }


    }
    public function lock($id)
    {
        if (Gate::allows('is-superadmin')) {
            $users = User::find($id)->update(['role'=>'locked']);
            $to_in_u=User::where('id',$id)->first();
            DB::table('lock_transaction')->insert(['user'=>$to_in_u->username,'approve_by'=>Auth::user()->id,'status'=>'locked','server'=>'main']);
            return redirect()->back();


        }


    }
    public function active($id)
    {
        if (Gate::allows('is-superadmin')) {
            $users = User::find($id)->update(['role'=>'Staff']);
            $to_in_u=User::where('id',$id)->first();
            DB::table('lock_transaction')->insert(['user'=>$to_in_u->username,'approve_by'=>Auth::user()->id,'status'=>'reactive','server'=>'main']);
            return redirect()->back();


        }


    }
    public function lock_topup($id)
    {
        if (Gate::allows('is-superadmin')) {
            $users = DB::connection('mysql2')->table('users')->where('id',$id)->update(['role'=>'locked']);
            $to_in_u= DB::connection('mysql2')->table('users')->where('id',$id)->first();
            DB::table('lock_transaction')->insert(['user'=>$to_in_u->name,'approve_by'=>Auth::user()->id,'status'=>'locked','server'=>'topup']);
            return redirect()->back();


        }


    }
    public function active_topup($id)
    {
        if (Gate::allows('is-superadmin')) {
            $users =DB::connection('mysql2')->table('users')->where('id',$id)->update(['role'=>2]);
            $to_in_u=DB::connection('mysql2')->table('users')->where('id',$id)->where('id',$id)->first();
            DB::table('lock_transaction')->insert(['user'=>$to_in_u->name,'approve_by'=>Auth::user()->id,'status'=>'reactive','server'=>'topup']);
            return redirect()->back();


        }


    }

}
