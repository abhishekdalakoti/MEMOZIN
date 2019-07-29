<?php


include 'sqlconnect.php';
include 'init_core.php';
include 'head_info.php';
include 'sidebar.php';

$pid="ME25";

if(loggedin()){

{
?>
<head>
<style type="text/css">
	*{
		font-size: 14px;
	}
</style>
</head>
   <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >

 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Task History</h3>
            <div class="panel-body">
                 <form class="well form-horizontal" action="myprojects.php" method="post"  id="contact_form" style="background-color:#FFFFFF;">
                    <fieldset style="background-color:#FFFFFF;">
                           <table class="table table-striped table-bordered table-list">
		                  <thead>
		                    <tr>
		                       
		                       
		                        
		                        <th> Project ID </th>
		                        <th> Task ID </th>
		                        <th> Time </th>
		                        <th> Old Status </th>
		                        <th> New Status </th>

		                         <th> Changed by </th>
		                          <th> Remark </th>
		                    </tr> 
		                  </thead>
		                  <tbody>
		                  <?php
                             $query="SELECT `taskid`, `pid`, `fromstate`, `tostate`, `date`, `time`, `changedby`, `remark` FROM task_history where pid='$pid'";
                             $cc=0;
		                      if($query_run=mysqli_query($c,$query)){
		                        while($result=mysqli_fetch_assoc($query_run)){
		                           
		                            $pid=$result['pid'];
		                            $taskid=$result['taskid'];
		                            $fromstate=$result['fromstate'];
		                            $tostate=$result['tostate'];
		                            $date=$result['date'];
		                            $time=$result['time'];
		                            $changedby=$result['changedby'];
		                            $remark=$result['remark'];
		                            
		                            echo "<input type='hidden' name='$cc' value='$pid-$taskid'>";
		                             $cc++;
		                            echo "<tr> 
		                                        <td><p class='text-info'>$pid</p></td>
		                                        <td>
		                                            <p class='text-info'> $taskid </p>
		                                        </td>
		                                        
		                                        <td>
						                            $date $time
		                                        </td> 
		                                        <td><p class='text-warning'> $fromstate </p></td> 
		                                        <td><p class='text-warning'> $tostate </p></td> 
		                                        <td><p class='text-danger'> $changedby </p></td> 
		                                        <td><p class='text-primary'> $remark </p></td> 
		                                      
		                                       
		                            </tr> ";		                            
		                        }
		                    }else echo mysqli_error($c);
				             ?>

		                  </tbody>
                                 
					            
					  </table> 
					   
                    </fieldset>
                     <input type="hidden" name="tnum" value='<?php echo $cc;?>'>
                 </form> 
               
            </div>
</div>
</div>

<?php
}
}

?>