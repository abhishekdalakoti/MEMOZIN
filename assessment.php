<?php
include "sqlconnect.php";
ob_start();
session_start();
//$uid=$_SESSION['uid'];
$query1="select max(date) from attendence where empid='EMP19'";
$query1_run=mysqli_query($c,$query1);
$result1=mysqli_fetch_assoc($query1_run);
$maxdate=$result1['max(date)'];
$query2="select min(date) from attendence where empid='EMP19'";
$query2_run=mysqli_query($c,$query2);
$result2=mysqli_fetch_assoc($query2_run);
$mindate=$result2['min(date)'];
$countabsent=0;
$countpresent=0;
for ($date = strtotime($mindate); $date <= strtotime($maxdate); $date = strtotime("+1 day", $date))
{
	$flag0=0;
	$flag1=0;
	$p=date("Y-m-d",$date);
	$sql="SELECT * FROM `attendence` where empid = 'EMP19' AND date= '$p'";
	$r=mysqli_query($c,$sql);//r contains result send from table 
while($row= mysqli_fetch_assoc($r))
{
if($row['remark']=='walkin')
{
 $flag0=1;   
}
else if($row['remark']=='walkout')
{
 $flag1=1;   
}
else if($row['remark']=='leave')
{
    $countabsent=$countabsent+1;
}
}
if($flag1==1 and $flag0==1)
	$countpresent=$countpresent+1;
}
echo $countpresent."<br>	".$countabsent;
$counttotal=$countpresent+$countabsent;

?>