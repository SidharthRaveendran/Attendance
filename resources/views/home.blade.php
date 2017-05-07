@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Hi {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->attendance as $User)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($User->date)->format('d-m-Y') }}</td>
                                <td>{{ $User->attendance ? "Present" : "Absent" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <tr>
                                <th>Percentage</th>
                                <th>{{ Auth::user()->present->count() / Auth::user()->attendance->count() * 100 }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
