<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee Time</title>
    <style>
        table{
            margin-left:10%;
            margin-right:10%;
        }
    th {
        text-align: left;

    }

    td {
        text-align: center;

    }
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <!-- <h1>Assign New Employee Time</h1> -->
        <form action="<?php echo base_url('attendance_summary_report'); ?>" method="POST">
            <Label>Show Employee</Label>
            <select name="selection_id" id="selection_id">
            <option value="all">All</option>
                <?php foreach($type as $row){?>
                <option value="<?php echo $row->type ?>"><?php echo $row->type ?></option>
                <?php } ?>
            </select>
            <input type="radio" name="radio_id" id="radio_id" value="full-time">Full Time
            <input type="radio" name="radio_id" id="radio_id" value="part-time">Part Time
            <input type="radio" name="radio_id" id="radio_id" value="both">Both
            <input type="submit" value="show" name="submit">
        </form>
        <br>
        <?php
        if (isset($_POST['submit'])){ 
                //initialize a counter 
                $count = 0;

                //start the table 
                echo("<table><tr>"); 
                foreach ($results as $result) {
                
                //if it's divisible by 5 then we echo a new row 
                if(($count % 5) == 0){

                echo("</tr><tr>\n"); 
                $count++;

                }//if 
                else{ 
                $count++; 
                }
                // echo("<td><img src='http://localhost/mis_attendance/employee_photo/$result->employee_id.jpg' alt='NA' height='200' width='200'><br>$result->full_name<td>");
                $base_url=base_url();
                echo("<td>");
                ?>
                <img src='<?php echo base_url() ?>employee_photo/<?php echo $result->employee_id?>.jpg' alt='NA' height='200' width='200'>
                <br> 
                <a href='<?php echo base_url() ?>emp_attendance/<?php echo $result->employee_id?>'><?php echo $result->full_name ?></a>
                <td>

                



                <?php
                }//foreach

                //close the table 
                echo("</tr></table>");
    }?>
    </div>
</body>

</html>