<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class employees_registration extends Model
{
    //
    protected $table = 'employees_registration';
    protected $fillable = [
        'user_id', 'attendance_registration', 'exist_registration', 'temprory_out_registration', ' return_registration', 'day'
    ];
    public $timestamps = false;

    public function getDiffInAttribute(){
        if ($this->attributes['attendance_registration'] and $this->attributes['exist_registration']) {
            $attendance_registration = Carbon::parse($this->attributes['attendance_registration']);
            
            $exist_registration = Carbon::parse($this->attributes['exist_registration']);
            $time_all = $attendance_registration->diffInSeconds($exist_registration);

            if ($this->attributes['temprory_out_registration'] and $this->attributes['return_registration']) {
                $temprory_out_registration = Carbon::parse($this->attributes['temprory_out_registration']);
                $return_registration = Carbon::parse($this->attributes['return_registration']);
                $time_out = $temprory_out_registration->diffInSeconds($return_registration);
                $time_all =$time_all - $time_out;
            }
            return  gmdate("H:i:s", $time_all);
        }
        return 'information not complete !';
    }

    
}
