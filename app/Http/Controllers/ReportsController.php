<?php

namespace App\Http\Controllers;

use App\User;
use App\employees_registration;
use Illuminate\Http\Request;
use Exporter;

class ReportsController extends Controller
{
    //
    public function index()
    {
        # view all reports list of employees
        $employees = User::orderBy('id', 'desc')->get();
        return view('reports.index', compact('employees'));
    }

    public function view($id)
    {
        # view  employee report
        $employee = User::findOrFail($id);
        if ($employee) {
            return view('reports.view', compact('employee'));
        }
    }

    public function export($id)
    {
        # view  employee report
        $employee = User::findOrFail($id);
        $employees_registration = employees_registration::where('user_id', $id)->get();
        if ($employees_registration) {
            $excel = Exporter::make('Excel');
            $excel->load($employees_registration);
            return $excel->stream($employee->name);
        }
    }
}
