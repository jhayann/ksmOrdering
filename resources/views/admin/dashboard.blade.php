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
                
          
        <div class="table-responsive">
         <table class="table">
    <thead>
        <th>User</th>
        <th>Items</th>
        <th>total</th>
        <th>Status</th>
        <th>date</th>
        <th>View</th>
    </thead>
    <tbody>
             @if(count($order) >=1)
              @foreach($order as $or)
            <tr>
               <td>{{$or->userid}}</td>
                <td>
                @php
                    $data = json_decode($or->order_data);
                    foreach($data as $ord)
                    {
                        echo $ord->name.' @'.$ord->amount. ' x ' .$ord->qty. '<br>';
                    }
                @endphp
                </td>
                <td>PHP {{$or->total}}</td>
                <td>
                    @php
                        if($or->status==0)
                        {
                        echo '<span class="badge badge-warning">pending</span>';
                        } else  if($or->status==1){
                          echo '<span class="badge badge-info">processing</span>';
                        } else  if($or->status==2){
                          echo '<span class="badge badge-success">completed</span>';
                        }
                        
                    @endphp
                </td>
                <td>{{$or->created_at}}</td>
                <td><a href="{{route('vieworder',$or->id)}}" class="btn btn-primary">view</a></td>
            </tr>     
        @endforeach
        @else 
            <tr>
                <td colspan="6">
                    <div class="alert alert-warning">No pending orders found</div>
                </td>
            </tr>
         @endif
    </tbody>
</table>
    </div>
   

        </div>
    </div>
</div>



@endsection


@section('scripts')

@endsection