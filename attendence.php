
<?php 
include 'init_core.php';

if(loggedin()){


include 'head_info.php';
include 'sidebar.php';
include 'sqlconnect.php';

?>



<div class="container" style="background-color: #A1CAF1;padding:20px;margin-left:5%;">
  
   <form class="well form-horizontal" action="attendence.php" method="post" style="background-color:#FFFFFF;">
      <fieldset style="background-color:#FFFFFF;">
         <!-- Form Name -->
       <center>  <legend> &nbsp; &nbsp;  <img class="img-responsive" src="images/att2.jpg" width=25% height=25%/></legend> </center>
         <div class="form-group">
                  <label class="col-md-4 control-label" >Walk-IN Time</label> 
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-clock-o" aria-hidden="true"></i></span>
                        <input class="form-control" name="attyes" type="radio" checked="checked">
                     </div>
                  </div>
           </div>
          <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-4">
                     <button type="submit" class="btn btn-primary" name="attclick">I am Present <span class="glyphicon glyphicon-send"></span></button>
                  </div>
          </div>  
      
      </fieldset>
   </form>   
     <?php if(isset($_POST['attclick']) && isset($_POST['attyes'])){                  
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

 $query="insert into attendence(empid,att_time,date,remark) values ('$_SESSION[uid]','$parts[1]','$parts[0]','walkin')";
 if($query_run=mysqli_query($c,$query)){

 echo "<div class='alert alert-success'> Your attendece is locked at ".$parts[0]."  ".$parts[1]."</div>";

             }
}
           ?>
   
   </div>
</div>

<?php

}



?>

