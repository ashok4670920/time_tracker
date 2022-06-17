<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'start',
        'end',
        'lat',
        'lng',
        'time_sheet_id',
    ];
}
