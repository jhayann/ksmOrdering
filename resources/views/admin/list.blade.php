<div class="card-body">
          <div class="card-header">Administrators:</div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($users) >= 1 ) 
                    @foreach ($users as $admin)
        
                           <tr>
                            <td>{{ $admin->id}} </td>
                            <td>{{ $admin->firstname}} </td>
                            <td>{{ $admin->middlename}} </td>
                            <td>{{ $admin->lastname}} </td>
                            <td>{{ $admin->email}} </td>
                            <td>
                            @if($admin->id != '1') 
                            <button onclick="confirmRem('{{$admin->id}}')" class="btn btn-warning btn sweet-success-cancel">Remove</button>
                            @endif
                            <button onclick="" class="btn btn-success ">Edit</button></td>
                         </tr>
        
                    @endforeach
                @else
                <h1> no admin</h1>
                @endif
            </tbody>
        </table>
    </div>
</div>