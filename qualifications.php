

    <style>
        table, th, td {
            border: 20px solid white;
            /*border-collapse: collapse;*/
            margin-top:7%;
            margin-left: 1%;
            padding: 1px;
        }
        th, td {
            padding:1%;
        }
        tr:hover {background-color: #f5f5f5}
        /*th {*/
        /*text-align: left;*/
        /*}*/
    </style>

    <div class="container" style="background-color: #A1CAF1;padding:20px;margin-left:5.9%;">

        <form class="well form-horizontal" action="qualification_database.php" method="post" style="background-color:#FFFFFF;">
            <fieldset style="background-color:#FFFFFF;">

                <!-- Form Name -->
                <legend> Qualifications</legend>

                <div class="form-group">
                    <label class="col-md-4 control-label" >Employee ID</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                            <input placeholder="" class="form-control" type="text" name="uid">
                        </div>
                    </div>
                </div>

                <table style="width: 100%">
                    <tr>
                        <th></th>
                        <th>School/College</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year</th>
                        <th>Percentage</th>
                    </tr>
                    <tr>
                        <th>10th</th>
                        <td>

                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="" name="sc10">
                            </div>
                        </td>
                        <td>

                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="" name="yr10">
                            </div>
                        </td>

                        <td>
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="" name="per10">
                            </div>
                        </td>


                    </tr>
                    <tr>
                        <th>12th</th>
                        <td>
                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="" name="sc12">
                            </div>
                        </td>
                        <td>
                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="" name="yr12">
                            </div>
                        </td>
                        <td>

                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="" name="per12">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Graduation</th>
                        <td>
                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="" name="scgrad">
                            </div>
                        </td>
                        <td>
                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="" name="yrgrad">
                            </div>
                        </td>
                        <td>

                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="" name="pergrad">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Post-Graduation</th>
                        <td>
                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="" name="scpost">
                            </div>
                        </td>
                        <td>
                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="" name="yrpost">
                            </div>
                        </td>
                        <td>

                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="" name="perpost">
                            </div>
                        </td>
                    </tr>

                 <!--   <tr>
                        <th>Others</th>
                        <td>
                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </td>
                        <td>
                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </td>
                        <td>

                            <div class="col-s-3">
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </td>
                    </tr> -->
                </table>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-primary"  value="submit">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
  