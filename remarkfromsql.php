<?php
include 'sqlconnect.php';
ob_start();
session_start();
if($_POST)
{
    $d=$_POST['d'];
    $t1=$_POST['t'];
	//echo $d."\t".$t1;
    $a=count($_SESSION['pid']);
	$st="";
	$p=$_SESSION['pid'];
	$t=$_SESSION['tid'];
	for($i=0;$i<$a;$i++)
	{
		$st.="(pid='".$p[$i]."' and taskid ='".$t[$i]."') or";
	}
	$st=substr($st,0,-3);
	$query="select pid,taskid,remark,date,time,remark_by from remark_history where (".$st.") and remark_by!='".$_SESSION['uid']."'and date='".$_SESSION['walkin'][0]."' and time>'".$_SESSION['walkin'][1]."' ORDER BY date DESC, time DESC LIMIT 10" ;
	//echo $query;
    $color=0;
	//$t1=date("H:i:s", (strtotime($d." ".$t1) + 8));
	//$d=date("Y-m-d", (strtotime($d." ".$t1) + 8));
	//echo "\n".$_SESSION['walkin'][0]."     ".$_SESSION['walkin'][1];
	//echo "\n".$d.'   '.$t1;
	$_SESSION['walkin'][0]=date("Y-m-d", (strtotime($_SESSION['walkin'][0]." ".$_SESSION['walkin'][1]) + 8));
	//$_SESSION['walkin'][1]=date("H:i:s", (strtotime($_SESSION['walkin'][0]." ".$_SESSION['walkin'][1]) + 8));;
	//echo "\n".$_SESSION['walkin'][0]."     ".$_SESSION['walkin'][1];
	$code="success";
	if($query_run=mysqli_query($c,$query))
	{
		/*$result1=mysqli_fetch_assoc($query_run);
		if($result1)
		{
			print_r($result1);
			$_SESSION['walkin'][1]=$result1['time'];
		}
		else{
			
		}
		echo $_SESSION['walkin'][1];*/
	$tzz=0;
		while($result=mysqli_fetch_assoc($query_run)){
			$pid=$result['pid'];
			$taskid=$result['taskid'];
			$remark=$result['remark'];
			$by=$result['remark_by'];
			$date=$result['date'];
			$time=$result['time'];
			if($tzz==0)
			{
				$_SESSION['walkin'][1]=$result['time'];
				$tzz=1;
			}
			
			echo   '<div class="alert alert-'.$code.'">
                           <p class="text-success" style="font-size:11px;">
                                         <a href="myprojects.php?pid='.$pid.'&tid='.$taskid.'">     Updated at '.$date.' '.$time.' by '.$by.' in Project'.$pid.'  in TaskID '.$taskid.'</a></p> <br>&nbsp; &nbsp;  
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
}
?>