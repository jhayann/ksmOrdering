<div class="card-body">
    <div class="table-responsive">
            <table class="table">
               <thead>
                <tr>
                    <th>Reseller Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact no.</th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) >= 1)
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }} </td>
                            <td>{{ $customer->username }} </td>
                            <td>{{ $customer->email }} </td>
                            <td>{{ $customer->address }} </td>
                            <td>{{ $customer->number }} </td>
                        </tr>                    
                    @endforeach
                @else
                    <h1> Currently no Resellers</h1>
                @endif
                </tbody>
            </table>
    </div>    
</div>