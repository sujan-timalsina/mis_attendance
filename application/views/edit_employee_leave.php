<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Leave</title>
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
        <form action="<?php echo base_url(); ?>EditEmployeeLeave/editRecord/<?php echo $one_data->employee_leave_id; ?>" method="post" >
        <table style="margin-left: 30%;">
        <tr>
            <th>Employee Name:</th>
            <td>
                <select name="employee_id" id="employee_id">
                    <option value="<?php echo "$one_data->employee_id" ?>"><?php echo "$one_data->full_name" ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Leave Type</th>
            <td>
                <select name="leave_type_id" id="leave_type_id" >
                    
                    <option value="sick" <?php if( $one_data->leave_type == "sick") echo"selected"; ?>>Sick</option>
                    <option value="home"<?php if( $one_data->leave_type == "home") echo"selected"; ?>>Home</option>
                    <option value="substitute"<?php if( $one_data->leave_type == "substitute") echo"selected"; ?>>Substitute</option>
                    <option value="other" <?php if( $one_data->leave_type== "other") echo"selected"; ?>>Other</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Purpose of Leave</th>
            <td><textarea name="purpose_id" id="purpose_id" cols="30" rows="10"><?php echo "$one_data->purpose" ?></textarea></td>
        </tr>
        <tr>
            <th>Leave From</th>
            <td><input type="date" id="leave_from_id" name="leave_from_id" value="<?php echo "$one_data->leave_from" ?>"></td>
        </tr>
        <tr>
            <th>Leave To</th>
            <td><input type="date" name="leave_to_id" id="leave_to_id" value="<?php echo "$one_data->leave_from" ?>"></td>
        </tr>
        <tr>
            <th>No of days</th>
            <td><input type="text" name="leave_days_id" id="leave_days_id" value="<?php echo "$one_data->leave_days" ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
            <input class="btn btn-success" type="submit" name="" id="" value="Update">
            </td>

        </tr>
        </table>
        </form>
    </div>

    
</body>

</html>