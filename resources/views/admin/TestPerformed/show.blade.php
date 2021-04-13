@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.event.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('tests-performed') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.id') }}
                        </th>
                        <td>
                            {{ $rooms->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Test Name
                        </th>
                        <td>
                            {{ $rooms->availableTest->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Patient Name
                        </th>
                        <td>
                            {{ $rooms->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Test Fee
                        </th>
                        <td>
                            {{ $rooms->availableTest->testFee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Normal Range
                        </th>
                        <td>
                            {{ $rooms->availableTest->initialNormalValue }}-{{ $rooms->availableTest->finalNormalValue }}

                        </td>
                    </tr>
                    <tr>
                        <th>
                        Test Catagory
                        </th>
                        <td>
                            {{ $rooms->name }}
                        </td>
                    </tr>
                    <tr>
                  
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('tests-performed') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection