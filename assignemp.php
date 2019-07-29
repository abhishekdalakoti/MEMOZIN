<?php
include 'modal_selectemp.php';
if( isset($_POST['pname']) && isset($_POST['startproject']) && isset($_POST['endproject']) && !empty($_POST['pname']) && !empty($_POST['startproject']) && !empty($_POST['endproject']) && !isset($_POST['emplist']) ){

?>
  
 <script type = "text/javascript">
    $(document).ready(function(){

      $('#select_emp').modal('show');

    });


</script>

<?php
}
?>





<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Assign Emp</h3>
            <div class="panel-body">

            </div>
           </div>
</div>
