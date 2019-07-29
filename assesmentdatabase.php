<?php
include "init_core.php";
include 'head_info.php';
include "sqlconnect.php"; 

$sql="SELECT * FROM `emptask` WHERE `assignee`='EMP5' ";
$priorityurgentcount=0;
$priorityhighcount=0;
$prioritymediumcount=0;
$prioritylowcount=0;
$priorityurgenthours=0;
$priorityhighhours=0;
$prioritymediumhours=0;
$prioritylowhours=0;
$priorityurgenthoursactual=0;
$priorityhighhoursactual=0;
$prioritymediumhoursactual=0;
$prioritylowhoursactual=0;

$complexityhighcount=0;
$complexitymediumcount=0;
$complexitylowcount=0;
$complexityhighhours=0;
$complexitymediumhours=0;
$complexitylowhours=0;
$complexityhighhoursactual=0;
$complexitymediumhoursactual=0;
$complexitylowhoursactual=0;



$r=mysqli_query($c,$sql);
while($row= mysqli_fetch_array($r))
{
if($row['priority']=='urgent')
{
$priorityurgentcount++;
$priorityurgenthours+=$row['alloted_hours'];
$priorityurgenthoursactual+=$row['actual_hours'];
}
if($row['priority']=='high')
{
$priorityhighcount++;
$priorityhighhours+=$row['alloted_hours'];
$priorityhighhoursactual+=$row['actual_hours'];
}
if($row['priority']=='medium')
{
$prioritymediumcount++;
$prioritymediumhours+=$row['alloted_hours'];
$prioritymediumhoursactual+=$row['actual_hours'];
}
if($row['priority']=='low')
{
$prioritylowcount++;
$prioritylowhours+=$row['alloted_hours'];
$prioritylowhoursactual+=$row['actual_hours'];
}

if($row['complexity']=='high')
{
$complexityhighcount++;
$complexityhighhours+=$row['alloted_hours'];
$complexityhighhoursactual+=$row['actual_hours'];
}
if($row['complexity']=='medium')
{
$complexityymediumcount++;
$complexitymediumhours+=$row['alloted_hours'];
$complexitymediumhoursactual+=$row['actual_hours'];
}
if($row['complexity']=='low')
{
$complexitylowcount++;
$complexitylowhours+=$row['alloted_hours'];
$complexitylowhoursactual+=$row['actual_hours'];
}



}
echo $priorityurgentcount;

?>
