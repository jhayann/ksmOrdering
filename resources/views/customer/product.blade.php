@extends('customer.master')


@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Available products</li>
    </ol>
</nav>

    @if(count($products)>0)
    <div class="card-columns">
    @foreach($products as $product)
    <a href="#" data-toggle="modal" data-target="#{{$product->id}}">
        <div class="card">
            <img class="card-img-top" src="{{URL::to('img/portfolio/fullsize')}}/{{$product->image}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$product->name. ", Price:". $product->amount}}</h5>
                <small> {{$product->categorie}}</small>
                <p class="card-text">Volume: {{$product->volume}}<br>
                    {{$product->details}}
                </p>
            </div>
        </div>
        
    </a>
    
    <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order {{$product->name}}</h5>
                    <!--      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <img class="card-img-top" style="width:200px;height:200px;" src="{{URL::to('img/portfolio/fullsize')}}/{{$product->image}}" alt="Card image cap">
                        </div>
                        <div class="col-sm-7">
                            <h4 style="color:green"><i class="fa fa-shopping-bag"></i> <b>{{$product->name}}</b></h4>
                            <h4><i class="fa fa-money"></i> Price: <b>{{$product->amount}}</b></h4>
                            Categorie: {{$product->categorie}}
                            <p class="card-text">Volume: {{$product->volume}}<br>
                                Description:<br>
                                {{$product->details}}
                            </p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"> <i class="fa fa-shopping-cart"></i> Place order now</button>
                </div>
            </div>
        </div>
    </div>
    
    @endforeach
    </div>
    @else
       <br>
        <div class="alert alert-warning">
            No available product for the moment Please check again later.
        </div>
    @endif


@endsection