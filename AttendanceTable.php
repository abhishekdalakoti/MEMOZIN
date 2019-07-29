<?php
/**
 * Created by PhpStorm.
 * User: silentrangerr
 * Date: 27/08/17
 * Time: 10:53 AM
 */

include 'sqlconnect.php';
include 'head_info.php';
include 'sidebar.php';
include 'database.php';
?>

<div class="container" style="background-color: #A1CAF1;padding:10px 10px 10px 10px;margin-left:7%;">
<div class="container">

    <table class="table" style="margin-top: 7%">
        <thead>
        <tr>
            <th><i class="w3-large fa fa-calendar w3-text-blue">&nbsp;</i>DATE</th>
            <th><i class="w3-large fa fa-clock-o w3-text-blue">&nbsp;</i>Walk-In Time</th>
            <th><i class="w3-large fa fa-clock-o w3-text-blue">&nbsp;</i>Walk-Out Time</th>
        </tr>
        </thead>
        <tbody>
        <tr class="info">
            <td><?php echo $attendence[0]." ";?></td>
            <td><?php echo $attendence[1]." ";?></td>
            <td><?php echo $attendence[1]." ";?></td>
        </tr>

        </tbody>
    </table>
</div>
</div>
