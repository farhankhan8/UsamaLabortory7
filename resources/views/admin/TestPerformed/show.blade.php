
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Test Deatail
    </div>

    <div class="card-body">            
            <div class="form-row">
    <div class="col-md-2 mb-3">
    <div class="form-group">
               <b> <label  for="user_id">Test Catagory</label></b>
              
            <p>{{ $b->catagory->Cname }}</p>

            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="available_test_id">Test Name</label></b>
               


                <p>{{ $b->name }}</p>

            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>


    
    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="available_test_id">Patient Name</label></b>
               <p> {{ $a->Pname }}</p>


            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>








    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="state">Stander Charges</label></b>
             
<p>{{ $b->testFee+100 }}</p>


            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    
    <div class="col-md-2 mb-3">
        <div class="form-group">
                <b><label  for="start_time">Charged Amount</label></b>
           

                <p>{{ $b->testFee }}</p>


            </div>
    </div>
    <div class="col-md-2 mb-3">
        <div class="form-group">
                <b><label  for="">Status</label></b>
             <p>
                @if ($roo->state == 'Progressing')
                            <button class="btn btn-xs btn-info">{{ $roo->state ?? '' }}</button>
                               @elseif ($roo->state == 'Varified')
                               <button class="btn btn-xs btn-primary">{{ $rooms->state ?? '' }}</button>
                          
                               @elseif ($roo->state == 'Not Recived')
                               <button class="btn btn-xs  btn-warning">{{ $roo->state ?? '' }}</button>
                               @elseif ($roo->state =='Cancelled')
                               <button class="btn btn-xs btn-danger">{{ $roo->state ?? '' }}</button>
                             @else
                             I don't have any records!
                                 @endif
</p>

            </div>
    </div>



    
  </div>
  </div>


  <div class="card-body">



   
            
            
<div class="form-row">
<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="user_id">Test Time</label></b>
    <p>{{ $roo->start_time }}</p>




</div>
<div class="valid-feedback">
Looks good!
</div>
</div>



<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="available_test_id">Reporting Time</label></b>
   
    <p>{{ $roo->start_time }}</p>


</div>
<div class="valid-feedback">
Looks good!
</div>
</div>



<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="available_test_id">Normal Range</label></b>
   
<p>  {{ $b->initialNormalValue }}{{ $b->units ?? '' }}-{{ $b->finalNormalValue }}{{ $b->units ?? '' }}</p>


</div>
<div class="valid-feedback">
Looks good!
</div>
</div>








<div class="col-md-2 mb-3">
<div class="form-group">
    <!-- <b><label for="state">Select Test Status</label></b> -->
 



</div>
<div class="valid-feedback">
Looks good!
</div>
</div>

<div class="col-md-2 mb-3">
<div class="form-group">
    <!-- <b><label  for="start_time">{{ trans('cruds.event.fields.start_time') }}</label></b> -->
   


</div>
</div>
<div class="col-md-2 mb-3">
<div class="form-group">
    <!-- <b><label  for="start_time">{{ trans('cruds.event.fields.start_time') }}</label></b> -->
    


</div>
</div>







</div>
<div>




   
            
            
<div class="form-row">
<div class="col-md-12 mb-5">
<div class="form-group">
    <b><label  for="user_id">Result</label></b>
    <div style="background-color:gray;color:white;padding:20px;">
  <p>London is the capital city of England.London is the capital city of England.London is the capital city of England.London is the capital city of England. It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.
  </p>
</div> 




</div>
<div class="valid-feedback">
Looks good!
</div>
</div>


</div>

  <div class="col-md-3 mb-3">
  <button class="btn btn-primary"onclick="window.print()">Print Report</button>
  </div> 




  
@endsection