
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Catagory Deatail
    </div>

    <div class="card-body">            
            <div class="form-row">
    <div class="col-md-2 mb-3">
    <div class="form-group">
               <b> <label  for="user_id">Test Catagory</label></b>
              
            <p>{{  $rooms->Cname ?? '' }}</p>

            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
 


    
    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="available_test_id">Test in Catagory</label></b>
               <p> {{ $testName ?? '' }}</p>


            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>








   



    
  </div>
  </div>


  <div class="card-body">












</div>
<div>


 




</div>

  <div class="col-md-3 mb-3">
  <button class="btn btn-primary">
  <a class="btn btn-primary" href="{{ route('catagory-list') }}">
  Back
                </a>
  </button>
  </div> 




  
@endsection