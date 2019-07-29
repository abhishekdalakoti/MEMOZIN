 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<?php
include 'sqlconnect.php';
include 'init_core.php';
include 'head_info.php';
include 'sidebar.php';
include 'project_modal.php';
include 'functions.php';
if(loggedin()){
$empid=$_SESSION['uid'];
if(isset($_GET['pid'])&& isset($_GET['tid'])) {
	$pid=$_GET['pid'];
	$taskid=$_GET['tid'];
	
	
?>

 <script type = "text/javascript">
   $("#test").hide();
   
    $('document').ready(function() {
  		
   $('#myModal<?php echo $pid.$taskid; ?>').modal('show');
});
</script>
<?php
}
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
						$date=date("Y-m-d");
			             $time=date("H:i:s");
						 $query1="insert into logtable(`taskid`, `pid`, `date`, `time`, `assignee`, `asigned_by`,`status`,`transfer_remark`) values ('$taskid','$pid','$date','$time','$newassign','$empid','$newstatus','$remark')";
                          $queryrun3=mysqli_query($c,$query1);
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
                           <table class="table table-striped table-bordered table-list" id="test">
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
                             $query="select `taskid`, `pid`, `task_name`, `complexity`, `priority`, `type`, `assignee`, `assigned_by`, `alloted_hours`, `actual_hours`, `date`, `time`, `task_detail`, `status`, `reviewer` from emptask where assignee='$empid'";
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
		                                          <p class='text-success'>".ucfirst($empid)."</p>
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
						
							
							$query3="select `taskid`, `pid` from interested_party where empid='$empid'and pid!=taskid";
							if($query3_run=mysqli_query($c,$query3)){
								
		                        while($result3=mysqli_fetch_assoc($query3_run)){
									
									$pid1=$result3['pid'];
									$taskid1=$result3['taskid'];
									$query2="select `taskid`, `pid`, `task_name`, `complexity`, `priority`, `type`, `assignee`, `assigned_by`, `alloted_hours`, `actual_hours`, `date`, `time`, `task_detail`, `status`, `reviewer` from emptask where taskid='$taskid1' and pid='$pid1'";
							
									if($query2_run=mysqli_query($c,$query2)){
		                        $result2=mysqli_fetch_assoc($query2_run);
								
									$pid2=$result2['pid'];
		                            $taskid2=$result2['taskid'];
		                            $taskname2=$result2['task_name'];
		                            $comp2=$result2['complexity'];
		                            $priority2=$result2['priority'];
		                            $type2=$result2['type'];
									$assignee2=$result2['assignee'];
		                            $status2=$result2['status'];
		                            $assigned_by2=$result2['assigned_by'];
		                            $alloted_hours2=$result2['alloted_hours'];
		                            $actual_hours2=$result2['actual_hours'];
		                            $date2=$result2['date'];
		                            $time2=$result2['time'];
		                            $tdetail2=$result2['task_detail'];
		                            $reviewer2=$result2['reviewer'];
									echo "<tr> 
		                                        <td><p class='text-info'>$pid2</p></td>
		                                        <td>

		                                            <button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#myModal$pid2$taskid2'>
                                                    <i class='fa fa-tasks' aria-hidden='true'></i>

		                                            $taskid2

		                                            </button>
		                                        </td>
		                                        <td><p class='text-warning'> $status2 </p>
                                                    <input type='hidden' name='olds$pid2$taskid2' value='$status2'>
		                                        </td> 
		                                      
		                                        <td> 

		                                          <p class='text-success'>".ucfirst($assignee2)."</p>

		                                       </td>
		                                       <td> 
		                                           <p class='text-success'>".ucfirst($assigned_by2)."</p> 

		                                       </td>
		                                       <td></td>
		                            </tr> ";
									
									modal($pid2,$taskid2,$assigned_by2,$date2,$time2,$alloted_hours2,$tdetail2,$comp2,$priority2,$type2,$taskname2,$actual_hours2,$status2,$c);
									}
									else echo mysqli_error($c);
									
							
							}
							}
						
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
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php
}
}
?>