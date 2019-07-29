<?php
include 'sqlconnect.php';
if($_POST)
{
   

	$taskid=$_POST['tid'];
	$pid=$_POST['proid'];
	$remark=$_POST['remark'];
	$by=$_POST['by'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$ename=$_POST['name'];
	$check=$_POST['ch'];
	$empid=$_POST['eid'];
        $title=$_POST['titname'];
	$query="insert into remark_history values ('$pid','$taskid','$remark','$date','$time','$empid')";

	if($query_run=mysqli_query($c,$query))
	{
		if($check=="yes" && $ename!="")
		{
		$s=split(",",$ename);
		$z=count($s);
                
		
		for($i=0;$i<$z-1;$i++)
		{
			$s1=split("/",$s[$i]);
			
		$query2="select email from New_Employee where empid='$s1[1]'";
		if($query_run2=mysqli_query($c,$query2))
		{
			while($result=mysqli_fetch_assoc($query_run2))
			{
				$recemail=$result['email'];
                                echo $recemail;
				
				$to = $recemail;
				$subject = $title ;
				$from = 'noreply@memozin.com';
				$headers = "From: " . $from . "\r\n";
$headers .= 'Cc:  \r\n';
				$headers  .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message = '<html><body>';
			
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($s1[0]) . "</td></tr>";
			$message .= "<tr><td><strong>Project ID:</strong> </td><td>" . strip_tags($pid) . "</td></tr>";
			$message .= "<tr><td><strong>Message</strong> </td><td>" . strip_tags($remark) . "</td></tr>";
			//echo mail($to, $subject, $message, $headers);
			if (mail($to, $subject, $message, $headers)) {
              echo 'Your message has been sent.';
            } else {
              echo 'There was a problem sending the email.';
            }
		}
		}
		
	}
	}
	
}
}

?>