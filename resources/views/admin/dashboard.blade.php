@extends('layouts.dashboardLayout')


@section('styles')


@endsection
@section('pagetitle')
  <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
    </div>
@endsection
@section('content')
@include('includes.summaryheader')
 <div class="col-auto">
        <div class="card">
            <div class="card-body container" id="ajax">
                
            </div>
         </div>
    </div>
@endsection


@section('scripts')
 

@endsection