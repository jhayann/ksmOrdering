<div class="card-body">
<h4 class="card-title">Resellers List</h4>
 <h6 class="card-subtitle">Export list to Copy, Excel, PDF & Print</h6>
    <div class="table-responsive">
            <table class="table" id="customer">
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
           
                </tbody>
            </table>
    </div>    
</div>


<script>
    $(document).ready(function(){

        $('#customer').DataTable({
            "processing": true,
				"serverSide": true,
				"ajax": {
					"url":"<?= route('dataProccessor') ?>",
					"dataType":"json",
					"type":"POST",
					"data":{"_token":"<?= csrf_token() ?>"}
				},
				"columns":[
					{"data":"name"},
					{"data":"username"},
					{"data":"email","orderable":false},
                    {"data":"address","orderable":false},
					{"data":"number","searchable":false,"orderable":false}
				],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });
      
    });
</script>