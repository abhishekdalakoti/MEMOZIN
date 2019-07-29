<?php
include "init_core.php";
include 'head_info.php';
include "sqlconnect.php";
$UID=$_SESSION['uid'];
//echo $UID;
$datefrom=$_POST['from'];
//echo "<br>".$datefrom;
$dateto=$_POST['to'];
$type=$_POST['last'];
$reason=$_POST['reason'];
echo $reason;
$sendto=$_POST['phone'];
$sendto=split('/',$sendto);
$sendto=$sendto[1];
echo $sendto;
$sta=0;
//$sql="insert into 'leave'(applicant,leave_from,leave_to,type,reason,send_to,status)values('$UID','$datefrom','$dateto','$type','$reason','$sendto',$sta)";
$sql="INSERT INTO `leave` (`applicant`, `leave_from`, `leave_to`, `type`, `reason`, `send_to`, `status`) VALUES ('$UID', '$datefrom', '$dateto', '$type', '$reason', '$sendto', '0')";
$i=mysqli_query($c,$sql);
if($i>0)
{
	if($UID=='admin')
  header("location:adminpanel");
else if($UID=='sadmin')
	header("location:setgoals");
else 
header("location:user_profile");
   // echo "inserted";
}
mysqli_close($c);
