<?php
include 'sqlconnect.php';
include "init_core.php";
include 'head_info.php';
include "sqlconnect.php";
include  'sidebar.php';
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
            <h3 class="panel-title">Leave Application Status</h3>
            <div class="panel-body">
                <form class="well form-horizontal" action="" method="post"  id="" style="background-color:#FFFFFF;">
                    <fieldset style="background-color:#FFFFFF;">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th>Date : Fm</th>
                                <th>Date : To</th>
                                <th>Send From (ID)</th>
                                <th>Send To (ID)</th>
                                <th>Reason For Leave </th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
   <?php
// 'sidebar.php';
$uid= $_SESSION['uid'];

    $sql="SELECT * FROM `leave` ORDER BY `leave_from` DESC";
    $r=mysqli_query($c,$sql);//r contains result send from table 
while($row= mysqli_fetch_array($r))
{
   
     if ($row['status']==0)
     {
         $leave='pending';
         
     }
      if ($row['status']==1)
     {
         $leave='approved';
         
     }
      if ($row['status']==-1)
     {
         $leave='rejected';
         
     }



  echo '
                <tr class="info">
                    <td>'.$row['leave_from'].'</td>
                    <td>'.$row['leave_to'].'</td>
                    <td>'.$row['applicant'].'</td>
                        <td>'.$row['send_to'].'</td>
                    <td>'.$row['type'].'</td>
                    <td>'.$leave.'</td>
                </tr>';


}                             
                                
                                