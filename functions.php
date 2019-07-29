<?php
function employee_list($c){
   $query="select empid,full_name,department,sub_department from New_Employee where 1";
   $fool=0;
   if($query_run=mysqli_query($c,$query)){
            while($result=mysqli_fetch_assoc($query_run)){ 
             if($fool!=0)
                  echo  ",";                                                 
                  $empid=$result['empid'];
                  $name=$result['full_name'];
                  $department=$result['department'];
                  $sub_department=$result['sub_department'];
                  echo '"'.$name.'/'.$empid.'"';
                  $fool=1;

                }
        
                    }
    
}


  
  function check($remark,$c,$uid)
{
	$curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://api.timezonedb.com/v2/get-time-zone?key=GN6RDE1GDO00&format=json&by=zone&zone=Asia/Kolkata',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_SSL_VERIFYPEER => 0
        ));

    
$json=curl_exec($curl);
curl_close($curl);

$json=json_decode($json,true);

$ts=$json['formatted'];
$parts = preg_split('/\s+/', $ts);
if($remark=='walkin')
{

$query2="select empid from attendence where empid='$uid' and date='$parts[0]' and remark='walkin'";

$query_run2=mysqli_query($c,$query2);

if(mysqli_num_rows($query_run2)==0)
{
 $query="insert into attendence(empid,att_time,date,remark) values ('$uid','$parts[1]','$parts[0]','walkin')";
 if($query_run=mysqli_query($c,$query)){

 echo "<div class='alert alert-success'> Your attendance is locked at ".$parts[0]."  ".$parts[1]."</div>";
 }
             
			 }
	else  
	echo	"<div class='alert alert-success'> Your attendance is already locked. </div>";
}

if($remark=='walkout')
{
	if($parts[0]!="")
	{
	$query2= "delete from attendence where empid='$uid' and date='$parts[0]' and remark='walkout'";
			mysqli_query($c,$query2);
             $query="insert into attendence(empid,att_time,date,remark) values ('$uid','$parts[1]','$parts[0]','walkout')";
             if($query_run=mysqli_query($c,$query)){
             echo "<div class='alert alert-success'> Your attendece is locked at ".$parts[0]."  ".$parts[1]."</div>";
			 }
}
}
	
	
}

function project_list($c){
   $query="select pid,pname from project where 1";
   $fool=0;
   if($query_run=mysqli_query($c,$query)){
            while($result=mysqli_fetch_assoc($query_run)){ 
             if($fool!=0)
                  echo  ",";                                                 
                  $pid=$result['pid'];
                  $pname=$result['pname'];
                  echo '"'.$pname.'/'.$pid.'"';
                  $fool=1;

                }
        
					}
    
}

function emodal($pid,$taskid,$assigned_by,$date,$time,$alloted_hours,$status,$oldstatus,$c){

?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css"> 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <style>
.ui-autocomplete {
  z-index:5000;
}
.ui-autocomplete {
    position: absolute;
}


  .form-horizontal .control-label{
text-align:right; 


}
select {
  font-family: 'FontAwesome', 'sans-serif';
}

</style>
<input type="hidden" name="oldstatus" value="<?php echo $oldstatus;?>">
<div id='editmodal<?php echo $pid.$taskid; ?>' class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style='text-align:center;'>Edit Task Status</h4>
         </div>
         <div class="modal-body" style="text-align:center;">
         <form action="myproject.php" method="POST">
            <div class="form-group">
               <label class="col-md-2 control-label">Project ID</label>  
               <div class="col-md-3 inputGroupContainer">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                     <input name="pid" value="<?php echo $pid?>" class="form-control" type="text" readonly>
                  </div>
               </div>
               <label class="col-md-2 control-label">Task ID</label>  
               <div class="col-md-3 inputGroupContainer">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                     <input name="tid" value="<?php echo $taskid;?>" class="form-control" type="text" readonly>
                  </div>
               </div>
            </div>
            <br/>
            <div class="form-group">
               <div class="col-md-6 col-md-offset-3 inputGroupContainer">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i></span>
                     <select name="newstatus" class="form-control selectpicker">
                        <option value="--select--">
                          --Change Status--
                        </option>
                        <option value="InProgress">
                           In-Progress  
                        </option>
                        <option value="Submitted">
                           Submitted  
                        </option>
                        <option value="Review">
                           Review  
                        </option>
                        <option value="ReviewInProgress">
                           Review-in-Progress  
                        </option>
                        <option value="Closed">
                           Closed  
                        </option>
                     </select>
                  </div>
               </div>
                <script>
                    $( function() {
                      var availableTags = [
                        <?php employee_list($c);?>
                      ];
                      $( ".newone" ).autocomplete({
                        source: availableTags
                      });
                    } );
                    </script>
            </div>
               </br>

            <div class="form-group">
                  <label class="col-md-2"></label>
                <label class="col-md-2 control-label">New Assignee</label>

               <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>       
                          <input class="newone form-control" name="newassignee" placeholder="Start typing...">
                     
                  </div>
               </div>
            </div>   

              <div class="form-group">
                  <label class="col-md-2"></label>
                <label class="col-md-2 control-label">Billed Hours</label>
                
               <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>       
                          <input class="form-control" name="billedhrs">
                     
                  </div>
               </div>
            </div>
              <div class="form-group">
                  <label class="col-md-2"></label>
                <label class="col-md-2 control-label">Trasfer Remark</label>
                
               <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-book fa-fw" aria-hidden="true"></i></span>       
                         <textarea class="form-control" name="remark"></textarea>
                     
                  </div>
               </div>
            </div>
           
            <button type="submit" class="btn btn-primary btn-lg" name="change_status"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Send </button>
         </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"></button>
         </div>
      </div>
   </div>
</div>




<?php

}

