

<?php
include 'sqlconnect.php';
include "init_core.php";
include 'head_info.php';
include "sqlconnect.php";
include  'sidebar.php';

$uid= $_SESSION['uid'];
 if(isset($_POST['status']) && !empty($_POST['status'])){
   
    $s=$_POST['status'];
   $a=$_POST['applicant'];
    $r1=$_POST['leave_from'];
    $r2=$_POST['leave_to'];
    
    $sq ="UPDATE `leave` SET `status`= $s where `applicant`= '$a' AND `leave_from`= '$r1' AND `send_to`= '$uid' AND `leave_to`= '$r2' ";
    $ro=mysqli_query($c,$sq);
    if($s==1)
    {
for ($date = strtotime($r1); $date <= strtotime($r2); $date = strtotime("+1 day", $date)) {

    $p=date("Y-m-d",$date);
    $sql1="INSERT INTO `attendence` (`empid`, `att_time`, `date`, `remark`) VALUES ('$a', '00:00:00', '$p', 'leave');";
   // echo $sql1;
    $ab=mysqli_query($c,$sql1); 
}

    }
    
    
    
}
$sql="SELECT * FROM `leave` where `send_to`= '$uid' AND `status`= 0 ORDER BY `leave_from` DESC";
//echo $sql;
?>
<head>
    <style type="text/css">
        *{
            font-size: 13px;
        }
    </style>
</head>
<div class="col-4 col-4 col-6 col-lg-7 col-sm-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Leave Notification</h3>
            <div class="panel-body">
            
                    <fieldset style="background-color:#FFFFFF;">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th>EMP ID</th>
                                <th>Date : Fm</th>
                                <th>Date : To</th>
                                <th>Reason For Leave </th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
 $r=mysqli_query($c,$sql);//r contains result send from table
$ccx=0; 
while($row= mysqli_fetch_assoc($r))
{
    $a=$row['applicant'];
    $r1=$row['leave_from'];
 
echo'
                            <tr class="info">
                                <td>'.$row['applicant'].'</td>
                                <td>'.$row['leave_from'].'</td>
                                <td>'.$row['leave_to'].'</td>
                                <td>'.$row['type'].'</td>
                                <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal'.$ccx.'" data-whatever="@mdo">Pending</button></td>
                            </tr>
                            
                            <div class="modal fade" id="exampleModal'.$ccx.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Leave Application</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">'.$row["reason"].
                                            
                                        '</div>
                                        <div class="modal-footer">
                                        <form class="well form-horizontal" action="LeaveNotify" method="post"  id="" style="background-color:#FFFFFF;">
                                            <input type="hidden" value='.$row["applicant"].' name="applicant">
                                            <input type="hidden" value='.$row["leave_to"].' name="leave_to">
                                                <input type="hidden" value='.$row["leave_from"].' name="leave_from">
                                            <button type="submit" class="btn btn-primary" name="status" value="-1">Reject</button>
                                            <button type="submit" class="btn btn-primary" name="status" value="1">Accept</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>';
  
                        
$ccx=$ccx+1;

}
?>
</tbody>
</table>
</fieldset>
</div>
</div>
</div>
</div>


                           

