<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Leave</title>
    <style>
    th {
        text-align: left;
    }

    td {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <form action="<?php echo base_url(); ?>EmployeeLeave/addRecord" method="post">
            <table style="margin-left: 30%;">
                <tr>
                    <th>Employee Name:</th>
                    <td>
                        <select name="employee_id" id="employee_id">
                            <?php
                    
                    foreach ($emp_names as $row) {
                ?>
                            <option value="<?php echo $row->employee_id; ?>"><?php echo $row->full_name; ?></option>
                            <?php
                }
                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Leave Type</th>
                    <td>
                        <select name="leave_type_id" id="leave_type_id">
                            <option value="sick">Sick</option>
                            <option value="home">Home</option>
                            <option value="substitute">Substitute</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Purpose of Leave</th>
                    <td><textarea name="purpose_id" id="purpose_id" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <th>Leave From</th>
                    <td><input type="date" id="leave_from_id" name="leave_from_id"></td>
                </tr>
                <tr>
                    <th>Leave To</th>
                    <td><input type="date" name="leave_to_id" id="leave_to_id"></td>
                </tr>
                <tr>
                    <th>No of days</th>
                    <td><input type="text" name="leave_days_id" id="leave_days_id"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="btn btn-success" type="submit" name="" id="" value="Submit">
                        <input class="btn btn-primary" type="reset" name="" id="" value="Clear">
                    </td>

                </tr>
            </table>
        </form>
<br>
        <div class="">
            <form action="<?php echo base_url() ?>EmployeeLeave/Search" method="post">
            <div class="form-group" style="margin-left: 30%;margin-right: 30%;">
                <input type="date" class="form-control" id="search" name="start" placeholder="Start Date">
                <br>
                <input type="date" class="form-control" id="search" name="end" placeholder="End Date">
                <br>
            <button type="submit" name="searchBtn" class="btn btn-primary submit">Search</button>
            <button class="btn btn-secondary " type="reset">Refresh</button>
            </form>
            </div>
        </div>
        <br>
        <div class="">
            <table class="table table-striped table-hover">
                <tr>
                    <th>SN</th>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>Purpose of Leave</th>
                    <th>Leave From</th>
                    <th>Leave To</th>
                    <th>Number of Days</th>
                    <th>Action</th>
                </tr>
                <?php 
             $sn=0;
            foreach($emp_cat as $row){
            $sn=$sn+1;
            ?>
                <tr>
                    <td><?php echo $sn?></td>
                    <td><?php echo $row->full_name?></td>
                    <td><?php echo $row->leave_type?></td>
                    <td><?php echo $row->purpose?></td>
                    <td><?php echo $row->leave_from?></td>
                    <td><?php echo $row->leave_to?></td>
                    <td><?php echo $row->leave_days?></td>
                    <td> <a
                            href="<?php echo base_url(); ?>EmployeeLeave/deleteRecord/<?php echo $row->employee_leave_id?>">Delete</a>
                        <a
                            href="<?php echo base_url(); ?>edit_employee_leave/<?php echo $row->employee_leave_id?>">Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>