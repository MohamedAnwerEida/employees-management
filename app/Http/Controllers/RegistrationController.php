<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\employees_registration;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    //
    public function index()
    {
        // home page for registration
        $registration = employees_registration::where('user_id', Auth::id())->where('day', Carbon::today())->first();
        return view('registration.index', compact('registration'));
    }

    public function exist_registration()
    {
        # code...
        $exist_registration = employees_registration::whereNotNull('attendance_registration')->whereNotNull('exist_registration')->where('user_id', Auth::id())->where('day', Carbon::today())->first();

        if (!$exist_registration) {
            $attendance_registration = employees_registration::whereNotNull('attendance_registration')->where('user_id', Auth::id())->where('day', Carbon::today())->first();
            if (!$attendance_registration) {
                return redirect()->back()->with('msg', 'you are did not attendance registration yet!');
            }else {
                # if not employee exist registration
                if ($attendance_registration->temprory_out_registration != null and $attendance_registration->return_registration == null) {
                    # code...
                    $attendance_registration->exist_registration = Carbon::now();
                    $attendance_registration->return_registration = Carbon::now();
                    $attendance_registration->save();
                    return redirect()->back()->with('msg', 'exist registration completed !');
                }
                $attendance_registration->exist_registration = Carbon::now();
                $attendance_registration->save();
                return redirect()->back()->with('msg', 'exist registration completed !');
            }
            
        } else {
            return redirect()->back()->with('msg', 'you are already done  exist registration !');
        }
    }

    public function temprory_out_registration()
    {
        # code...
        $exist_registration = employees_registration::whereNotNull('attendance_registration')->whereNotNull('exist_registration')->where('user_id', Auth::id())->where('day', Carbon::today())->first();
        if (!$exist_registration) {
            $attendance_registration = employees_registration::whereNotNull('attendance_registration')->where('user_id', Auth::id())->where('day', Carbon::today())->first();
            if (!$attendance_registration) {
                return redirect()->back()->with('msg', 'you are did not done attendance registration yet!');
            } else {
                $temprory_out_registration = employees_registration::whereNotNull('temprory_out_registration')->where('user_id', Auth::id())->where('day', Carbon::today())->first();
                if ($temprory_out_registration) {
                    return redirect()->back()->with('msg', 'you are already done temprory out registration !');
                }else {
                    # if not employee exist registration
                    $attendance_registration->temprory_out_registration = Carbon::now();
                    $attendance_registration->save();
                    return redirect()->back()->with('msg', ' temprory out registrationn completed !');
                }                
            }

        } else {
            return redirect()->back()->with('msg', 'you are already done  exist registration !');
        }

    }
    public function return_registration()
    {
        # code...
        $exist_registration = employees_registration::whereNotNull('attendance_registration')->whereNotNull('exist_registration')->where('user_id', Auth::id())->where('day', Carbon::today())->first();
        if (!$exist_registration) {
            $attendance_registration = employees_registration::whereNotNull('attendance_registration')->where('user_id', Auth::id())->where('day', Carbon::today())->first();
            if (!$attendance_registration) {
                return redirect()->back()->with('msg', 'you are did not done attendance registration yet!');
            } else {
                $temprory_out_registration = employees_registration::whereNotNull('temprory_out_registration')->where('user_id', Auth::id())->where('day', Carbon::today())->first();
                if (!$temprory_out_registration) {
                    return redirect()->back()->with('msg', 'you are did not done temprory out registration yet !');
                }else {
                    $return_registration = employees_registration::whereNotNull('return_registration')->where('user_id', Auth::id())->where('day', Carbon::today())->first();
                    if ($return_registration) {
                        return redirect()->back()->with('msg', 'you are already done return registration !');
                    }else {
                        # if not employee exist registration
                        $temprory_out_registration->return_registration = Carbon::now();
                        $temprory_out_registration->save();
                        return redirect()->back()->with('msg', 'return registration completed !');
                    }
                }                
            }

        } else {
            return redirect()->back()->with('msg', 'you are already done  exist registration !');
        }

    }

    public function attendance_registration()
    {
        $registration = employees_registration::whereNotNull('attendance_registration')->where('user_id', Auth::id())->where('day', Carbon::today())->first();
        
        if (!$registration) {
            # if not employee attendance_registration

            employees_registration::create([
                'attendance_registration' => Carbon::now(),
                'day' => Carbon::today(),
                'user_id' => Auth::id(),
            ]);
            return redirect()->back()->with('msg', 'attendance registration completed !');
        }else {
            return redirect()->back()->with('msg', 'you are already done attendance registration !');
        }
    }
}
