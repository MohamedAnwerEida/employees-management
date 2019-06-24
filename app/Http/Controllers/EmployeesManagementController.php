<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;

class EmployeesManagementController extends Controller
{
    // 
    public function index()
    {
        # view all list of employees
        $employees = User::orderBy('id', 'desc')->get();
        return view('employees.index', compact('employees'));
    }
    public function add()
    {
        # add new employee
        
        return view('employees.add');
    }

    public function insert(Request $request)
    {
        # insert new employee
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $input = $request->only(['email', 'name', 'password']);
            User::create($input);
        }
        return redirect('employees/');
    }

    public function edit($id)
    {
        // edit employee info
        $employee = User::findOrFail($id);
        if ($employee) {
            return view('employees.edit', compact('employee'));
        }
    }

    public function delete($id)
    {
        // delete employee 
        $employee = User::findOrFail($id);
        if ($employee) {
            $employee->delete();
            return redirect('employees/');
        }
    }

    public function update(Request $request, $id)
    {
        // update info
        $employee = User::findOrFail($id);
        if ($employee) {
            $validator = Validator::make($request->only(['email', 'name']), [
                'name' => 'required|string|max:119',
                'email' => 'required|string|email|unique:users,email,'.$employee->id,
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->save();
            }
        }
        return redirect('employees/edit/'.$employee->id);;
    }
}
