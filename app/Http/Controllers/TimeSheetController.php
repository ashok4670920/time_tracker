<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSheet;
use Carbon\Carbon;

class TimeSheetController extends Controller
{
    public function index(){
        return view('home');
    }
    
    public function clockin(Request $request){

        $request -> validate(
            [
                'user_id' => 'required'
            ]
            );
        $time = new TimeSheet;
        $time->user_id = $request['user_id'];
        $time->clock_in = Carbon::now();
        $time->clock_in_lat = $request['clock_in_lat'];
        $time->clock_in_lng = $request['clock_in_lng'];
        $time->save();

        return redirect('/view');
    }

    public function view()
    {
        $times = TimeSheet::all();
        $data = compact('times');
        return view('clockout')->with($data);
    }


    public function clockout($id, Request $request){
        $time = TimeSheet::find($id);
        if (is_null($time)){
            //not found
            return redirect('/view');
        }
        else{

            $time->clock_out = Carbon::now();
            $time->clock_out_lat = $request['clock_out_lat'];
            $time->clock_out_lng = $request['clock_out_lng'];
            $time->save();
            return redirect('/');
        }
    }

    public function time()
    {

    }
}