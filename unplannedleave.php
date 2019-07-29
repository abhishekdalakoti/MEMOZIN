<?php
include 'sqlconnect.php';

$emp_id=$_POST['EMP_ID'];
$date=$_POST['date'];
$sql="INSERT INTO `attendence` (`empid`, `att_time`, `date`, `remark`) VALUES ('$emp_id', '00:00:00', '$date', 'UNPLANNED LEAVE');";
$result=mysqli_query($c,$sql);
if($result)
{
header('Location: user_profile.php');
}
else
{
	echo $sql;
}
?>

