<?php
include_once 'init_core.php';
include_once 'sidebar.php';
include_once 'sqlconnect.php';
include 'head_info.php';
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

echo '<div class="container"><div class="col-md-6 col-md-offset-3"> <img class="image-responsive" src="images/notig.png" width=100% height=28%/></div> <div class="col-md-6 col-md-offset-3">';
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
   echo "</div></div>";
		}
else 
	echo mysqli_error($c);
?>

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