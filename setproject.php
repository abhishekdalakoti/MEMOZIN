<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >

 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Set Goals for Employees</h3>
            <div class="panel-body">
                 <form class="well form-horizontal" action="setgoals.php" method="post"  id="contact_form" style="background-color:#FFFFFF;">
                    <fieldset style="background-color:#FFFFFF;">
                                <div class="form-group">
				                  <label class="col-md-4 control-label" >New Project Name</label> 
				                  <div class="col-md-4 inputGroupContainer">
				                     <div class="input-group">
				                        <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
				                        <input name="pname" placeholder="Name of Project" class="form-control" type="text" >
				                     </div>
				                  </div>
				               </div>

				                   <div class="form-group">
					                  <label class="col-md-4 control-label">Start Date</label>  
					                  <div class="col-md-4 inputGroupContainer">
					                     <div class="input-group">
					                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
					                        </span>
					                        <input  name="startproject" placeholder="DD/MM/YYYY" class="form-control"  type="text" id="startproject"/>
					                     </div>
					                  </div>
					               </div>

					                <div class="form-group">
					                  <label class="col-md-4 control-label">Deadline</label>  
					                  <div class="col-md-4 inputGroupContainer">
					                     <div class="input-group">
					                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
					                        </span>
					                        <input  name="endproject" placeholder="DD/MM/YYYY" class="form-control"  type="text" id="endproject"/>
					                     </div>
					                  </div>
					               </div>

					                 <div class="form-group">
					                  <label class="col-md-4 control-label">Interested Party</label>  
					                  <div class="col-md-4 inputGroupContainer">
					                     <div class="input-group">
					                        <span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
					                        <input name="party" placeholder="Start Typing..." class="form-control"  type="text" id="party"/>
					                     </div>
					                  </div>
					               </div>
                                
                                 <hr>
                               
                                 <div class="form-group">
				                  <label class="col-md-4 control-label" >Existing Project Name</label> 
				                  <div class="col-md-4 inputGroupContainer">
				                     <div class="input-group">
				                        <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
				                        <input name="epname" placeholder="Name of Project" class="form-control" type="text" id="t" >
				                     </div>
				                  </div>
								  
  <script>
                    $( function() {
                      var availableTags = [
                        <?php project_list($c);?>
                      ];
                      $( "#t" )
					  .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
					  .autocomplete({
                        source: availableTags
                      });
                    } );
                    </script>
				               </div>
		<div class="form-group">
            <label class="col-md-4 control-label">Select Employees</label> 
            <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                  <input name="ename" placeholder="Start Typing..." value="" class="form-control" type="text" id="tags">
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
 
    $( "#tags" )
      
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
</div>

					             <center>  <input type="submit" class="btn btn-primary" value="Assign Employees"> </center>
					             
                    </fieldset>
                 </form>   
            </div>
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
 
    $( "#party" )
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
<script type="text/javascript">
	
  $( function() {
        $( "#startproject" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat:'yy-mm-dd'
        });
         $( "#endproject" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat:'yy-mm-dd'
        });


      } );


</script>