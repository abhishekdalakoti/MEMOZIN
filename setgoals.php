<?php
include 'sqlconnect.php';
include 'init_core.php';
include 'head_info.php';
include 'sidebar.php';
include 'functions.php';

if(loggedin() && $_SESSION['uid']=="sadmin"){

?>
   <?php 
   if($_SESSION['ck']==1)
     echo	"<div class='alert alert-success' style='margin-left:3%;'> Your attendance is locked for today. </div>";
 else if($_SESSION['ck']==-1)
	 echo	"<div class='alert alert-danger' style='margin-left:3%;'> Please Connect to Internet. Your attendance is not market Yet. </div>";
   
        if(isset($_POST['pname']) && isset($_POST['startproject']) && isset($_POST['endproject']) &&isset($_POST['party']) && !empty($_POST['pname']) && !empty($_POST['startproject']) && !empty($_POST['endproject']) && !empty($_POST['party']) )
		{
        	     $num_id=get_pid($c);
        	     $pname=$_POST['pname'];
        	     $pid=strtoupper(substr($pname,0,2)).(string)$num_id;
        	     $startproject=$_POST['startproject'];
        	     $endproject=$_POST['endproject'];
                 $party=$_POST['party'];
				 
				 $a=getipid($party);
			for($j=0;$j<count($a);$j++)
			{
				$query1="insert into interested_party (pid,taskid,empid) values ('$pid','$pid','$a[$j]')";
				$query1_run=mysqli_query($c,$query1);
			}
			
        	    $query="insert into project (pid,pname,startdate,deadline,interested_party) values ('$pid','$pname','$startproject','$endproject','$party')";
                   echo "<input type='hidden' name='party' value='".$party."'>";
        	    if($query_run=mysqli_query($c,$query)){
        	    update_pid((int)$num_id,$c);
        	  
        	    include 'assignemp_table.php';
        	}
			
			
			
			
        	else{
        		echo '<div class="alert alert-danger">
                      <strong>Error! Submit Again</strong>
                    </div> <meta http-equiv="refresh" content="1;url=setgoals" />';
				}

        }
		else if(isset($_POST['epname']) && isset($_POST['ename'])  && !empty($_POST['epname']) && !empty($_POST['ename']))
			{ 
			echo "inside existing project";
			include 'assigntask.php';
				
			}
        else
		{
        	include 'setproject.php';
        }
		
   ?>
   




<?php

}
?>