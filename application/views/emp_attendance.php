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
        <table class="table table-striped table-hover">
            <tr>
                <th> <label for="">From</label></th>
                <td>Year</td>
                <td>
                    <select name="" id="">
                        <option value=""></option>
                    </select>
                </td>
                <td>Month</td>
                <td>
                    <select name="" id="">
                        <option value=""></option>
                    </select>
                </td>
                <td>Day</td>
                <td>
                    <select name="" id="">
                        <option value=""></option>
                    </select>
                </td>
                <td></td>
            </tr>
            <tr>
                <th>To</th>
                <td>Year</td>
                <td>
                    <select name="" id="">
                        <option value=""></option>
                    </select>
                </td>
                <td>Month</td>
                <td>
                    <select name="" id="">
                        <option value=""></option>
                    </select>
                </td>
                <td>Day</td>
                <td>
                    <select name="" id="">
                        <option value=""></option>
                    </select>
                </td>
                <td rowspan="2" colspan="2"><button type="submit">Submit</button></td>
            </tr>
        </table>

        <hr>
        <table class="table table-striped table-hover">
            <tr>
                <th>Employee Name</th>
                <td><?php echo $emp_cat->full_name; ?></td>
            </tr>
            <tr>
                <th>Employee Type</th>
                <td><?php echo $emp_cat->type; ?></td>
            </tr>
            <tr>
                <th>Working Time</th>
                <td><?php echo $emp_cat->agreement_type; ?></td>
            </tr>
            <tr>
                <th>Contact No.</th>
                <td><?php echo $emp_cat->phone_no; ?></td>
            </tr>
        </table>
        <hr>
        <table class="table table-striped table-hover">
            <tr>
                <th>Year</th>
                <th>No of days</th>
                <th>Present Days</th>
                <th>Leave Days</th>
                <th>Holidays</th>
                <th>Absent Days</th>
                <th>Present on Holidays</th>
            </tr>
            <?php $i = 0;
            foreach ($emp_det as $det) {
                $i = $i + 1; ?>
                <tr>
                    <td><?php echo $month[$i] . " " . $det->Year ?></td>
                    <td><?php echo $det->Total_Days; ?></td>
                    <td><?php echo $det->present; ?></td>
                    <td><?php echo $det->LeaveDay; ?></td>
                    <td><?php echo $det->Absent; ?></td>
                    <td><?php //echo $det->Absent; 
                        ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>