?>

<?php

function get_deadline($pid,$c){

  $query="select deadline from project where pid='$pid'";
  $deadline="";
   if($query_run=mysqli_query($c,$query)){
            while($result=mysqli_fetch_assoc($query_run)){                                                  
                  $deadline=$result['deadline'];}
        
                    }
    return $deadline;                          

}



function display_remark($pid,$taskid,$c){
  $query="select remark,remark_by,date,time from remark_history where pid='$pid' and taskid='$taskid'ORDER BY date DESC, time DESC";
   $color=0;
   $code="success";
   echo '<div id="display'.$pid.$taskid.'">
        </div>';
   if($query_run=mysqli_query($c,$query)){
            while($result=mysqli_fetch_assoc($query_run)){                                                  
                  $remark=$result['remark'];
                  $name=$result['remark_by'];
                  $date=$result['date'];
                  $time=$result['time'];

               echo   '<div class="alert alert-'.$code.'">
                           <p class="text-danger" style="font-size:11px;">
                                         Updated by '.$date.' '.$time.' by '.$name.'</p> <br>&nbsp; &nbsp;  
                           <i class="fa fa-comment" aria-hidden="true"></i>'.$remark.'
                       </div>';

                  $color=$color+1;
                  if($color==0)
                    $code="info";
                  else if($color==1)
                        $code="danger"; 
                  
                  else if($color==2)
                        $code="warning";
                  else{
                       $code="success";
                       $color=0;
                  }     


                }

                    }
    }

function task_display($key,$num,$c,$par){

                     $query="select full_name,department,sub_department from New_Employee where empid='$key'";
                      if($query_run=mysqli_query($c,$query)){
                        while($result=mysqli_fetch_assoc($query_run))
						{
                           
                          
                            $name=$result['full_name'];
                            $department=$result['department'];
                            $sub_department=$result['sub_department'];  
                        
                         echo  '<tr>
                           
                           
                            <td>
                              1
                               <input type="hidden" name="eid'.$num.'" value="'.$key.'">
                               <p class="text-info"><i class="fa fa-id-card-o" aria-hidden="true"></i> '.$key.'</p>
                              
                               <p class="text-primary"><i class="fa fa-user-o" aria-hidden="true"></i>
                                               '.ucfirst($name).'</p>
                               <p class="text-danger">'.$department.'<br>'.$sub_department.'</p>

                            </td>
                            <td>
                            <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-tasks" aria-hidden="true"></i></span> 
                            <input type="text" class="form-control" name="tname'.$key.'" style="width:80px;" >
                            </div>
                             </td>
                           <td> <textarea name="tdecs'.$key.'" rows=4 cols=20 class="form-control"> </textarea></td>
                           <td>  
                                <select name="complex'.$key.'" class="form-control selectpicker">

                                    <option value="high"> HIGH </option>
                                    <option value="medium"> MEDIUM </option>
                                    <option value="low"> LOW </option>
                                </select>    

                           
                             
                                <select name="priority'.$key.'" class="form-control selectpicker">
                                    <option value="urgent"> URGENT </option>
                                    <option value="high"> HIGH </option>
                                    <option value="medium"> MEDIUM </option>
                                    <option value="low"> LOW </option>
                                </select>    

                           </td>
						   <td>
                            <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                             
                            <input type="text" class="form-control party" name="iparty'.$key.'" style="width:120px;" value="'.$par.'"
							>
                            </div>
                             </td>
                             <td>  
                                <select name="type'.$key.'" class="form-control selectpicker">
                                    <option value="development"> Development </option>
                                    <option value="ongoing"> Ongoing </option>
                                    <option value="implementation"> Implementation </option>
                                   
                                </select>    

                           </td>
                             <td> 
                             <div class="input-group">
                             <span class="input-group-addon"> <i class="fa fa-clock-o" aria-hidden="true"></i></span>
                             <input type="text" class="form-control" name="alloted_hours'.$key.'" style="width:50px;"> 
                             </div>

                             </td>
                          </tr>';
                        }}}



