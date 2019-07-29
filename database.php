<!--<div class="container">-->
<!---->
<!--<div class="w3-responsive" style="margin-top: 10%;margin-left: 30%">-->
<!---->
<!--<table border="1" class="w3-table-all">-->
<!--    <tr><th>DATE</th>-->
<!--        <th>WALKING</th>-->
<!--        <th>WALKOUT</th>-->
<!---->
<!--    </tr>-->
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://use.fontawesome.com/8b09d5ebcd.js"></script>

    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>


<?php
/*$uid=$_POST["uid"];
$date1=$_POST["datestarting"];
$date2=$_POST["dateending"];*/
include 'sqlconnect.php';
include "init_core.php";
include 'head_info.php';
include "sqlconnect.php";
include  'sidebar.php';
/*$sqll="SELECT * FROM `leave` WHERE `status`=1";
echo $sqll;
$r11=mysqli_query($c,$sqll);

while ($row1=mysql_fetch_array($r11)) {
 $date1=$row1['leave_from'];
   $date2=$row1['leave_to'];
   $applicant=$row1['applicant'];
   for ($date = strtotime($date1); $date <= strtotime($date2); $date = strtotime("+1 day", $date)) {

    $p=date("Y-m-d",$date);
    $sql1="INSERT INTO `attendence` (`empid`, `att_time`, `date`, `remark`) VALUES ('$applicant', '00:00:00', '$p', 'leave');";
    echo $sql1;
    $ab=mysql_query($c,$sql1); 
}
}*/

?>

<div class="container " style="background-color:#A1CAF1;padding:10px 10px 10px 10px;margin-left:7%;">
        <div class="container">

            <table class="table" style="margin-top: 0%">
                <thead>
                <tr>
                    <th><i class="w3-large fa fa-calendar w3-text-blue">&nbsp;</i>DATE</th>
                    <th><i class="w3-large fa fa-clock-o w3-text-blue">&nbsp;</i>Walk-In Time</th>
                    <th><i class="w3-large fa fa-clock-o w3-text-blue">&nbsp;</i>Walk-Out Time</th>
                </tr>
                </thead>
                <tbody>

<?php
// 'sidebar.php';
$attendence=array();
$uid= $_SESSION['uid'];
$begin = $_POST['from'];
$end = $_POST['to'];
for ($date = strtotime($begin); $date <= strtotime($end); $date = strtotime("+1 day", $date)) {
    $p=date("Y-m-d",$date);
    $attendence[0]=$p; 
//echo $row['date'];
$attendence[1]='not marked';
$attendence[2]='not marked';
    $sql="SELECT * FROM `attendence` where empid = '$uid' AND date= '$p'";
    $r=mysqli_query($c,$sql);//r contains result send from table 
while($row= mysqli_fetch_array($r))
{
    
/*$attendence[0]=$row['date']; 
//echo $row['date'];
$attendence[1]='not marked';
$attendence[2]='not marked';*/
if($row['remark']=='walkin')
{
 $attendence[1]=$row['att_time'];   
}
if($row['remark']=='walkout')
{
 $attendence[2]=$row['att_time'];   
}
if($row['remark']=='leave')
{
    $attendence[1]='leave';
    $attendence[2]='leave';
}
if($row['remark']=='UNPLANNED LEAVE')
{
    $attendence[1]='UNPLANNED LEAVE';
    $attendence[2]='UNPLANNED LEAVE';
}
}



  echo '
                <tr class="info">
                    <td>'.$attendence[0].'</td>
                    <td>'.$attendence[1].'</td>
                    <td>'.$attendence[2].'</td>
                </tr>';


}
?>

  </tbody>
            </table>
        </div>
    </div>

