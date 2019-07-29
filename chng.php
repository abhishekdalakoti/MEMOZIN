<?php
include_once 'init_core.php';
include 'sqlconnect.php';
include 'head_info.php';
include_once 'functions.php';
$p=md5($_POST['oldpass']);

$query="select password from user where userid='$_POST[uid]'";

$p=$_POST['uid']."default";
if($query_run=mysqli_query($c,$query)){
	$result=mysqli_fetch_assoc($query_run);
	echo $result['password'];
	if($_POST['newpass1']==$_POST['newpass2']&& $result['password']==$p)
	{
		$p=md5($_POST['newpass1']);
		$query1="update user set password='$p' where userid='$_POST[uid]'";
		if($query1_run=mysqli_query($c,$query1)){
			echo "Success";
			
			
			echo '<script>window.location="user_profile.php"; </script>';
		}
		else echo mysqli_error();
	}
	else{ echo "Incorrect Password";
	echo '<script>window.location="changepass.php"; </script>';
	}
}
?>
