@extends('customer.master')
@section('contents')
<table class="table">
    <thead>
        <th>Items</th>
        <th>total</th>
        <th>Status</th>
        <th>date</th>
    </thead>
    <tbody>
             @if(count($order) >=1)
              @foreach($order as $or)
            <tr>
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
            </tr>     
        @endforeach
        @else 
            <tr>
                <td colspan="4">
                    <div class="alert alert-warning">No orders found</div>
                </td>
            </tr>
         @endif
    </tbody>
</table>

@endsection