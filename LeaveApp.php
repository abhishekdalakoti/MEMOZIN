<?php
/**
 * Created by PhpStorm.
 * User: silentrangerr
 * Date: 25/08/17
 * Time: 4:17 PM
 */
include "init_core.php";
include 'head_info.php';
include "sqlconnect.php";
include_once "functions.php";

?>
<body>
<link rel="stylesheet" href="w3.css">
<?php include 'sidebar.php'; ?>
<div class="container" style="background-color: #A1CAF1;padding:20px;margin-left:5.9%;">

    <!--form-->
    <form action="leavedatabse.php" method= "post" class="w3-container w3-card-4 w3-light-grey  w3-margin">
        <h2 class="w3-center w3-text-gray">Leave Application</h2>


        <table class="table table-striped">


            <tr>
                <td>
                </td>
                <td>
                    <center>
                        <div class="input-group" style="margin-left: 150px">
                            <span class="input-group-addon" ><i class=" w3-large fa fa-calendar w3-text-blue"   aria-hidden="true"></i></span>
                            <input type="text" class="form-control" id="from" placeholder="From" style="width:40%" name="from">

                        </div>
                    </center>
                </td>

                <td>
                    <center>
                        <div class="input-group">
                            <span class="input-group-addon"><i class=" w3-large fa fa-calendar w3-text-blue" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" id="to" placeholder="To" style="width:50%" name="to">

                        </div>
                    </center>
                </td>

            </tr>

        </table>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-envelope w3-text-blue"></i></div>
            <div class="w3-rest">
                <select class="w3-input w3-border" name="last" type="text" >
                    <option selected>Type of Application</option>
                    <option value="SICK LEAVE">Sick Leave</option>
                    <option value="ANNUAL LEAVE">Annual Leave</option>
                    <option value="MATERNITY LEAVE">Maternity Leave</option>
                    <option value="FAMILY RESPONSIBILITY">Family Responsibility Leave</option>
                    <option value="STUDY LEAVE">Study Leave </option>
                    <option value="RELIGIOUS HOLIDAYS">Leave for religious holidays</option>
                    <option value="OTHERS">Others</option>
                </select>

            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-reply w3-text-blue"></i></div>
            <div class="w3-rest">
                <textarea  id="exampleTextarea" rows="5" cols="142" name="reason" placeholder="Reason :"></textarea>
            </div>
        </div>



        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-user w3-text-blue"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border" name="phone" id="tags" type="text" placeholder="Send Application To :">
            </div>
        </div>


        <p class="w3-center">
            <button class="w3-button w3-section w3-blue w3-ripple"> Submit </button>
        </p>
    </form>




</div>

<script type="text/javascript">

    $(function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            defaultDate: "-20y",
            dateFormat:'dd/mm/yy'
        });
    });

    $(function() {
		var d=new Date();
		d.setDate(d.getDate() + 1);
        $( "#from" ).datepicker({
			  minDate: d, 
            changeMonth: true,
            changeYear: true,
            dateFormat:'yy-mm-dd'
        });
    });

    $(function() {
		var d=new Date();
		d.setDate(d.getDate() + 1);
        $( "#to" ).datepicker({
			minDate: d,
            changeMonth: true,
            changeYear: true,

            dateFormat:'yy-mm-dd'
        });
    });


</script>

<script>
                    $( function() {
                      var availableTags = [
                        <?php employee_list($c);?>
                      ];
                      $( "#tags" ).autocomplete({
                        source: availableTags
                      });
                    } );
                    </script>
