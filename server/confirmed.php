<?php
include_once("libs/dbfunctions.php");
$dbobject = new dbobject();
$role = $_SESSION['role_id_sess'];
?>
   <div class="card">
    <div class="card-header">
        <h5 class="card-title">Transaction List</h5>
        <h6 class="card-subtitle text-muted">The report contains Lists that have been setup in the system.</h6>
    </div>
    <div class="card-body">
      <?php if($_SESSION['role_id_sess'] > 001){
        //   echo "<a class='btn btn-warning' onclick=\"getModal('setup/offence_setup.php','modal_div')\" data-toggle=\"modal\" data-target=\"#defaultModalPrimary\" href=\"javascript:void(0)\">Confirm Offence Payment</a>";
                // <a class="btn btn-warning" onclick="getModal('setup/sidenumber_setup.php','modal_div')" href="javascript:void(0)" data-toggle="modal" data-target="#defaultModalPrimary">Add Vehicle Details</a>
      }else{
        echo "Super Admin!!";
      }
      ?>
      <!-- <a class="btn btn-warning" onclick="getModal('setup/sidenumber_setup.php','modal_div')" href="javascript:void(0)" data-toggle="modal" data-target="#defaultModalPrimary">Add Vehicle Details</a> -->
        <div id="datatables-basic_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-3">
                    <label for=""></label>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table id="page_list" class="table table-striped nowrap" >
                        <thead>
                            <tr role="row" style="background-color: grey; color: white;">
                                <th>S/N</th>
                                <th>Payment Code</th>
                                <th>Reference</th>
                                <th>Description</th>
                                <th>Description Code</th>
                                <th>Amount</th>
                                <th>Transaction Status</th>
                                <th>Processed Date</th>
                                <th>Used Date</th>
                                <th>Client Name</th>
                                <th>Officer Name</th>
                                <th>Station</th>
                                <th>Approved Transaction</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  
  var table;
  var editor;
  var op = "Offences.confirmed_transaction";
  $(document).ready(function() {
    table = $("#page_list").DataTable({
      processing: true,
      columnDefs: [{
        orderable: false,
        targets: 0
      }],
      serverSide: true,
      paging: true,
      oLanguage: {
        sEmptyTable: "No record was found, please try another query"
      },

      ajax: {
        url: "utilities.php",
        type: "POST",
        data: function(d, l) {
          d.op = op;
          d.li = Math.random();
//          d.start_date = $("#start_date").val();
//          d.end_date = $("#end_date").val();
        }
      }
    });

   
    
  });

 
    function getModal(url,div)
    {
//        alert('dfd');
        $('#'+div).html("<h2>Loading....</h2>");
//        $('#'+div).block({ message: null });
        $.post(url,{},function(re){
            $('#'+div).html(re);
        })
    }

    
</script>