<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BreakLog;
use App\Models\TimeSheet;
use Carbon\Carbon;

class BreakLogsController extends Controller
{
    public function breakIn(TimeSheet $timesheet){
        $break = new BreakLog;
        $break->start = Carbon::now();
        $break->time_sheet_id = $timesheet->id;
        $break->lat = '1';
        $break->lng = '1';
        $break->save();

        return redirect('/');

    }

    public function breakOut($id)
    {
        $break = BreakLog::find($id);
        if(is_null($break)){
            return redirect('/');
        }
        else{
            $break->end = Carbon::now();
            $break->save();
            return redirect('/');
        }
        
    }
}
