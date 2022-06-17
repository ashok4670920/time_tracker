<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    use HasFactory;
    protected $table = "time_sheets";
    protected $primaryKey = "id"; 
    protected $fillable = [
        'clock_in',
        'user_id',
        'clock_out',
        'clock_in_lat',
        'clock_in_lng',
        'clock_out_lat',
        'clock_out_lng',
    ];

    public function breakLogs()
    {
        return $this->hasMany(BreakLog::class, 'time_sheet_id', 'id' );
    }
}