function get_name($empid,$c){
 $query="select full_name from New_Employee where empid='$empid'";
 if($query_run=mysqli_query($c,$query)){
  while($result=mysqli_fetch_assoc($query_run)){
      $name=$result['full_name'];
  }
}
return $name; 
}



function get_tasknum($project,$c){
 $query="select task_count from project where pid='$project'";;
 if($query_run=mysqli_query($c,$query)){
  while($result=mysqli_fetch_assoc($query_run)){
      $task_count=$result['task_count'];
  }
}
return $task_count; 

}



function  insertintask($taskid,$pid,$tname,$complex,$priority,$type,$assignee,$assignby,$allotted_hours,$date,$time,$tdecs,$task_num,$c)
	{
    echo "<br>".$assignby;
    $query="insert into emptask(`taskid`, `pid`, `task_name`, `complexity`, `priority`, `type`, `assignee`, `assigned_by`, `alloted_hours`, `actual_hours`, `date`, `time`, `task_detail`, `status`, `reviewer`) values ('$taskid','$pid','$tname','$complex','$priority','$type','$assignee','$assignby',$allotted_hours,0,'$date','$time','$tdecs','submitted','NULL')";
    $query1="insert into logtable(`taskid`, `pid`, `date`, `time`, `assignee`, `asigned_by`, `status`,`transfer_remark`) values ('$taskid','$pid','$date','$time','$assignee','$assignby','fresh task','NULL')";
    $queryrun3=mysqli_query($c,$query1);
        $flag=0;
        if($query_run=mysqli_query($c,$query)){
                $query2="update project set task_count=$task_num+1 where pid='$pid'";
                $query_run2=mysqli_query($c,$query2);
        }
        else{
            $flag=1;
            echo mysqli_error($c);
        }
        return $flag;
}

function get_pid($c){
$query="select pid from curr_id where 1";
if($query_run=mysqli_query($c,$query)){
  while($result=mysqli_fetch_assoc($query_run)){
      $pid=$result['pid'];
  }
}
return $pid;
}

function update_pid($pid,$c){
 
$query2="update curr_id set pid=$pid+1 where 1";
if($query_run2=mysqli_query($c,$query2)){
 
}
else echo mysqli_error($c);

}




function display_employee($empid,$name,$department,$sub_department,$email,$joining,$dob,$sex,$salary,$phone,$address){
	
echo'	<div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">'.$name.'</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/user.png" class="image-circle" width=50 height=50> </div>
                
     
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     <tr>
                        <td>Employee ID:</td>
                        <td>'.$empid.'</td>
                      </tr>
                      <tr>
                        <td>Department:</td>
                        <td>'.$department." ".$sub_department.'</td>
                      </tr>
                      <tr>
                        <td>Hire date:</td>
                        <td>'.$joining.'</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>'.$dob.'</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Sex</td>
                        <td>'.$sex.'</td>
                      </tr>
                        <tr>
                        <td>Salary</td>
                        <td>'.$salary.'</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:'.$email.'">'.$email.'</a></td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td>'.$phone.'
                        </td>
                           
                      </tr>
                       <tr>
                        <td>Address</td>
                        <td>'.$address.'
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
';
}
function getipid($iname)
{
	$ids=array();
	$s=split(",",$iname);
		$z=count($s);
                
		
		for($i=0;$i<$z-1;$i++)
		{
			$s1=split("/",$s[$i]);
			array_push($ids,$s1[1]);
		}
		return $ids;
}

?>
<script>
  $( function() {
    var availableTags = [
      <?php employee_list($c);?>
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( ".party" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
  </script>