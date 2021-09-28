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

    <div class="page-container container bg-light" >
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
            foreach($records as $row){
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
                <td> <a href="<?php echo base_url(); ?>EmployeeLeave/deleteRecord/<?php echo $row->employee_leave_id?>">Delete</a> <a href="<?php echo base_url(); ?>edit_employee_leave/<?php echo $row->employee_leave_id?>">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    </body>

</html>