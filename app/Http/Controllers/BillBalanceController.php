<?php

namespace App\Http\Controllers;

use App\BillBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class BillBalanceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Locked');
    }
    public function Bill_list(){
        if(Input::get('date')== '') {
            $date = Carbon::now()->toDateString();
        }
        else{
            $date=Input::get('date');
        }
        return view('bill.bill_list',['date'=>$date]);

    }
    public function Bill_list_add(Request $request)
    {
        $request->created_at=$request->date.' 00:00:00.000000';

            BillBalance::create($request->all());
            return redirect()->back();

    }
    public function delete_topup_bill(Request $request){
        if(Gate::allows('is-superadmin')){
           if(BillBalance::where([['date',$request->created],['by_office','=',$request->local]])->delete()) {
               return redirect()->back();
           }
        }

    }
}
