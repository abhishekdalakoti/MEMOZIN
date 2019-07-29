
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Emp</title>

  
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
	</script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
    

</head>

<style>
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #dae5f4; // Choose your own color here
 }
 .table-striped>tbody>tr:nth-child(even)>td, 
.table-striped>tbody>tr:nth-child(even)>th {
   background-color: #b8d1f3; // Choose your own color here
 }
.body{
	
	
}
</style>

<?php
include "sqlconnect.php";
include "empnav.php";

$query="select distinct department from department";

if($query_run=mysqli_query($c,$query)){
	while($result=mysqli_fetch_array($query_run)){
		$department[]=$result['department'];

	}
}

?>


<div class="container-fluid" style="background-color:#F3F3F3;">
 

<div class="row" style="margin-left:100px; margin-right:100px;">
   <div class="col-md-6"> 
  <table class="table table-striped"> 
 <tr> <td> Emp. ID </td> <td> <input type="text" name="empid"> </td> </tr>
 <tr> <td> Name </td> <td> <input type="text" name="name"> </td> </tr>
 <tr> <td> Father's Name </td> <td> <input type="text" name="fname"> </td> </tr>
 <tr> <td> Date of Birth </td> <td> <input type="text" name="dob" id="datepicker"> </td> </tr>
  <tr> <td> Sex </td> <td> Male <input type="radio" name="sex">&nbsp; &nbsp; Female <input type="radio" name="sex"> </td> </tr>
 <tr> <td> Marital Status </td> <td> Unmarried <input type="radio" name="marital" value="unmarried" id="unmarried"> &nbsp; &nbsp; Married <input type="radio" name="marital" value="married" id="married"></td> </tr>
  <tr  id="spouse"> <td>Spouse Name </td> <td> <input type="text" name="spouse"> </td> </tr>
 <tr> <td> Mobile </td> <td> <input type="phone" name="phone"> </td> </tr>
 <tr> <td> Emergency Phone </td> <td> <input type="text" name="emergency"> </td> </tr>
  <tr> <td> Email </td> <td> <input type="email" name="email"> </td> </tr>
   <tr> <td> Department </td> <td> <select id="department"> <option> --Select-- </option> <?php  for($i=0;$i<7;$i++) echo "<option value='".$department[$i]."'>".$department[$i]."</option>";   ?> </select> </td> </tr>
   <tr> <td> Sub-Department </td> <td> <select id="subdepartment"> <option> </option> </select> </td></tr>
   <tr> <td> Blood Group </td> <td> <input type="text" name="blood"> </td></tr>
      <tr> <td> Nationality </td> <td> <input type="text" name="national"> </td></tr>
	  <tr> <td> REFF </td> <td> <input type="text" name="reff"> </td></tr>
 </table>
   </div>
 
 
    <div class="col-md-6">
 <table class="table table-striped">	
 <tr> <td> Date of Joining </td> <td> <input type="text" name="joining" id="datejoining"> </td></tr>
  <tr> <td>PAN Number * </td> <td> <input type="text" name="pan"> </td></tr>
   <tr> <td>Aadhar No. </td> <td> <input type="text"> </td></tr>
    <tr> <td>Voter ID </td> <td> <input type="text"> </td></tr>
	 <tr> <td>Salary </td> <td> <input type="text" name="salary" style="width:80px;"> </td></tr>
	  <tr> <td>Present Address </td> <td> <textarea rows=4 cols=40> </textarea> </td></tr>
	  <tr> <td> State </td> <td>
	   <div id="selection">
        <select id="listBox" onchange='selct_district(this.value)'></select></td>
		</tr>
		<tr><td> City </td>
       <td> <select id='secondlist'></select>
      </div></td>
	  </tr>
	  
	    <tr> <td>Permanent Address </td> <td> <textarea rows=4 cols=40> </textarea> </td></tr>
	  <tr> <td> State </td> <td>
	  
        <select id="listBox2" onchange='selct_district(this.value)'></select></td>
		</tr>
		<tr><td> City </td>
       <td> <select id='secondlist2'></select>
      </td>
	  </tr>
 
	 <table>
	</div> 
 </div>
 
 
 
 </div>
 
 
 
 
  <script>
  $("#department").click(function(){
	  alert("hey");
  });
  $("#spouse").hide();
  
  $("#unmarried").click(function(){
	  $("#spouse").hide();
  }
  )
 
  $("#married").click(function(){
	$("#spouse").show();
  });
  
  
$( function() {
    $( "#datepicker" ).datepicker();
  } );
  
  $( function() {
    $( "#datejoining" ).datepicker();
    $( "#anim" ).on( "change", function() {
      $( "#datepicker" ).datepicker( "option", "showAnim", "slide" );
    });
  } );
  </script>