@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-xl-3 col-sm-6 py-2">
                <a href="#">
                    <div class="card card-1 text-white h-100">
                        <div class="card-body card-1">
                            <div class="rotate">
                                <i class="fa fa-money-check fa-4x"></i>
                            </div>
                            <h5 class="mb-5">Number Of Varified Test Today</h5>
                            <h3 class="amount-position"> fgsf</h3>

                            
                        </div>
                    </div>
                </a>
            </div>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection