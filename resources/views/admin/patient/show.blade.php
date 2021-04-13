@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Single Patient Deatails

    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('patient-list') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                        Patient Name
                        </th>
                        <td>
                            {{ $rooms->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Phone
                        </th>
                        <td>
                            {{ $rooms->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Email
                        </th>
                        <td>
                            {{ $rooms->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Register Date
                        </th>
                        <td>
                            {{ $rooms->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Password
                        </th>
                        <td>
                            {{ $rooms->password }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('patient-list') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection