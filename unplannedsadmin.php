<?php
include 'init_core.php';
if(loggedin()){

?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  
 <script type = "text/javascript">
    $(document).ready(function(){

      $('#myModal').modal('show');

    });


</script>
<?php

?>

  <style>
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #A1CAF1; // Choose your own color here
 }
 .table-striped>tbody>tr:nth-child(even)>td, 
.table-striped>tbody>tr:nth-child(even)>th {
   background-color: #FFFFFF; // Choose your own color here
 }

 #datepicker {
    z-index: 100000;
}
 #to {
    z-index: 100000;
}
 #from {
    z-index: 100000;
}
 </style>

</head>

<?php 
include 'head_info.php';
include 'sidebar.php';
include 'sqlconnect.php';

?>
<div id='myModal' class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-body" style="text-align:center;">
            <div class="row">
                <form action="unplannedleave" method="POST">
               <table class="table table-striped">
               
         
                     <tr>
                     <td>
                     </td>
                     <td>
                        <center>
                           <div class="input-group">
                              
                              <input type="text" class="form-control" id="" placeholder="EMP ID" style="width:50%" name="EMP_ID">
                             
                           </div>
                        </center>
                     </td>
                     
                        <td>
                        <center>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" id="to" placeholder="LEAVE DATE" style="width:50%" name="date">
                             
                           </div>
                        </center>
                     </td>

                  </tr>
                  <tr>
                     <!-- <td><a href="#" class="btn btn-primary"> <i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</a></td> -->
                     <td>
                        <center>
                        <div class="input-group">
                        
                        <input type="submit" class="btn btn-primary" value="Mark Attendance">  
                         
                         </div>
                        </center>
                     </td>
                  </tr>
               </table>
              </form>
            </div>
         </div>
      </div>
   </div>
</div>


</div>

<script type="text/javascript">
	
	   $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      defaultDate: "-20y",
      dateFormat:'dd/mm/yy'
    });
  } );

         $( function() {
    $( "#from" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat:'yy-mm-dd'
    });
  } );

             $( function() {
    $( "#to" ).datepicker({
      changeMonth: true,
      changeYear: true,
     
      dateFormat:'yy-mm-dd'
    });
  } );


</script>

<?php 
}
else  header('Location: index.php');

?>



