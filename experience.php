 <div class="container" style="background-color: #A1CAF1;padding:20px;margin-left:5.9%;">
         <form class="well form-horizontal" action="insert_experience.php" method="post"  id="experience_form" style="background-color:#FFFFFF;">
            <fieldset style="background-color:#FFFFFF;">
               <!-- Form Name -->
               <legend> &nbsp; &nbsp;Experience</legend>
                   <div class="form-group">
                  <label class="col-md-4 control-label">Employee Code</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i>  </span>
                        <input  name="emp_code" placeholder="Emp Code..." class="form-control"  type="text">
                     </div>
                  </div>
               </div>
               <!-- company-->
               <div class="form-group">
                  <label class="col-md-4 control-label" >Company Name</label> 
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-building" aria-hidden="true"></i></span>
                        <input name="company" placeholder="Memozin/Webque..." class="form-control"  type="text">
                     </div>
                  </div>
               </div>
                  <!--To -->
               <div class="form-group">
                  <label class="col-md-4 control-label" >From</label> 
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <input name="start_date" placeholder="DD/MM/YYYY" class="form-control"  type="text" id="from">
                     </div>
                  </div>
               </div>
                <!--From -->
                   <div class="form-group">
                  <label class="col-md-4 control-label" >To</label> 
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <input name="end_date" placeholder="DD/MM/YYYY" class="form-control"  type="text" id="to">
                     </div>
                  </div>
               </div>

               <!--Salary-->
                    <div class="form-group">
                  <label class="col-md-4 control-label">Salary</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i>
                        </span>
                        <input  name="past_salary" placeholder="Rs ..." class="form-control"  type="text">
                     </div>
                  </div>
               </div>

              <!-- Designation -->
                 <div class="form-group">
                  <label class="col-md-4 control-label" >Designation</label> 
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i>
                        </span>
                        <input name="designation" placeholder="Developer/Designer..." class="form-control"  type="text">
                     </div>
                  </div>
               </div>

               <!--Address-->
                 <div class="form-group">
                  <label class="col-md-4 control-label"> Address</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span>
                        <input name="company_address" placeholder="Current Address" class="form-control" type="text">
                     </div>
                  </div>
               </div>
              
               <!-- Description -->
                 <div class="form-group">
                  <label class="col-md-4 control-label"> Description</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon">   <i class="fa fa-info" aria-hidden="true"></i></span>
                        <input name="company_description" placeholder="Description about Job profile" class="form-control" type="text">
                     </div>
                  </div>
               </div>

                <!-- Success message -->
               <div class="alert alert-success" role="alert" id="exp_success">Success <i class="glyphicon glyphicon-thumbs-up"></i> Experience added successfully.</div>
               <!-- Button -->
               <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-4">
                     <button type="submit" class="btn btn-primary" >Send <span class="glyphicon glyphicon-send"></span></button>
                  </div>
               </div> 

            </fieldset>   
         </form>   
</div>         