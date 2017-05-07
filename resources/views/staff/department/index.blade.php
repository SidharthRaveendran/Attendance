@extends('staff.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Departments</div>

                <div class="panel-body">
                    <a class="btn btn-primary pull-right" href="{{ route('staff.department.create') }}">Add Department</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Departments as $Index => $Department)
                            <tr>
                                <td>{{ $Index + 1 }}</td>
                                <td>{{ $Department->name }}</td>
                                <td>{{ $Department->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection