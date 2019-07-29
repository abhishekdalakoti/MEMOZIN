<?php
include 'sqlconnect.php';

?>

<head>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
/*    --------------------------------------------------
	:: General
/*    --------------------------------------------------
	:: General
	-------------------------------------------------- */
body {
	font-family: 'Open Sans', sans-serif;
	color: #353535;
}
.content h1 {
	text-align: center;
}
.content .content-footer p {
	color: #6d6d6d;
    font-size: 12px;
    text-align: center;
}
.content .content-footer p a {
	color: inherit;
	font-weight: bold;
}

/*	--------------------------------------------------
	:: Table Filter
	-------------------------------------------------- */
.panel {
	border: 1px solid #ddd;
	background-color: #fcfcfc;
}
.panel .btn-group {
	margin: 15px 0 30px;
}
.panel .btn-group .btn {
	transition: background-color .3s ease;
}
.table-filter {
	background-color: #fff;
	border-bottom: 1px solid #eee;
}
.table-filter tbody tr:hover {
	cursor: pointer;
	background-color: #eee;
}
.table-filter tbody tr td {
	padding: 10px;
	vertical-align: middle;
	border-top-color: #eee;
}
.table-filter tbody tr.selected td {
	background-color: #eee;
}
.table-filter tr td:first-child {
	width: 38px;
}
.table-filter tr td:nth-child(2) {
	width: 35px;
}
.ckbox {
	position: relative;
}
.ckbox input[type="checkbox"] {
	opacity: 0;
}
.ckbox label {
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
.ckbox label:before {
	content: '';
	top: 1px;
	left: 0;
	width: 18px;
	height: 18px;
	display: block;
	position: absolute;
	border-radius: 2px;
	border: 1px solid #bbb;
	background-color: #fff;
}
.ckbox input[type="checkbox"]:checked + label:before {
	border-color: #2BBCDE;
	background-color: #2BBCDE;
}
.ckbox input[type="checkbox"]:checked + label:after {
	top: 3px;
	left: 3.5px;
	content: '\e013';
	color: #fff;
	font-size: 11px;
	font-family: 'Glyphicons Halflings';
	position: absolute;
}
.table-filter .star {
	color: #ccc;
	text-align: center;
	display: block;
}
.table-filter .star.star-checked {
	color: #F0AD4E;
}
.table-filter .star:hover {
	color: #ccc;
}
.table-filter .star.star-checked:hover {
	color: #F0AD4E;
}
.table-filter .media-photo {
	width: 35px;
}

.table-filter .media-meta {
	font-size: 11px;
	color: #999;
}
.table-filter .media .title {
	color: #2BBCDE;
	font-size: 14px;
	font-weight: bold;
	line-height: normal;
	margin: 0;
}
.table-filter .media .title span {
	font-size: .8em;
	margin-right: 20px;
}
.table-filter .media .title span.developer {
	color: #5cb85c;
}
.table-filter .media .title span.designer {
	color: #f0ad4e;
}
.table-filter .media .title span.hr {
	color: #d9534f;
}
.table-filter .media .summary {
	font-size: 14px;
}
</style>

</head>




	<div class="row">

		<section class="content">
			<h1>Assign Project to Employees</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">							                              						
							    <button type="button" class="btn btn-default btn-filter" data-target="all">Total</button>
								<button type="button" class="btn btn-success btn-filter" data-target="Developer">Developer</button>
								<button type="button" class="btn btn-warning btn-filter" data-target="Designer">Designer</button>
								<button type="button" class="btn btn-danger btn-filter" data-target="HR">HR</button>
								
							</div>
						</div>
						<div class="table-container" >
						   <form action="assigntask" method="POST">
						   <?php echo "<input type='hidden' name='party' value='".$_POST['party']."'>";?>
						    <input type="text" name="pid" hidden value="<?php echo $pid; ?>">	 
							<table class="table table-filter">
								<tbody>
								<?php
                                $query="select empid,full_name,department,sub_department from New_Employee where 1";
			                      if($query_run=mysqli_query($c,$query)){
			                        while($result=mysqli_fetch_assoc($query_run)){
			                           
			                            $empid=$result['empid'];
			                            $name=$result['full_name'];
			                            $cb="<input type='checkbox' value='$empid'>";
			                            $department=$result['department'];
			                            $sub_department=$result['sub_department'];			                           
			                        
			                      
								echo 	'<tr data-status='.$department.'>
										<td>
											<div class="ckbox">
												<input type="checkbox" id="'.$empid.'" name="'.$empid.'">
												<label for="'.$empid.'"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="images/user.png" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">'.$empid.'</span>
													<h4 class="title">'.$name.'
														
														<span class="pull-right '.$department.'">('.$department.')</span>
													</h4>
													<p class="summary">'.$department.', '.$sub_department.'</p>
												</div>
											</div>
										</td>
									</tr>';
									}}
									else echo mysqli_error($c);
									?>
								</tbody>
							</table>
							<input type="submit" value="Assign Task" class="btn btn-primary">
                          </form>
						</div>
					</div>
				</div>
				
			</div>
		</section>
		
	</div>


<script type="text/javascript">
$(document).ready(function () {

	$('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
</script>