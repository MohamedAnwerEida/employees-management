@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employees list</div>

                <div class="panel-body">
                    <div class="text-center">
                        <a href="{{ url('/employees/add' ) }}" class="btn btn-info btn-lg">
                             Add <i class="fa fa-plus fa-fw"></i>
                        </a>
                    </div>
                    @if ($employees->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>identity</th>
                                        <th>full name</th>
                                        <th>options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)                                        
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>
                                                <a href="{{ url('/employees/edit/'.@$employee->id ) }}" class="btn btn-success btn-sm">
                                                     Edit <i class="fa fa-pencil fa-fw"></i>
                                                </a>
                                                <a href="{{ url('/employees/delete/'.@$employee->id ) }}" class="btn btn-danger btn-sm confirm"> delete <i class="fa fa-trash fa-fw"></i></a>
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