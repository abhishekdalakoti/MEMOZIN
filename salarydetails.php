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
              <form action="salarydetails" method="POST">
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
                        <center><img class="img-responsive" src='images/memozin.jpg' height=15% width=40%></center>
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
                     <td>
                     </td>
                     <td>
                        <center>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" id="from" placeholder="From" style="width:50%" name="from">
                             
                           </div>
                        </center>
                     </td>
                     
                        <td>
                        <center>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" id="to" placeholder="To" style="width:50%" name="to">
                             
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
<center> <button class="btn btn-primary" data-target="#myModal" data-toggle="modal" > Salary Detail </button></center> <br> <br>
 <table class="table table-striped" style="border-color:#FFFFFF;overflow:hidden;z-index: 1000;display:block;margin-left:8%;position:absolute;">

<?php 

function getdetails($empid,$name,$salary,$from,$to,$fool,$c){

$per_day_sal=$salary/30;

$query="select distinct date from attendence where date>='$from' and date<='$to' and empid='$empid'";

if($query_run=mysqli_query($c,$query)){
  while($result=mysqli_fetch_assoc($query_run)){
  	  $walkout="Not Set";
  	  $walkin="Not Set"; 
      $date=$result['date'];

      $query2="select min(att_time) from attendence where remark='walkin' and date='$date' and empid='$empid'";
      if($query_run2=mysqli_query($c,$query2)){
      while($result2=mysqli_fetch_array($query_run2)){
               	if($result2[0])
		               $walkin=$result2[0];
		        else 
		               $walkin="Not Set";
       }
      }
      
      $query3="select max(att_time) from attendence where remark='walkout' and date='$date' and empid='$empid'";
     if($query_run3=mysqli_query($c,$query3)){
           if(mysqli_num_rows($query_run3)>0){

		      while($result3=mysqli_fetch_array($query_run3)){
		      	if($result3[0])
		               $walkout=$result3[0];
		        else 
		               $walkout="Not Set";   

		      }
		    }  
    }
   
         
    if ($walkin!="Not Set" && $walkout!="Not Set"){
          $strwalkin=strtotime($walkin);
          $strwalkout=strtotime($walkout);  
          $hours=($strwalkout-$strwalkin)/3600;
          $hours= floor($hours).':'.(($hours-floor($hours))*60);
          $pos=strpos($hours,".");
          $hours=substr($hours,0,$pos);
         
          if($hours>=8){
          	$remark="Full-Time";
          }
          else if($hours>=4){
          	$remark="Half-Day";
          	  $per_day_sal=$per_day_sal/2;
          }
          else{
            $remark="Leave";
            $per_day_sal=0;
          }

     } 
     else {
     	$hours="Not Set";
     	$per_day_sal=0; 
     	$remark="Leave";
     	}   
    displaysalary($empid,$name,$date,$walkin,$walkout,$hours,$remark,$per_day_sal,$fool);
    $fool=1;
  }
}


}

function displaysalary($empid,$name,$date,$walkin,$walkout,$hours,$remark,$salary,$fool){
  if($fool==0){
  echo '
  
    <tr>

    <th> ID </th> 
    <th> Name </th> 
    <th> Date </th> 
    <th> Walk-In Time </th> 
    <th> Walk- Out Time </th> 
    <th> Hours Worked </th> 
    <th> Remark </th> 
    <th> Salary </th> 
    </tr>';
  }
  
echo '<tr>

  <td>'.$empid.'</td>
  <td>'.$name.'</td>
  <td>'.$date.'</td>
  <td>'.$walkin.'</td>
  <td>'.$walkout.'</td>
  <td>'.$hours.'</td>
  <td>'.$remark.'</td>
  <td>'.$salary.'</td>
  </tr>';

}


if(isset($_POST['empid'])&&!empty($_POST['empid'])) {



$empid=$_POST['empid'];
$from=$_POST['from'];
$to=$_POST['to'];
$query="select full_name,salary from New_Employee where empid='$empid'";
if($query_run=mysqli_query($c,$query)){
  $fool=0;
  while($result=mysqli_fetch_assoc($query_run)){
    $name=$result['full_name'];
    $salary=$result['salary'];
    getdetails($empid,$name,$salary,$from,$to,$fool,$c);
    $fool=1;
  }
  echo '</table>';
}
else echo mysqli_error($c);

}
else if((isset($_POST['name']) && isset($_POST['dob']) && !empty($_POST['name']) && !empty($_POST['dob']))) {

$name=$_POST['name'];
$dob=$_POST['dob'];
$from=$_POST['from'];
$to=$_POST['to'];

$query="select empid,salary from New_Employee where full_name='$name' and dob='$dob'";

if($query_run=mysqli_query($c,$query)){
  $fool=0;
  while($result=mysqli_fetch_assoc($query_run)){
    $empid=$result['empid'];
    $salary=$result['salary'];
    getdetails($empid,$name,$salary,$from,$to,$fool,$c);
    $fool=1;
  }
  echo '</table>';
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
else  header('Location: index.py');

?>



