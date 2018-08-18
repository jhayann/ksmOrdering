@extends('layouts.dashboardLayout')

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
    <div class="col-auto">
            <div class="card">
                    <div class="card-body" id="ajax">
                            <h4 class="card-title">Current Ressellers</h4>
                            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                            <div class="table-responsive">
                                <table id="resellertbl" class="display nowrap table table-hover table-stripe">
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
                                      <!--  @if(count($customers) >= 1)
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
                                    @endif -->
                                    </tbody>
                                </table>
                            </div>
                    </div>
            </div>        
    </div>
<script src="{{URL::to('js/lib/datatables/datatables.min.js')}}"></script>
 <script src="{{URL::to('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::to('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
<script src="{{URL::to('js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
<script src="{{URL::to('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
<script src="{{URL::to('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
<script src="{{URL::to('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::to('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
<script>
$(document).ready(function(){
    $('#resellertbl').DataTable({
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "proccessing":true,
        "serverSide":true,
        "ajax":{
            "url":"{{route('resellerDataProccessing')}}",
            "dataType":"json",
            "type":"POST",
            "data":{'_token': "{{Session::token()}}"}
        },
        "columns":[
            {"data":"name"},
            {"data":"username"},
            {"data":"email"},
            {"data":"address"},
            {"data":"number"}
        ]
    } );
});
</script>
@endsection
