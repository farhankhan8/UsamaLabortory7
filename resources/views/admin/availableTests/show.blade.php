@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Test Deatials
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('available-tests') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                        Test Catagory
                        </th>
                        <td>
                            {{ $rooms->catagory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Test Name
                        </th>
                        <td>
                            {{ $rooms->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Test Fee
                        </th>
                        <td>
                            {{ $rooms->testFee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        First Normal Range
                        </th>
                        <td>
                            {{ $rooms->initialNormalValue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Final Normal Range
                        </th>
                        <td>
                            {{ $rooms->finalNormalValue }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('available-tests') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection