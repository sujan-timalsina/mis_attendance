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
        th{
            text-align:left; 
        }
        td{
            text-align:left;  
        }
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <table style="margin-left: 30%;">
        <tr>
            <th>Employee Name:</th>
            <td>
                <select name="" id="">
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
                <select name="leave_id" id="leave_id">
                    <option value="Sick">Sick</option>
                    <option value="Home">Home</option>
                    <option value="Substitute">Substitute</option>
                    <option value="Other">Other</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Purpose of Leave</th>
            <td><textarea name="" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <th>Leave From</th>
            <td><input type="date"></td>
        </tr>
        <tr>
            <th>Leave To</th>
            <td><input type="date"></td>
        </tr>
        <tr>
            <th>No of days</th>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td colspan="2">
            <input class="btn btn-success" type="submit" name="" id="" value="Submit">
            <input class="btn btn-primary" type="reset" name="" id="" value="Clear">
            </td>

        </tr>
        </table>

    </div>
    <div class="page-container container bg-light">
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
                <td> <a href="">Delete</a> <a href="">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>