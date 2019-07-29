<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
  .form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;   
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;   
}
  .form-horizontal .control-label{
/* text-align:right; */
text-align:left;
margin-left:30px;
}
  div.modal div.modal-backdrop {
    z-index: 0;
}
body.modal-open div.modal-backdrop { 
    z-index: 0; 
}
   @media screen and (min-width: 768px) {
        .modal-dialog {
          width: 800px; /* New width for default modal */
        }
        .modal-sm {
          width: 800px; /* New width for small modal */
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 950px; /* New width for large modal */
        }
    }
  
  </style>
</head>
<body>
<?php

function modal($pid,$taskid,$assigned_by,$date,$time,$alloted_hours,$tdetail,$comp,$priority,$type,$tname,$actual_hours,$status,$c){

?>
<!-- Modal -->
<div id='myModal<?php echo $pid.$taskid; ?>' class="modal fade" role="dialog">
<div class="modal-dialog">
   <input type="hidden" value="<?php echo $date; ?>" id="date<?php echo $pid.$taskid; ?>" >
   <input type="hidden" value="<?php echo $time; ?>" id="time<?php echo $pid.$taskid; ?>" >
   <input type="hidden" value="<?php echo get_name($_SESSION['uid'],$c); ?>" id="name<?php echo $pid.$taskid; ?>" >
   <!-- Modal content-->
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title" style='text-align:center;'>Assigned by <?php echo $assigned_by;?></h4>
      </div>
      <div class="modal-body" style='height:75%;overflow-y: scroll;'>
         <div class="form-group">
            <label class="col-md-2 control-label">Task ID</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo ucfirst($taskid);?>" class="form-control" type="text" readonly>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Project ID</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo ucfirst($pid);?>" class="form-control" type="text" readonly>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Task Title</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-tasks" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo ucfirst($tname);?>" id="z<?php echo $pid.$taskid; ?>" class="form-control" type="text" readonly>
               </div>
            </div>
            <label class="col-md-2 control-label">Priority</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo ucfirst($priority);?>" class="form-control" type="text" readonly>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Type</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-tasks" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo ucfirst($type);?>" class="form-control" type="text" readonly>
               </div>
            </div>
            <label class="col-md-2 control-label">Complexity</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-tasks" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo ucfirst($comp);?>" class="form-control" type="text" readonly>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Current Status</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-spinner" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo ucfirst($status);?>" class="form-control" type="text" readonly>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Created On</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo $date;?>" class="form-control" type="text" readonly>
               </div>
            </div>
            <label class="col-md-2 control-label">Deadline</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo get_deadline($pid,$c);?>" class="form-control" type="text" readonly>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Estimated Hours</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo $alloted_hours;?>" class="form-control" type="text" readonly>
               </div>
            </div>
            <label class="col-md-2 control-label">Actual Hours</label>  
            <div class="col-md-3 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                  <input name="tname" value="<?php echo $actual_hours;?>" class="form-control" type="text" readonly>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Comment</label> 
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-tasks" aria-hidden="true"></i></span>
                  <textarea class="form-control" rows=2 id="comment<?php echo $pid.$taskid; ?>"> </textarea>
               </div>
            </div>
         </div>
		 <div class="form-group">
            <label class="col-md-2 control-label">Select Employees</label> 
            <div class="col-md-6 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                  <input name="ename" value="" class="form-control" type="text" id="tags<?php echo $pid.$taskid; ?>">
               </div>
			   
            </div>
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
 
    $( "#tags<?php echo $pid.$taskid; ?>" )
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
  <div class="[ form-group ]">
            <input type="checkbox" name="mailme" id="fancy-checkbox-default<?php echo $pid.$taskid; ?>" autocomplete="off" value="yes"/>
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-default<?php echo $pid.$taskid; ?>" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span class="[ btn btn-default ]"></span>
                </label>
                <label for="fancy-checkbox-default<?php echo $pid.$taskid; ?>" class="[ btn btn-default active ]">
                    Notify
                </label>
            </div>
        </div>
			
         </div>
         <div class="form-group" id="bsave<?php echo $pid.$taskid; ?>">
            <div style="margin-left:175px;">
               <button type="button"  class="btn btn-md btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i>
               Save </button>
            </div>
         </div>

         <?php display_remark($pid,$taskid,$c); ?>
         <div class="alert alert-info">
            <p class="text-danger" style="font-size:11px;">
               Created at <?php echo $date." ".$time; ?> 
               by  <?php echo $assigned_by; ?>                             
            </p>
            <br>&nbsp; &nbsp;  
            <i class="fa fa-comment" aria-hidden="true"></i> <?php echo $tdetail; ?>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"></button>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
    var color = 0;
    var code = "success";


    $("#bsave<?php echo $pid.$taskid; ?>").click(function() {
        var pid = "<?php echo $pid; ?>";
        var taskid = "<?php echo $taskid; ?>";
        var da = new Date();
		var d= da.getFullYear()+'-'+(da.getMonth()+1)+'-'+da.getDate();
        var t = da.getHours()+':'+da.getMinutes()+':'+da.getSeconds();
        var ts = d + " " + t;
        var empid = $("#emp").val();
        var full_name = $("#name<?php echo $pid.$taskid; ?>").val();
        var by = full_name + "/" + empid;
		var ena=$("#tags<?php echo $pid.$taskid; ?>").val();
		
        var data = $("#comment<?php echo $pid.$taskid; ?>").val();
		var tit=$("#z<?php echo $pid.$taskid; ?>").val();
		if (jQuery("#fancy-checkbox-default<?php echo $pid.$taskid; ?>").prop("checked"))
        var che="yes";
    else
         var che="no";
if(($("#comment<?php echo $pid.$taskid; ?>").val())!='')
		{
        var string = '<div class="alert alert-' + code + '"><p class="text-primary" style="font-size:11px;"> Updated at ' + ts + ' by ' + by + '</p><br>&nbsp; &nbsp; <i class="fa fa-comment" aria-hidden="true"></i> ' + data + '</div>';
        $("#display<?php echo $pid.$taskid; ?>").prepend(string);

        color = color + 1;
        if (color == 0)
            code = "info";
        else if (color == 1)
            code = "danger";

        else if (color == 2)
            code = "warning";
        else {
            code = "success";
            color = 0;
        }
        $("#comment<?php echo $pid.$taskid; ?>").val("");
$("#fancy-checkbox-default<?php echo $pid.$taskid; ?>").removeAttr('checked');
		
        $.post('remarktosql.php', {
            proid: pid,
            tid: taskid,
            remark: data,
            date: d,
            time: t,
            by: full_name,
			name:ena,
			ch:che,
			titname:tit,
			eid:empid
        }, function(data) {
            
        });

		}});
</script>
<?php

}
?>







</body>