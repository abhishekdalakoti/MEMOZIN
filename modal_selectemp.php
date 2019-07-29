<div id='select_emp' class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body" style="text-align:center;">
            <div class="row">
              <form action="empdetail.php" method="POST">
               <table class="table table-striped">
                  
                  <tr>
                     <td colspan=3>
                        <center><img class="img-responsive" src='images/emp.jpg' height=30% width=50%></center>
                     </td>
                  </tr>
                  <?php
                      $query="select empid,name,department,sub_department from New_Employee where 1";
                      if($query_run=mysqli_query($c,$query)){
                        while($result=mysqli_fetch_assoc($query_run)){
                           
                            $empid=$result['empid'];
                            $name=$result['name'];
                            $cb="<input type='checkbox' value='$empid'>"
                            $department=$result['department'];
                            $sub_department=$result['sub_department'];

                            echo "<tr> <td>"

                        }
                      }
                   
                   ?>
                  <tr>
                     <!-- <td><a href="#" class="btn btn-primary"> <i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</a></td> -->
                     <td>
                        <center>
                        <div class="input-group">

                        <input type="submit" class="btn btn-primary" value="Get Details">  
                         
                         </div>
                        </center>
                     </td>
                  </tr>
               </table>
              </form>
            </div>
         </div>
      </div>
   </div>
</div>