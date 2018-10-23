@extends('layouts.dashboardLayout')


@section('styles')
<style>

</style>
@endsection
@section('pagetitle')
  <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Orders</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
    </div>
@endsection
@section('content')

    <div class="container">
        @if(count($order) != null)
           <br>
         
            <table class="table table-bordered">
                <thead>
                    <th colspan="5">Order Details</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Name: </td>
                        <td colspan="2">{{$order[0]->firstname. " " . $order[0]->middlename . " " . $order[0]->lastname}} </td>
                        <td>Date:</td>
                        <td>{{$order[0]->created_at}}</td>
                    </tr>
                    <tr>
                       <td>Address: </td>
                        <td colspan="4" style="text-align:left">{{$order[0]->address}}</td>
                    </tr>
                    <tr>
                        <td>Mobile number: </td>
                        <td colspan="4" style="text-align:left">{{$order[0]->number}}</td>
                    </tr>
                    <tr><td colspan="5"></td></tr>
                  <thead>
                      <th colspan="2">ITEM</th>
                      <th>amount</th>
                      <th>quantity</th>
                      <th>TOTAL</th>
                  </thead>
                  @php
                   $gtotal=0;
                    $data = json_decode($order[0]->order_data)
                     @endphp
                    @foreach($data as $ord)
                    @php
                       
                       @endphp
                        <tr>
                            <td colspan="2">{{$ord->name}}</td>
                            <td>{{$ord->amount}}</td>
                            <td>{{$ord->qty}}</td>
                            <td>{{ $ord->qty * $ord->amount }} </td>
                        </tr>
                    @php
                        $g = $ord->qty * $ord->amount;
                       $gtotal += $g;
                       @endphp
                    @endforeach
                      
                   <tr>
                       <td colspan="4"><h4>Amount Due:</h4></td>
                       <td><h3>PHP {{$gtotal}}</h3></td>
                   </tr>
                </tbody>
            </table>
            <br>
            <form action="{{route('completeorder')}}" method="post">
            <input type="hidden" name="orderid" value="{{$order[0]->id}}">
            <input type="hidden" name="fname" value="{{$order[0]->firstname}}">
            <input type="hidden" name="mobile" value="{{$order[0]->number}}">
            <button class="btn btn-primary">Complete this order</button>
            </form>
            @else
            <div class="alert alert-danger">INVALID DATA RECEIVED. TRY AGAIN</div>
        @endif
    </div>
@endsection