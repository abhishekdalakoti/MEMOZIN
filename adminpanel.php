<?php
include "init_core.php";
include 'head_info.php';
include "sqlconnect.php";
 
/*   if($_SESSION['atn']==1)
   {
	   echo "<div class='alert alert-success'> Your attendece is locked</div>";
   }
   else if($_SESSION['atn']==-1)
   {
	   echo "<div class='alert alert-success'> Please Connect to Internet. Your attendance isn't locked yet.</div>";
   }*/
   


if(!loggedin()){
  header('Location:index');
}
else{


$query="select distinct department from department";

if($query_run=mysqli_query($c,$query)){
	while($result=mysqli_fetch_assoc($query_run)){
		$department[]=$result['department'];

	}
}

$query="select subdepartment, department from department group by subdepartment";

if($query_run=mysqli_query($c,$query)){
  while($result=mysqli_fetch_assoc($query_run)){
    $array[$result['subdepartment']]=$result['department'];

  }
}




?>

<script type="text/javascript">
var obj=
<?php
echo "{";
$fool=1;
foreach ($array as $key => $value) {
  if($fool!=1) 
          echo ",";
  echo "'".$key."': '".$value."'";
  $fool=0;
}
echo "}";
  ?>
</script>

<body>
<?php include 'sidebar.php'; 

?>
      <div class="tab" style="margin-left:3%;">
      <button class="tablinks" onclick="openCity(event, 'Newemployee')" id="defaultOpen">New Employee</button>
      <button class="tablinks" onclick="openCity(event, 'Qualifications')">Qualifications</button>
      <button class="tablinks" onclick="openCity(event, 'Experience')">Experience</button>
   </div>
   <?php
   echo $_SESSION['ck'];
   if($_SESSION['ck']==1)
     echo	"<div class='alert alert-success' style='margin-left:3%;'> Your attendance is locked for today. </div>";
 else if($_SESSION['ck']==-1)
	 echo	"<div class='alert alert-danger' style='margin-left:3%;'> Please Connect to Internet. Your attendance is not market Yet. </div>";
   ?>
   <div id="Newemployee" class="tabcontent">
     <?php include 'newemployee.php'; ?>
   </div>
   <!-- /.container -->
   
   <div id="Qualifications" class="tabcontent">
   <?php include 'qualifications.php'; ?>
   </div>
   <div id="Experience" class="tabcontent">
        <?php include 'experience.php'; ?>
   </div>
   <div>
   
   </div>
  <?php include 'all_scripts.php'; ?>
   
</body>
</html> 
<?php

}
?>