@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registration</div>

                <div class="panel-body">
                    @if (\Session::has('msg'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('msg') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="text-center">
                        <a href="registration/attendance_registration" class="btn btn-info btn-md">
                            attendance registration
                        </a>
                        <a href="registration/exist_registration" class="btn btn-success btn-md">
                            exist registration
                        </a>
                        <a href="registration/temprory_out_registration" class="btn btn-danger btn-md">
                            temprory out registration
                        </a>
                        <a href="registration/return_registration" class="btn btn-warning btn-md">
                            return registration
                        </a>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>day</th>
                                    <th>attendance registration</th>
                                    <th>exist registration</th>
                                    <th>temprory out egistration</th>
                                    <th>return registration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ Carbon\Carbon::today()->format('Y-m-d')}} 
                                    </td>
                                    <td>
                                        {{ @$registration->attendance_registration ? $registration->attendance_registration :'Null'}} 
                                    </td>
                                    <td>
                                        {{ @$registration->exist_registration ? $registration->exist_registration :'Null'}} 
                                    </td>
                                    <td>
                                        {{ @$registration->temprory_out_registration ? $registration->temprory_out_registration :'Null'}} 
                                    </td>
                                    <td>
                                        {{ @$registration->return_registration ? $registration->return_registration :'Null'}} 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection