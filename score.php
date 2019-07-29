
<?php
include 'sqlconnect.php';
$empidin=$_POST['empidin'];
$q="SELECT * FROM new_employee where empid=$empidin";

$res=mysqli_query($c,$q);
while($ret=mysqli_fetch_assoc($res))
{

$emp=$ret['empid'];

$score=0;
$q="SELECT complexity,priority FROM emptask where assignee=$emp";
$res=mysqli_query($c,$q);

	while($ret=mysqli_fetch_assoc($res))
	{
		if($ret['complexity']=="high")
			$score+=2;
		else if($ret['complexity']=="medium")
			$score+=1;
		else if($ret['complexity']=="low")
			$score+=0;
		
		if($ret['priority']=="urgent")//high medium low
			$score+=2;
		else if($ret['priority']=="medium")
			$score+=1;

	}
echo "for ".$emp." score=".$score;
echo "<br><br>";
}

/*$q="SELECT startdate FROM PROJECT where pid='KD11'";
$res=mysqli_query($c,$q);
$ret=mysqli_fetch_assoc($res);
$startdate=$ret['startdate'];

$q="SELECT deadline FROM PROJECT where pid='KD11'";
$res=mysqli_query($c,$q);
$ret=mysqli_fetch_assoc($res);
$deadline=$ret['deadline'];

$st=date_create($startdate);
$en=date_create($deadline);

echo $startdate."  ".$deadline."<br>";

$diff=date_diff($st,$en);
$days=$diff->format("%a days");
echo $days."<br>";
echo ($days*24)." Estimated Hours<br>";

$q="SELECT actual_hours FROM emptask where pid='KD11";
$res=mysqli_query($c,$q);
$ret=mysqli_fetch_assoc($res);
$actual_hours=$ret['actual_hours'];

echo "actual_hours ".$actual_hours;
}*/



?>


