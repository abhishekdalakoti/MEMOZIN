<?php
include 'sqlconnect.php';
ob_start();
session_start();
if($_POST)
{
	$piiid=$_POST['piid'];
	$tiiid=$_POST['tiid'];
	$query="select pid,taskid,remark,date,time,remark_by from remark_history where pid='".$piiid."' andtaskid='".$tiiid."' remark_by!='".$_SESSION['uid']."'and date='".$_SESSION['walkin'][0]."' and time>'".$_SESSION['walkin'][1]."' ORDER BY date DESC, time DESC LIMIT 10" ;
}