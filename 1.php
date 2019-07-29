<?php
$request  = str_replace("/memozin/", "", $_SERVER['REQUEST_URI']);
$regex = "/[a-zA-Z0-9]+\?+[a-zA-z0-9]+\=+[a-zA-z0-9]\&+[a-zA-z0-9]+\=+[a-zA-z0-9]/";
if (preg_match('/\?/', $request) )
{
	$p=preg_split('/\?/',$request);
	$z=$p[0].".php?".$p[1];
	echo '<script>window.location="'.$z.'"; </script>';
	

}
else
include($request.".php");
?>