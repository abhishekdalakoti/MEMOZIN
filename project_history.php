<?php


include 'sqlconnect.php';
include 'init_core.php';
include 'head_info.php';
include 'sidebar.php';
include 'project_modal.php';
include 'functions.php';

if(loggedin()){

$empid=$_SESSION['uid'];


if(isset($_POST['change_status'])){
	print_r($_POST);
	$pid=$_POST['pid'];
	$taskid=$_POST['tid'];
	$index=strpos($_POST['newassignee'],'/');
	$newassign=substr($_POST['newassignee'], $index+1);
	$oldstatus=$_POST['oldstatus'];
	$newstatus=$_POST['newstatus'];
	$remark=$_POST['remark'];


			
			    if($newstatus!='-select-'){
			    	 
						$query="update emptask set status='$newstatus',assignee='$newassign' where pid='$pid' and taskid='$taskid'";
						$ff=0;
						if($query_run=mysqli_query($c,$query)){
							
						}
						else {
							$ff=1;
						}
			             $date=date("Y-m-d");
			             $time=date("H:i:s");
			             echo $time;
                          echo $pid." ".$taskid;
						$query2="INSERT INTO `task_history`(`taskid`, `pid`, `fromstate`, `tostate`, `date`, `time`, `changedby`, `remark`) values ('$taskid','$pid','$oldstatus','$newstatus','$date','$time','$empid','$remark')    ";
						mysqli_query($c,$query2);
					}
		
         /*   if($ff==0){
            	echo '<div class="col-md-7 col-md-offset-2"><div class="alert alert-success">
		                      <strong>Success!</strong>
		                    </div></div> <meta http-equiv="refresh" content="1;url=myprojects.php" />';
            }*/
}
else{
?>
<head>
<style type="text/css">
	*{
		font-size: 13px;
	}
</style>
</head>
   <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >

 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Task list from Super-Admin</h3>
            <div class="panel-body">
                 <form class="well form-horizontal" action="myprojects.php" method="post"  id="contact_form" style="background-color:#FFFFFF;">
                    <fieldset style="background-color:#FFFFFF;">
                           <table class="table table-striped table-bordered table-list">
		                  <thead>
		                    <tr>		                       		                       		                        
		                        <th> Project ID </th>
		                        <th> Task ID </th>
		                        <th> Status </th>		                      
		                        <th> Assignee </th>
		                        <th> Assigned by </th>
		                        <th> </th>
		                    </tr> 
		                  </thead>
		                  <tbody>
		                  <?php
                             $query="select `taskid`, `pid`, `task_name`, `complexity`, `priority`, `type`, `assignee`, `assigned_by`, `alloted_hours`, `actual_hours`, `date`, `time`, `task_detail`, `status`, `reviewer` from emptask order by date desc";
                             $cc=0;
		                      if($query_run=mysqli_query($c,$query)){
		                        while($result=mysqli_fetch_assoc($query_run)){
		                           
		                            $pid=$result['pid'];
		                            $taskid=$result['taskid'];
		                            $taskname=$result['task_name'];
		                            $comp=$result['complexity'];
		                            $priority=$result['priority'];
		                            $type=$result['type'];
		                            $status=$result['status'];
                                            $assignee=$result['assignee'];
		                            $assigned_by=$result['assigned_by'];
		                            $alloted_hours=$result['alloted_hours'];
		                            $actual_hours=$result['actual_hours'];
		                            $date=$result['date'];
		                            $time=$result['time'];
		                            $tdetail=$result['task_detail'];
		                            $reviewer=$result['reviewer'];
		                            echo "<input type='hidden' name='$cc' value='$pid-$taskid'>";
		                             $cc++;
		                            echo "<tr> 
		                                        <td><p class='text-info'>$pid</p></td>
		                                        <td>

		                                            <button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#myModal$pid$taskid'>
                                                    <i class='fa fa-tasks' aria-hidden='true'></i>

		                                            $taskid

		                                            </button>
		                                        </td>
		                                        <td><p class='text-warning'> $status </p>
                                                    <input type='hidden' name='olds$pid$taskid' value='$status'>
		                                        </td> 
		                                      
		                                        <td> 

		                                          <p class='text-success'>".ucfirst($assignee)."</p>

		                                       </td>
		                                       <td> 
		                                           <p class='text-success'>".ucfirst($assigned_by)."</p> 

		                                       </td>
		                                       <td>
		                                       <button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editmodal$pid$taskid'>
                                                 <i class='fa fa-pencil' aria-hidden='true'></i>
                                                    </button>
		                                       </td>
		                            </tr> ";
		                            emodal($pid,$taskid,$assigned_by,$date,$time,$alloted_hours,$status,$status,$c);
		                             modal($pid,$taskid,$assigned_by,$date,$time,$alloted_hours,$tdetail,$comp,$priority,$type,$taskname,$actual_hours,$status,$c); 

		                        }
		                    }else echo mysqli_error($c);
				             ?>

		                  </tbody>
                                 
					            
					  </table> 
					   <center>  <input type="submit" class="btn btn-primary" value="Change Status" name="submit_project"> </center>          
                    </fieldset>
                     <input type="hidden" name="tnum" value='<?php echo $cc;?>'>
                     <input type="hidden" id="emp" value='<?php echo $_SESSION['uid'];?>'>
                 </form> 
               
            </div>
</div>
</div>

<?php
}
}

?>