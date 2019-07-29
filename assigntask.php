<?php 
include_once 'init_core.php';
include 'sqlconnect.php';
include 'head_info.php';
include_once 'sidebar.php';
include_once 'functions.php';

  
if(isset($_POST['taskintosql'])){
      //print_r($_POST);
     
      $num=$_POST['num'];
    
     
     $flag=0;
     for ($i=0;$i<$num;$i++){
                $eid=$_POST["eid$i"];
                $tname=$_POST["tname$eid"];
                $tdecs=$_POST["tdecs$eid"];
                $complex=$_POST["complex$eid"];
                $priority=$_POST["priority$eid"];
                $type=$_POST["type$eid"];
                $allotted_hours=$_POST["alloted_hours$eid"];
				$iparty=$_POST["iparty$eid"];
                //echo $allotted_hours;
                $pid=$_POST['pid'];
                

                $assignee=$eid;
                $assignby=$_SESSION['uid'];
                $task_num=get_tasknum($pid,$c);
                $taskid=strtoupper(substr($assignby,0,3)).$task_num;
                $date=date("Y-m-d");
                $time=date("H:i:s");
                //echo $date.$taskid.$pid;
                $flag=insertintask($taskid,$pid,$tname,$complex,$priority,$type,$assignee,$assignby,$allotted_hours,$date,$time,$tdecs,$task_num,$c);
				$a=getipid($iparty);
			for($j=0;$j<count($a);$j++)
			{
				$query1="insert into interested_party (pid,taskid,empid) values ('$pid','$taskid','$a[$j]')";
				$query1_run=mysqli_query($c,$query1);
			}
     }
     

      if($flag==1){
             echo '<div class="alert alert-danger">
                      <strong>Error!</strong>
                    </div><meta http-equiv="refresh" content="1;url=index" />';
        }
        else{
            echo '<div class="alert alert-success">
                      <strong>Success!</strong>
                    </div> <meta http-equiv="refresh" content="1;url=setgoals" />
';
        }
        }

else{

?>

<style>

*{
    font-size: 14px;
}
.panel > .panel-heading {
    background-image: none;
    background-color:#A1CAF1;
    

}

</style>

 <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" style="margin-left:5%;">
  <div class="panel panel-default panel-table">
              <div class="panel-heading" style='background-color:#A1CAF1;'>
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Assign Task</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
               <form method="POST" action="assigntask">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                       
                      
                        <th>Emp Detail</th>                       
                        <th> Task Name </th>
                        <th> Task Description </th>
                        <th> Complexity & Priority </th>
                        <th> Interested Party </th>
                        <th> Type </th>
                        <th> Allotted Hours </th>
                      
                    </tr> 
                  </thead>
                  <tbody>

                  <?php
				  $flag=0;
				  $z="";
				  
				  foreach ($_POST as $key => $value)
				  {
					  if($key=='pid')
					  {
						$z= $_POST['pid'];
						$flag=1;
						break;
					  }
				  }
				  if($flag==0 )
				  {
					$s=split("/",$_POST['epname']);
				    $z=$s[1];
				  }
				  
				  
 
 $cnt=0;
 if(isset($_POST['ename']))
 {$s=split(",",$_POST['ename']);
 $cnt=count($s);
 }
 $qu="select interested_party from project where pid='$z'";
 if($qu_run=mysqli_query($c,$qu)){
  while($result=mysqli_fetch_assoc($qu_run))
      $par=$result['interested_party'];
 }
 $num=0;

 
                   
					
			
                   foreach ($_POST as $key => $value) {
					   
                            if($key!='pid' && $value=='on')
							{
								
								
                                
                              task_display($key,$num,$c,$_POST['party']);
                                 $num+=1;
								
							}
							else if($key=='ename' && $value!='')
								{
									for($i=0;$i<$cnt-1;$i++)
		{
			$s1=split("/",$s[$i]);
		
		
			task_display($s1[1],$num,$c,$par);
			$num+=1;
		}
									
								}
                            
							 
                             else echo "<input type='text' name='pid' value='$z' hidden>";
                          }
					
					

                    echo "<input type='text' name='num' value='$num' hidden>"


                          


                    ?>
                        </tbody>
                </table>
                <input type="submit" name="taskintosql" value="Send to Employees!" class="btn btn-primary">
            </form>
              </div>
              </div>
   </div>           
 <?php
 }
 ?>