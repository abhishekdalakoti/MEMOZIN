<?php
if(isset($_SESSION['uid'])){
   //include 'sql_connect.php';
   $query="select id from curr_id where 1";
   if($query_run=mysqli_query($c,$query)){
      while($result=mysqli_fetch_assoc($query_run)){
         $id=$result['id'];
         
      }
    


   }else echo mysqli_error($c);
?>

 <div class="container" style="background-color: #A1CAF1;padding:20px;margin-top:0px;">
         <form class="well form-horizontal" action="insert_newemployee.php" method="post"  id="contact_form" style="background-color:#FFFFFF;">
            <fieldset style="background-color:#FFFFFF;">
               <!-- Form Name -->
               <legend> &nbsp; &nbsp;Register New Employee!</legend>
                    <!-- Text input-->
               <div class="form-group">
                  <label class="col-md-4 control-label" >Employee ID</label> 
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                        <input name="empid" placeholder="Employee ID" class="form-control" type="text" value="<?php echo "EMP".(string)($id+1); ?>">
                     </div>
                  </div>
               </div>


               <!-- Text input-->
               <div class="form-group">
                  <label class="col-md-4 control-label">Full Name</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="full_name" placeholder="Full Name" class="form-control"  type="text" id="t1">
                     </div>
                  </div>
               </div>
          
               <!-- Text input-->
               <div class="form-group">
                  <label class="col-md-4 control-label">E-Mail</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" id="t2">
                     </div>
                  </div>
               </div>
               <!-- Text input-->
               <div class="form-group">
                  <label class="col-md-4 control-label">Phone #</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" id="t3">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Emergency Phone </label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        </span>
                        <input name="ephone" placeholder="(845)555-1212" class="form-control" type="text" id="t4">
                     </div>
                  </div>
               </div>
               <!-- Father's input-->
               <div class="form-group">
                  <label class="col-md-4 control-label">Father's Name</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-male" aria-hidden="true"></i>
                        </span>
                        <input  name="father_name" placeholder="Father's Name" class="form-control"  type="text" id="t5">
                     </div>
                  </div>
               </div>
               <!--- 
                  -->
               <!--DOB -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Date of Birth</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        <input  name="dob" placeholder="DD/MM/YYYY" class="form-control"  type="text" id="dobpicker"/>
                     </div>
                  </div>
               </div>
               <!-- SEX -->
               <!-- radio checks -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Sex</label>
                  <div class="col-md-4">
                     <div class="radio">
                        <label>
                        <input type="radio" name="sex" value="male" /> Male
                        </label>
                     </div>
                     <div class="radio">
                        <label>
                        <input type="radio" name="sex" value="female" /> Female
                        </label>
                     </div>
                  </div>
               </div>
               <!-- Marital Status -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Marital Status</label>
                  <div class="col-md-4">
                     <div class="radio">
                        <label>
                        <input type="radio" name="marital" value="married" id="married"/> Married
                        </label>
                     </div>
                     <div class="radio">
                        <label>
                        <input type="radio" name="marital" value="unmarried" id="unmarried"/> Unmarried
                        </label>
                     </div>
                  </div>
               </div>
               <!-- Spouse Name -->
               <div class="form-group" id="spouse_name">
                  <label class="col-md-4 control-label">Spouse Name</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <input  name="spouse_name" placeholder="Spouse Name" class="form-control"  type="text">
                     </div>
                  </div>
               </div>
               <!-- Blood Group -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Blood Group </label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-medkit" aria-hidden="true"></i>
                        </span>
                        <input  name="blood_group" placeholder="Blood Group" class="form-control"  type="text">
                     </div>
                  </div>
               </div>
               <!-- Department -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Department </label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i>
                        </span>
                        <select name="department" class="form-control selectpicker" id="department" onchange="test()">
                           <option value="">Please select department </option>
                           <?php if(count($department)>0) for($i=0;$i<7;$i++) echo "<option value='".$department[$i]."'>".$department[$i]."</option>";   ?>
                        </select>
                     </div>
                  </div>
               </div>
               <!--Sub Department -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Sub-Department </label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i>
                        </span>
                        <select name="sub_department" class="form-control selectpicker" id="subdepartment">
                           <option value="">Please select sub-department </option>
                          
                        </select>
                     </div>
                  </div>
               </div>
               <!--joining -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Date of Joining</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        <input  name="joining" placeholder="DD/MM/YYYY" class="form-control"  type="text" id="joinpicker">
                     </div>
                  </div>
               </div>
               <!-- PAN Number-->
               <div class="form-group">
                  <label class="col-md-4 control-label">PAN Number *</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i>
                        </span>
                        <input  name="pan" placeholder="ABCDE1234F" class="form-control"  type="text" id="t6">
                     </div>
                  </div>
               </div>
               <!-- Aadhar -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Aadhar Number</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i>
                        </span>
                        <input  name="aadhar" placeholder="1234-1234-1234" class="form-control"  type="text">
                     </div>
                  </div>
               </div>
               <!-- Voter ID -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Voter ID</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i>
                        </span>
                        <input  name="voter" placeholder="Voter-Card" class="form-control"  type="text">
                     </div>
                  </div>
               </div>
               <!-- Salary -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Salary</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i>
                        </span>
                        <input  name="salary" placeholder="Rs ..." class="form-control"  type="text">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label"> Current Address</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="cur_address" placeholder="Current Address" class="form-control" type="text" id="t12">
                     </div>
                  </div>
               </div>
               <!-- Text input-->
               <div class="form-group">
                  <label class="col-md-4 control-label">City</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="cur_city" placeholder="city" class="form-control"  type="text" id="t11">
                     </div>
                  </div>
               </div>
               <!-- Select Basic -->
               <div class="form-group">
                  <label class="col-md-4 control-label">State</label>
                  <div class="col-md-4 selectContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        <select name="cur_state" class="form-control selectpicker">
                           <option value=" " >Please select your state</option>
                           <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                           <option value="Andhra Pradesh">Andhra Pradesh</option>
                           <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                           <option value="Assam">Assam</option>
                           <option value="Bihar">Bihar</option>
                           <option value="Chandigarh">Chandigarh</option>
                           <option value="Chhattisgarh">Chhattisgarh</option>
                           <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                           <option value="Daman and Diu">Daman and Diu</option>
                           <option value="Delhi">Delhi</option>
                           <option value="Goa">Goa</option>
                           <option value="Gujarat">Gujarat</option>
                           <option value="Haryana">Haryana</option>
                           <option value="Himachal Pradesh">Himachal Pradesh</option>
                           <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                           <option value="Jharkhand">Jharkhand</option>
                           <option value="Karnataka">Karnataka</option>
                           <option value="Kerala">Kerala</option>
                           <option value="Lakshadweep">Lakshadweep</option>
                           <option value="Madhya Pradesh">Madhya Pradesh</option>
                           <option value="Maharashtra">Maharashtra</option>
                           <option value="Manipur">Manipur</option>
                           <option value="Meghalaya">Meghalaya</option>
                           <option value="Mizoram">Mizoram</option>
                           <option value="Nagaland">Nagaland</option>
                           <option value="Orissa">Orissa</option>
                           <option value="Pondicherry">Pondicherry</option>
                           <option value="Punjab">Punjab</option>
                           <option value="Rajasthan">Rajasthan</option>
                           <option value="Sikkim">Sikkim</option>
                           <option value="Tamil Nadu">Tamil Nadu</option>
                           <option value="Tripura">Tripura</option>
                           <option value="Uttaranchal">Uttaranchal</option>
                           <option value="Uttar Pradesh">Uttar Pradesh</option>
                           <option value="West Bengal">West Bengal</option>
                        </select>
                     </div>
                  </div>
               </div>
               <!-- Text input-->
               <div class="form-group">
                  <label class="col-md-4 control-label">Pin Code</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="cur_pin" placeholder="Pin Code" class="form-control"  type="text" id="t10"> 
                     </div>
                  </div>
               </div>
               <!-- Permanent Address -->
               <div class="form-group">
                  <label class="col-md-4 control-label"> Permanent Address</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="per_address" placeholder="Current Address" class="form-control" type="text" id="t7">
                     </div>
                  </div>
               </div>
               <!-- Text input-->
               <div class="form-group">
                  <label class="col-md-4 control-label">City</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="per_city" placeholder="city" class="form-control"  type="text" id="t9">
                     </div>
                  </div>
               </div>
               <!-- Select Basic -->
               <div class="form-group">
                  <label class="col-md-4 control-label">State</label>
                  <div class="col-md-4 selectContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        <select name="per_state" class="form-control selectpicker">
                           <option value=" " >Please select your state</option>
                           <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                           <option value="Andhra Pradesh">Andhra Pradesh</option>
                           <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                           <option value="Assam">Assam</option>
                           <option value="Bihar">Bihar</option>
                           <option value="Chandigarh">Chandigarh</option>
                           <option value="Chhattisgarh">Chhattisgarh</option>
                           <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                           <option value="Daman and Diu">Daman and Diu</option>
                           <option value="Delhi">Delhi</option>
                           <option value="Goa">Goa</option>
                           <option value="Gujarat">Gujarat</option>
                           <option value="Haryana">Haryana</option>
                           <option value="Himachal Pradesh">Himachal Pradesh</option>
                           <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                           <option value="Jharkhand">Jharkhand</option>
                           <option value="Karnataka">Karnataka</option>
                           <option value="Kerala">Kerala</option>
                           <option value="Lakshadweep">Lakshadweep</option>
                           <option value="Madhya Pradesh">Madhya Pradesh</option>
                           <option value="Maharashtra">Maharashtra</option>
                           <option value="Manipur">Manipur</option>
                           <option value="Meghalaya">Meghalaya</option>
                           <option value="Mizoram">Mizoram</option>
                           <option value="Nagaland">Nagaland</option>
                           <option value="Orissa">Orissa</option>
                           <option value="Pondicherry">Pondicherry</option>
                           <option value="Punjab">Punjab</option>
                           <option value="Rajasthan">Rajasthan</option>
                           <option value="Sikkim">Sikkim</option>
                           <option value="Tamil Nadu">Tamil Nadu</option>
                           <option value="Tripura">Tripura</option>
                           <option value="Uttaranchal">Uttaranchal</option>
                           <option value="Uttar Pradesh">Uttar Pradesh</option>
                           <option value="West Bengal">West Bengal</option>
                        </select>
                     </div>
                  </div>
               </div>
               <!-- Text input-->
               <div class="form-group">
                  <label class="col-md-4 control-label">Pin Code</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="per_pin" placeholder="Pin Code" class="form-control"  type="text" id="t8"> 
                     </div>
                  </div>
               </div>
               <!-- Permanent Address Ends -->
               <!-- Salary -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Nationality</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-flag" aria-hidden="true"></i>
                        </span>
                        <input  name="Nationality" placeholder="Indian..." class="form-control"  type="text">
                     </div>
                  </div>
               </div>
               <!-- Reference -->
               <div class="form-group">
                  <label class="col-md-4 control-label">Reference</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i>
                        </span>
                        <input  name="refer" placeholder="Reff..." class="form-control"  type="text">
                     </div>
                  </div>
               </div>
               <!-- Text area -->
               <!-- Success message -->
               <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Employee details added successfully.</div>
               <!-- Button -->
               <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-4">
                     <button type="submit" class="btn btn-primary" id="bn" >Send <span class="glyphicon glyphicon-send"></span></button>
                  </div>
               </div>
            </fieldset>
         </form>
      </div>
<script>
   $(document).ready(function() {
  
$(function() {
    $('#bn').attr('disabled', 'disabled');
});
 
$('input[type=text]').keyup(function() {
        
    if (
	$('#t1').val() !=''&&
    $('#t2').val() != '' &&
    $('#t3').val() != ''&&
    $('#t4').val() != ''&&
    $('#t5').val() != ''&&
    $('#t6').val() != '' &&
    $('#t7').val() != '' &&
    $('#joinpicker').val() != ''&&
    $('#dobpicker').val() != ''&&
    $('#t8').val() != ''&&
    $('#t9').val() != ''&&
    $('#t10').val() != ''&&
    $('#t11').val() != ''&&
    $('#t12').val() != ''
		) {
      
        $('#bn').removeAttr('disabled');
    } else {
        $('#bn').attr('disabled', 'disabled');
    }
});
    });
	
</script>
      <?php
   }
   else {
      header('Location: index.php');
   }
   ?>