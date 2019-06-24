@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Report</div>

                <div class="panel-body">
                    @if ($employee->registrations()->exists() )
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>day</th>
                                    <th>date</th>
                                    <th>attendance time</th>
                                    <th>exit time</th>
                                    <th>temprory out time</th>
                                    <th>return time</th>
                                    <th>total attendance hours</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employee->registrations as $registration)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($registration->day)->format('l') }}</td>
                                    <td>{{ Carbon\Carbon::parse($registration->day)->format('Y-i-d') }}</td>
                                    <td>
                                        {{ @$registration->attendance_registration ? Carbon\Carbon::parse($registration->attendance_registration)->format('h:i:s'):'Null'}}
                                    </td>
                                    <td>
                                        {{ @$registration->exist_registration ? Carbon\Carbon::parse($registration->exist_registration)->format('h:i:s'):'Null'}}
                                    </td>
                                    <td>
                                        {{ @$registration->temprory_out_registration ? Carbon\Carbon::parse($registration->temprory_out_registration)->format('h:i:s'):'Null'}}
                                    </td>
                                    <td>
                                        {{ @$registration->return_registration ? Carbon\Carbon::parse($registration->return_registration)->format('h:i:s') :'Null'}}
                                    </td>
                                    <td>
                                        {{ @$registration->diffIn}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="alert alert-success text-center">
                            <a href="{{url('reports/export/'. $employee->id)}}" class="btn btn-success btn-md">
                                Export employee report to xlsx
                            </a>
                        </div>
                    </div>
                    @else
                    no data !
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection