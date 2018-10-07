<div class="card-body">
          <div class="card-header">Administrators:</div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Product name</th>
                     <th>Volume</th>
                    <th>Categorie</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if(count($products) >= 1 ) 
                    @foreach ($products as $product)
        
                           <tr>
                               <td><img src="{{URL::to('img/portfolio/thumbnails')}}/{{$product->image}}" height="40" width="100" class="profile-pic" ></td>
                            <td>{{ $product->name}} </td>
                             <td>{{ $product->volume}} </td>
                            <td>{{ $product->categorie}} </td>
                            <td>{{ $product->amount}} </td>
                            <td><button id="stat" onclick="changeStatus('{{$product->id}}')" class="btn btn-{{ $product->active == 1 ? 'success':'warning'}}  btn sweet-success-cancel">{{$product->active == 1 ? 'active':'inactive'}}</button>
                         
                         </tr>
        
                    @endforeach
                @else
                <h1> No products available.</h1>
                @endif
            </tbody>
        </table>
    </div>
</div>
