@extends('customer.master')
@section('contents')
<table class="table">
    <thead>
        <th>Description</th>
        <th>amount</th>
        <th>quantity</th>
        <th>Total</th>
    </thead>
    <tbody>
        @if(count($carts) >= 1)
            @foreach($carts as $cart)
              
              
                <tr>
                    <td>{{$cart->name}}</td>
                     <td>{{$cart->amount}}</td>
                      <td>
                          <form>
                             <input type="hidden" id="itemid" value="{{$cart->id}}">
                              <input type="number" id="{{$cart->id}}" class="form-control input-sm" style="width:30%;" value="{{$cart->qty}}">
                          </form>
                      </td>
                       <td>{{$cart->qty * $cart->amount}}</td>
                     @php 
                    $g = $cart->qty * $cart->amount;
               $grandtotal += $g;
               @endphp
                </tr>            
            @endforeach
            <tr>
                <td colspan="3">Grand total:</td>
                <td>{{$grandtotal}}</td>
            </tr>
             <tr>
                <td colspan="3"></td>
                <td>
                <form action="{{route('customer.placeorder')}}" method="post">
                <input type="hidden" name="order_data" value="{{$carts}}"> 
                <input type="hidden" name="total" value="{{$grandtotal}}">
                <button class="btn btn-primary">Place order</button>
                </form>
                </td>
            </tr>
             @else
             <tr>
             <td colspan="4">
             <div class="alert alert-info"><center>YOUR CART IS EMPTY</center></div>
             </td>
             </tr>
        @endif
        
    </tbody>
</table>
@endsection