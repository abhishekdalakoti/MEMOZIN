<?php 

include 'init_core.php';

if(loggedin()){
include 'head_info.php';
include 'sidebar.php';
include 'sqlconnect.php';
include 'functions.php';
?>



<div class="container" style="background-color: #A1CAF1;padding:20px;margin-left:5%;">  
   <form class="well form-horizontal" action="walkout.php" method="post" style="background-color:#FFFFFF;">
      <fieldset style="background-color:#FFFFFF;">
         <!-- Form Name -->
       <center>  <legend> &nbsp; &nbsp;  <img class="img-responsive" src="images/walkout.jpg" width=25% height=25%/></legend> </center>
         <div class="form-group">
                  <label class="col-md-4 control-label" >Walk-OUT Time</label> 
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
                     <button type="submit" class="btn btn-primary" name="attclick">I am Leaving <span class="glyphicon glyphicon-send"></span></button>
                  </div>
          </div>  
      
      </fieldset>
   </form>
    
     <?php 
     if(isset($_POST['attclick']) && isset($_POST['attyes'])){
          
            

check('walkout',$c);
             
			

           

             }
           ?>
   
   </div>
</div>
<?php

}



?>