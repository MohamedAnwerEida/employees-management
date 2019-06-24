@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employees Reports list</div>

                <div class="panel-body">
                    @if ($employees->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>identity</th>
                                    <th>full name</th>
                                    <th>report</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>
                                        <a href="{{ url('/reports/view/'.@$employee->id ) }}"
                                            class="btn btn-primary btn-sm">
                                            view <i class="fa fa-eye fa-fw"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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