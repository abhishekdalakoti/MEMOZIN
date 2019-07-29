<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  

<style>
.classname {
	-moz-box-shadow:inset 0px 1px 0px -3px #bee2f9;
	-webkit-box-shadow:inset 0px 1px 0px -3px #bee2f9;
	box-shadow:inset 0px 1px 0px -3px #bee2f9;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #FFFFFF), color-stop(1, #FFFFFF) );
	background:-moz-linear-gradient( center top, #FFFFFF 5%, #FFFFFF 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#63b8ee', endColorstr='#468ccf');
	background-color:#63b8ee;
	-webkit-border-top-left-radius:75px;
	-moz-border-radius-topleft:75px;
	border-top-left-radius:75px;
	-webkit-border-top-right-radius:75px;
	-moz-border-radius-topright:75px;
	border-top-right-radius:75px;
	-webkit-border-bottom-right-radius:75px;
	-moz-border-radius-bottomright:75px;
	border-bottom-right-radius:75px;
	-webkit-border-bottom-left-radius:75px;
	-moz-border-radius-bottomleft:75px;
	border-bottom-left-radius:75px;
	text-indent:0;
	border:4px solid #3866a3;
	display:inline-block;
	color:#3866a3;
	font-family:Arial;
	font-size:18px;
	font-weight:bold;
	font-style:normal;
	height:150px;
	line-height:65px;
	width:150px;
	text-decoration:none;
	text-align:center;
}
.classname:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #F3F3F3), color-stop(1, #63b8ee) );
	background:-moz-linear-gradient( center top, #468ccf 5%, #F3F3F3 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#468ccf', endColorstr='#63b8ee');
	background-color:#F3F3F3;
}.classname:active {
	position:relative;
	top:1px;
}
.classname:focus { outline-style: none; }
</style>

</head>
<?php
include 'banner.php';
include 'modal_login.php';
include 'modal_user.php';
include 'sqlconnect.php';

function check($remark,$c,$uid)
{
	$curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://api.timezonedb.com/v2/get-time-zone?key=GN6RDE1GDO00&format=json&by=zone&zone=Asia/Kolkata',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_SSL_VERIFYPEER => 0
        ));
    
$json=curl_exec($curl);
curl_close($curl);
$json=json_decode($json,true);
$ts=$json['formatted'];
$parts = preg_split('/\s+/', $ts);
date_default_timezone_set("Asia/Kolkata");
$tzzz=date("Y-m-d H:i:s");
$pzzz=split(' ', $tzzz);
$_SESSION["walkin"]=$pzzz;

$query2="select empid from attendence where empid='$uid' and date='$parts[0]' and remark='walkin'";
$query_run2=mysqli_query($c,$query2);
if(mysqli_num_rows($query_run2)==0)
{
	if(count($parts)==1)
{
	return -1;
}
 $query="insert into attendence(empid,att_time,date,remark) values ('$uid','$parts[1]','$parts[0]','walkin')";
 if($query_run=mysqli_query($c,$query)){
	 return 1;
 }
             
			 }
			 else return 0;
}

	
	

	
	
function getpid($uid,$c)
{
	$ar1=array();
	$ar2=array();
	$query="select pid,taskid from emptask where assignee='$uid'";
if($query_run=mysqli_query($c,$query))
		{
			while($result=mysqli_fetch_assoc($query_run))
			{
				$p=$result['pid'];
				$t=$result['taskid'];
				array_push($ar1,$p);
				array_push($ar2,$t);
			}
		
		}
		else
			echo mysqli_error($c);
		$query="select pid,taskid from interested_party where empid='$uid'";
		if($query_run=mysqli_query($c,$query))
		{
			while($result=mysqli_fetch_assoc($query_run))
			{
				$p=$result['pid'];
				$t=$result['taskid'];
				array_push($ar1,$p);
				array_push($ar2,$t);
			}
		
		}
		else
			echo mysqli_error($c);
		$_SESSION['pid']=$ar1;
		$_SESSION['tid']=$ar2;
	
}
if (isset($_POST['uid']) && isset($_POST['pass']) && !empty($_POST['uid']) && !empty($_POST['pass'])) {
 
 $uid=htmlentities($_POST['uid']);
 $pass=md5(htmlentities($_POST['pass']));
 $op=htmlentities($_POST['pass']);
 $query="select password from user where userid='$uid'";
 $dpass="";
 if($query_run=mysqli_query($c,$query)) {
 	while($result=mysqli_fetch_assoc($query_run)){
 		$dpass=$result['password'];
 	}
 }
$ip= $_SERVER['REMOTE_ADDR'];
if(1){
 if($pass==$dpass && $uid=="admin"  ){
 	
 	ob_start();
    session_start();
 	$_SESSION['uid']=$uid;
	getpid($uid,$c);
	$_SESSION['ck']=check("walkin",$c,$uid);
	
 	echo '<script>window.location="adminpanel"; </script>';
 }
  else if($pass==$dpass &&  $uid=="sadmin") {
 	
 	ob_start();
    session_start();
 	$_SESSION['uid']=$uid;
	getpid($uid,$c);
	$_SESSION['ck']=check("walkin",$c,$uid);
 	echo '<script>window.location="setgoals"; </script>';
 }
 else if($pass==$dpass){
    ob_start();
    
    session_start();
 	$_SESSION['uid']=$uid;
	getpid($uid,$c);
	$_SESSION['ck']=check("walkin",$c,$uid);
 	echo '<script>window.location="user_profile"; </script>';
 }
else if(($dpass==$uid."default")and ($op==$uid."default")){
	
	$query2="select full_name from new_employee where empid='$uid'";
	if($query_run2=mysqli_query($c,$query2)){
		if(mysqli_num_rows($query_run2)==1){
            ob_start();
		    session_start();
		 	$_SESSION['uid']=$uid;
		 	echo '<script>window.location="changepass"; </script>'; 
		}
	}
}
}
else echo '<script> alert("You are not eligible to enter this network"); </script>';
}
?>



<div class="container-fluid" style="background-image:url('images/workplaces.jpg'); height:92.2%">
<div class="row" style="margin-top:10%;">
             <div class="col-md-1 col-md-offset-4 col-sm-2 col-sm-offset-2 col-xs-2 col-xs-offset-0">
                   <button href="#" class="classname" data-toggle="modal" data-target="#myModal"> Admin </button>
             </div>
             <div class="col-md-1 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-4">
                   <button class="classname" data-toggle="modal" data-target="#userModal"> Employees </button>
             </div>
</div>
 <?php $offset=1; modal($offset); modaluser(); ?>
</div>