<?php
include "sqlconnect.php";
$sql="insert into Experience(emp_code,company,start_date,end_date,past_salary,designation,company_address,company_description) values('$_POST[emp_code]','$_POST[company]','$_POST[start_date]','$_POST[end_date]','$_POST[past_salary]','$_POST[designation]','$_POST[company_address]','$_POST[company_description]')";
$result=mysqli_query($c,$sql);
if ($result)
echo "row added in db";
else 
	echo "error".mysqli_error();
mysqli_close($c);
?>