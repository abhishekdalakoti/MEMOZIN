<?php
include "sqlconnect.php";


$sql="insert into new_employee(full_name,empid,email,phone,ephone,father_name,dob,sex ,marital,spouse_name,blood_group,department,sub_department,joining,pan ,aadhar,voter,salary ,cur_address,cur_city ,cur_state,cur_pin,per_address,per_city ,per_state,per_pin,nationality,refer) values('$_POST[full_name]','$_POST[empid]','$_POST[email]','$_POST[phone]','$_POST[ephone]','$_POST[father_name]','$_POST[dob]','$_POST[sex]','$_POST[marital]','$_POST[spouse_name]','$_POST[blood_group]','$_POST[department]','$_POST[sub_department]','$_POST[joining]','$_POST[pan]','$_POST[aadhar]','$_POST[voter]','$_POST[salary]','$_POST[cur_address]','$_POST[cur_city]','$_POST[cur_state]','$_POST[cur_pin]','$_POST[per_address]','$_POST[per_city]','$_POST[per_state]','$_POST[per_pin]','$_POST[Nationality]','$_POST[refer]')";

if ($result=mysqli_query($c,$sql)) {
	$id=str_replace("EMP","",$_POST['empid']);
	$id=(int)$id;
	echo "<script> alert('$id');</script>";
echo "row added in db";
 $query2="update curr_id set id='$id+1' where id<='$id'";
 if(!mysqli_query($c,$query2)) echo mysqli_error($c);
}
else 
	echo "error".mysqli_error($c);

$p=$_POST['empid']."default";
$query="insert into user(userid,password) values('$_POST[empid]','$p')";
if (mysqli_query($c,$query)) {
}
else echo mysqli_error($c);

			$recemail=$_POST['email'];
				$to = $recemail;
				$subject = "Memozin Login Password" ;
				$from = 'noreply@memozin.com';
				$headers = "From: " . $from . "\r\n";
$headers .= 'Cc:  \r\n';
				$headers  .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message = '<html><body>';
			
			$message .= "<h3><aligncenter><center>Welcome to Memozin</aligncenter></h3>";
			$message .="Your UserID is<h4> ".strip_tags($_POST['empid'])."</h4> and password is <h4>".strip_tags($_POST['empid'])."default</h5>.";
	
			//echo mail($to, $subject, $message, $headers);
			if (mail($to, $subject, $message, $headers)) {
              echo 'Your message has been sent.';
            } else {
              echo 'There was a problem sending the email.';
            }

		
?>