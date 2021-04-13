@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Performed New Test of Patiance
    </div>

    <div class="card-body">



    <form method="POST" action="{{ route("test-performed") }}" enctype="multipart/form-data">
            @csrf
            
            
            <div class="form-row">
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="user_id">Select Patient Name</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.user_helper') }}</span>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>



    <div class="col-md-4 mb-3">
           <div class="form-group">
                <label class="required" for="available_test_id">Select Test Name</label>
                <select class="form-control select2 {{ $errors->has('available_tests') ? 'is-invalid' : '' }}" name="available_test_id" id="available_test_id" required>
                    @foreach($availableTests as $id => $user)
                        <option value="{{ $id }}" {{ old('available_test_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('available_tests'))
                    <div class="invalid-feedback">
                        {{ $errors->first('available_tests') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.user_helper') }}</span>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>



    <div class="col-md-4 mb-3">
        <div class="form-group">
                <label class="required" for="start_time">{{ trans('cruds.event.fields.start_time') }}</label>
                <input class="form-control datetime {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.start_time_helper') }}</span>
            </div>

    </div>
  </div>


  <div class="col-md-3 mb-3">

  <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
  
  </form>





























<!-- 





        <form method="POST" action="{{ route("test-performed") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">Select Patient Name</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.user_helper') }}</span>
            </div>



            <div class="form-group">
                <label class="required" for="available_test_id">Select Test Name</label>
                <select class="form-control select2 {{ $errors->has('available_tests') ? 'is-invalid' : '' }}" name="available_test_id" id="available_test_id" required>
                    @foreach($availableTests as $id => $user)
                        <option value="{{ $id }}" {{ old('available_test_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('available_tests'))
                    <div class="invalid-feedback">
                        {{ $errors->first('available_tests') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_time">{{ trans('cruds.event.fields.start_time') }}</label>
                <input class="form-control datetime {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.start_time_helper') }}</span>
            </div>


        
      
          
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
 -->


@endsection