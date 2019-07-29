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
<?php
if(!isset($_POST['empid'])){

?>
  
 <script type = "text/javascript">
    $(document).ready(function(){

      $('#myModal').modal('show');

    });


</script>

<?php
}
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
 </style>

</head>

<?php 
include 'head_info.php';
include 'sidebar.php';
include 'sqlconnect.php';
include 'functions.php';

?>
<div id='myModal' class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body" style="text-align:center;">
            <div class="row">
              <form action="empdetail" method="POST">
               <table class="table table-striped">
                  <tr>
                     <td colspan=3>
                        <center>
                           <h3 class='name'>Memozin </h3>
                        </center>
                     </td>
                  </tr>
                  <tr>
                     <td colspan=3>
                        <center><img class="img-responsive" src='images/memozin.jpg' height=30% width=50%></center>
                     </td>
                  </tr>
                  <tr>
                     <td colspan=3>
                        <center>
                           <div class="input-group margin-bottom-sm">
                              <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                              <input class="form-control" type="text" placeholder="Employee ID" name="empid">
                           </div>
                        </center>
                     </td>
                  </tr>
                  <tr>
                     <td colspan=3>
                        <center>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input class="form-control" type="text" placeholder="Name" name="name">
                              <input class="form-control" type="text" placeholder="Date of Birth" id="datepicker" name="dob">
                           </div>
                        </center>
                     </td>
                  </tr>
                  <tr>
                     <!-- <td><a href="#" class="btn btn-primary"> <i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</a></td> -->
                     <td>
                        <center>
                        <div class="input-group">

                        <input type="submit" class="btn btn-primary" value="Get Details">  
                         
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

<div class="container" style="background-color: #A1CAF1;padding:20px;margin-left:5%;">



 <div class="col-md-4 col-md-offset-2"> 
        <button class="btn btn-primary" data-target="#myModal" data-toggle="modal" >Employee Detail </button>
        
 </div>

<?php 

if(isset($_POST['empid'])&&!empty($_POST['empid'])) {



$empid=$_POST['empid'];
$query="select * from New_Employee where empid='$empid'";
if($query_run=mysqli_query($c,$query)){
  $fool=0;
  while($result=mysqli_fetch_assoc($query_run)){
      $name=$result['full_name'];
      $empid=$result['empid'];
      $email=$result['email'];
      $phone=$result['phone'];
      $dob=$result['dob'];
      $sex=$result['sex'];
      $marital=$result['marital'];
      $department=$result['department'];
      $sub_department=$result['sub_department'];
      $joining=$result['joining'];
      $salary=$result['salary'];
      $cur_address=$result['cur_address'];
      $cur_city=$result['cur_city'];
      $cur_state=$result['cur_state'];
      $address=$cur_address.", ".$cur_city.", ".$cur_state;
    display_employee($empid,$name,$department,$sub_department,$email,$joining,$dob,$sex,$salary,$phone,$address);
    
  }
  
}
else echo mysqli_error($c);

}
else if((isset($_POST['name']) && isset($_POST['dob']) && !empty($_POST['name']) && !empty($_POST['dob']))) {

$name=$_POST['name'];
$dob=$_POST['dob'];



$query="select * from New_Employee where full_name='$name' and dob='$dob'";

if($query_run=mysqli_query($c,$query)){
  $fool=0;
  while($result=mysqli_fetch_assoc($query_run)){
      $name=$result['full_name'];
      $empid=$result['empid'];
      $email=$result['email'];
      $phone=$result['phone'];
      $dob=$result['dob'];
      $sex=$result['sex'];
      $marital=$result['marital'];
      $department=$result['department'];
      $sub_department=$result['sub_department'];
      $joining=$result['joining'];
      $salary=$result['salary'];
      $cur_address=$result['cur_address'];
      $cur_city=$result['cur_city'];
      $cur_state=$result['cur_state'];
      $address=$cur_address.", ".$cur_city.", ".$cur_state;
    display_employee($empid,$name,$department,$sub_department,$email,$joining,$dob,$sex,$salary,$phone,$address);
  }
  
}
else echo mysqli_error($c);
}





?>

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
</script>

<?php 
}
else  header('Location: index.py');

?>



