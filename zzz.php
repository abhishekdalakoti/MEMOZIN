<?php
include 'init_core.php';
if(loggedin()){

?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  
 <script type = "text/javascript">
    $(document).ready(function(){

      $('#myModal').modal('show');

    });


</script>



</head>

<?php 
include 'functions.php';
include_once 'sqlconnect.php';
include 'head_info.php';
include 'sidebar.php';
?>
<div id='myModal' class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body" style="">
		 <?php


$a=count($_SESSION['pid']);
$st="";
$p=$_SESSION['pid'];
$t=$_SESSION['tid'];
for($i=0;$i<$a;$i++)
{
	$st.="(pid='".$p[$i]."' and taskid ='".$t[$i]."') or";
}
$st=substr($st,0,-3);
$query="select pid,taskid,remark,date,time,remark_by from remark_history where (".$st.") and remark_by!='".$_SESSION['uid']."' ORDER BY date DESC, time DESC LIMIT 10" ;

echo ' <img class="image-responsive" src="images/notig.png" width=100% height=28%/>';
$color=0;
$code="success";
echo "<div class='results'> </div>";
if($query_run=mysqli_query($c,$query))
		{
			while($result=mysqli_fetch_assoc($query_run))
			{
				$pid=$result['pid'];
				$taskid=$result['taskid'];
				$remark=$result['remark'];
				$date=$result['date'];
				$time=$result['time'];
				$by=$result['remark_by'];
				echo   '<div class="alert alert-'.$code.'">
                           <p class="text-success" style="font-size:11px;">
                                    <a href="myprojects?pid='.$pid.'&tid='.$taskid.'">     Updated at '.$date.' '.$time.' by '.$by.' in Project'.$pid.'  in TaskID '.$taskid.'</a></p> <br>&nbsp; &nbsp;  
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
   echo "";
		}
else 
	echo mysqli_error($c);
?>
            
         </div>
      </div>
   </div>
</div>


<script>
function loop_noti() {
    setInterval(function() { 
         $.post('remarkfromsql', {
           d:'<?php echo $_SESSION['walkin'][0]; ?>',
           t:'<?php echo $_SESSION['walkin'][1]; ?>'
          
        }, function(data) {
		
             $('.results').prepend(data);
        });
    }, 8000);
}
 $(window).load(loop_noti);
</script>
<?php 
}


?>



