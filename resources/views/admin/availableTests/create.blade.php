@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Create New Test
        <!-- {{ trans('global.create') }} {{ trans('cruds.room.title_singular') }} -->
    </div>

    <div class="card-body">



    <form method="POST" action="{{ route("availale-tests-store") }}" enctype="multipart/form-data">
            @csrf  <div class="form-row">
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="room_id">Test Catagory</label>
                <select class="form-control select2 {{ $errors->has('room') ? 'is-invalid' : '' }}" name="catagory_id" id="room_id" required>
                    @foreach($rooms as $id => $room)
                        <option value="{{ $id }}" {{ old('room_id') == $id ? 'selected' : '' }}>{{ $room }}</option>
                    @endforeach
                </select>
                @if($errors->has('room'))
                    <div class="invalid-feedback">
                        {{ $errors->first('room') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.room_helper') }}</span>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="name">Test Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.name_helper') }}</span>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="testFee">Test Fee</label>
                <input class="form-control {{ $errors->has('testFee') ? 'is-invalid' : '' }}" type="number" name="testFee" id="testFee" value="{{ old('testFee', '') }}" step="1"required>
                @if($errors->has('testFee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('testFee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.capacity_helper') }}</span>
            </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="initialNormalValue">First Normal Range</label>
                <input class="form-control {{ $errors->has('initialNormalValue') ? 'is-invalid' : '' }}" type="initialNormalValue" name="initialNormalValue" id="initialNormalValue" value="{{ old('initialNormalValue', '') }}" step="1"required>
                @if($errors->has('initialNormalValue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('initialNormalValue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.capacity_helper') }}</span>
            </div>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="finalNormalValue">Final Normal Range</label>
                <input class="form-control {{ $errors->has('finalNormalValue') ? 'is-invalid' : '' }}" type="number" name="finalNormalValue" id="finalNormalValue" value="{{ old('finalNormalValue', '') }}" step="1"required>
                @if($errors->has('finalNormalValue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('finalNormalValue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.capacity_helper') }}</span>
            </div>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer05"></label>
      <!-- <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required> -->
      <div class="invalid-feedback">
        <!-- Please provide a valid zip. -->
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <label class="form-check-label" for="invalidCheck3">
      </label>
      <div class="invalid-feedback">
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>









<!-- 









        <form method="POST" action="{{ route("availale-tests-store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="room_id">Test Catagory</label>
                <select class="form-control select2 {{ $errors->has('room') ? 'is-invalid' : '' }}" name="catagory_id" id="room_id" required>
                    @foreach($rooms as $id => $room)
                        <option value="{{ $id }}" {{ old('room_id') == $id ? 'selected' : '' }}>{{ $room }}</option>
                    @endforeach
                </select>
                @if($errors->has('room'))
                    <div class="invalid-feedback">
                        {{ $errors->first('room') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.room_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">Test Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="testFee">Test Fee</label>
                <input class="form-control {{ $errors->has('testFee') ? 'is-invalid' : '' }}" type="number" name="testFee" id="testFee" value="{{ old('testFee', '') }}" step="1"required>
                @if($errors->has('testFee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('testFee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.capacity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="initialNormalValue">First Normal Range</label>
                <input class="form-control {{ $errors->has('initialNormalValue') ? 'is-invalid' : '' }}" type="initialNormalValue" name="initialNormalValue" id="initialNormalValue" value="{{ old('initialNormalValue', '') }}" step="1"required>
                @if($errors->has('initialNormalValue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('initialNormalValue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.capacity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="finalNormalValue">Final Normal Range</label>
                <input class="form-control {{ $errors->has('finalNormalValue') ? 'is-invalid' : '' }}" type="number" name="finalNormalValue" id="finalNormalValue" value="{{ old('finalNormalValue', '') }}" step="1"required>
                @if($errors->has('finalNormalValue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('finalNormalValue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.capacity_helper') }}</span>
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