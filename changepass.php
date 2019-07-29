<?php
include 'sqlconnect.php';
include 'init_core.php';
include 'head_info.php';
include 'sidebar.php';
include 'functions.php';
echo $_SESSION['uid'];
?>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Change Password</h3>
            <div class="panel-body">
                 <form class="well form-horizontal" action="chng.php" method="post"  id="contact_form" style="background-color:#FFFFFF;">
                    <fieldset style="background-color:#FFFFFF;">
                                <div class="form-group">
				                  <label class="col-md-4 control-label" >Old Password</label>
				                  <div class="col-md-6 inputGroupContainer">
				                     <div class="input-group">
				                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
				                        <input name="oldpass"  class="form-control" type="password" >
				                     </div>
				                  </div>
				               </div>

				                   <div class="form-group">
					                  <label class="col-md-4 control-label">New Password</label>
					                  <div class="col-md-6 inputGroupContainer">
					                     <div class="input-group">
					                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i>
					                        </span>
					                        <input  name="newpass1"  class="form-control"  type="password" id="newpass1"/>
					                     </div>
					                  </div>
					               </div>

					                  <div class="form-group">
					                  <label class="col-md-4 control-label">Confirm Password</label>
					                  <div class="col-md-6 inputGroupContainer">
					                     <div class="input-group">
					                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i>
					                        </span>
					                        <input  name="newpass2" class="form-control"  type="password" id="newpass2"/>
					                     </div>
					                  </div>
					               </div>
								   <?php
								   echo"<input type='text' name='uid' value='$_SESSION[uid]' hidden>";
								   ?>

                        <center>  <button type="submit" class="btn btn-primary">
                            <i class="fa fa-lock" aria-hidden="true"></i> Change </button> </center>

                    </fieldset>
                 </form>
            </div>
</div>
</div>
   </div>
