<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($users) >= 1 ) 
                    @foreach ($users as $admin)
                        <tr>
                            <td>{{ $admin->id}} </td>
                            <td>{{ $admin->name}} </td>
                            <td>{{ $admin->email}} </td>
                            <td><button onclick="confirmRem()" class="btn btn-warning btn sweet-success-cancel">Remove</button></td>
                        </tr>
                    @endforeach
                @else
                <h1> no admin</h1>
                @endif
            </tbody>
        </table>
    </div>
</div>