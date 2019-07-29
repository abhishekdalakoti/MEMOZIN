<?php

function modaluser(){


?>
 
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <style>
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #dae5f4; // Choose your own color here
 }
 .table-striped>tbody>tr:nth-child(even)>td, 
.table-striped>tbody>tr:nth-child(even)>th {
   background-color: #b8d1f3; // Choose your own color here
 }
 
    @media screen and (min-width: 768px) {
        .modal-dialog {
          width: 450px; /* New width for default modal */
        }
        .modal-sm {
          width: 350px; /* New width for small modal */
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 950px; /* New width for large modal */
        }
    }
 
  </style>

<div id='userModal' class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-body" style="text-align:center;">
            <div class="row">
              <form action="index.php" method="post">
               <table class="table table-striped">
                  <tr>
                     <td colspan=3>
                        <center>
                           <center><img class="img-responsive" src='images/memozin.jpg' height=30% width=50%></center>
                        </center>
                     </td>
                  </tr>
                 
                  <tr>
                     <td colspan=3>
                        <center>
                           <div class="input-group margin-bottom-sm">
                              <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                              <input class="form-control" type="text" placeholder="User ID" name="uid">
                           </div>
                        </center>
                     </td>
                  </tr>
                  <tr>
                     <td colspan=3>
                        <center>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                              <input class="form-control" type="password" placeholder="Password" name="pass">
                           </div>
                        </center>
                     </td>
                  </tr>
                  <tr>
                     <!-- <td><a href="#" class="btn btn-primary"> <i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</a></td> -->
                     <td>
                        <center><button type="submit" class="btn btn-primary"> <i class="fa fa-sign-in" aria-hidden="true"></i> Signin</button>    </center>
                     </td>
                  </tr>
               </table>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php

}



?>
