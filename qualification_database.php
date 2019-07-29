<?php

include 'sqlconnect.php';


$uid=$_POST["uid"];
$sch_10=$_POST["sc10"];
//echo $sch_10;
$sch_12=$_POST["sc12"];
$sch_grad=$_POST["scgrad"];
$sch_postgrad=$_POST["scpost"];
$yr_10=$_POST["yr10"];
$yr_12=$_POST["yr12"];
$yr_grad=$_POST["yrgrad"];
$yr_postgrad=$_POST["yrpost"];
$per_10=$_POST["per10"];
$per_12=$_POST["per12"];
$per_grad=$_POST["pergrad"];
$per_postgrad=$_POST["perpost"];
$sql="insert into qualification(uid,10thschool,10thyear,10thpercentage,12thschool,12thyear,12thpercentage,gradschool,gradyear,gradpercentage,postschool,postyear,postpercentage)values('$uid','$sch_10',$yr_10,$per_10,'$sch_12',$yr_12,$per_12,'$sch_grad',$yr_grad,$per_grad,'$sch_postgrad',$yr_postgrad,$per_postgrad)";
$i=mysqli_query($c,$sql);
if($i>0)
{
  header("location:adminpanel.php");
   // echo "inserted";
}
else {
    echo "not inserted";
}
mysqli_close($c);

?>