@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Create New Patient Category
        <!-- {{ trans('global.create') }} {{ trans('cruds.room.title_singular') }} -->
    </div>

    <div class="card-body">


    <form method="POST" action="{{ route("patient-category-store") }}" enctype="multipart/form-data">
            @csrf 
            <div class="form-row">
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="Pcategory">Enter Patient Category</label>
                <input class="form-control {{ $errors->has('Pcategory') ? 'is-invalid' : '' }}" type="text" name="Pcategory" id="Pname" value="{{ old('Pcategory', '') }}">

                @if($errors->has('Pcategory'))
                    <div class="invalid-feedback">
                        {{ $errors->first('Pcategory') }}
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
                <label class="required" for="discount">Discount</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', '') }}" required>
                @if($errors->has('discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.name_helper') }}</span>
            </div>
      <div class="valid-feedback">
        Looks good!
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
  <button class="btn btn-primary" type="submit">Submit</button>
</form>








@endsection