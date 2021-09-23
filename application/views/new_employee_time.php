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
        <!-- <h1>Assign New Employee Time</h1> -->
        <form action="<?php echo base_url(); ?>AssignNewEmployeeTime/setUpdateTime" method="POST">
            <table style="margin-left: 30%;">
                <tr>
                    <th>Employee name</th>
                    <td>
                        <select name="employee_id" id="employee_id">
                            <?php
                    
                    foreach ($emp_name as $row) {
                ?>
                            <option value="<?php echo $row->employee_id; ?>"><?php echo $row->full_name; ?></option>
                            <?php
                }
                ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <th>Employee Working Time</th>
                    <td>
                        <select name="category_id" id="category_id">
                            <?php     
                    foreach ($emp_cat as $row) {
                ?>
                            <option value="<?php echo $row->fp_category_id ?>">
                                <?php echo $row->category_name . ' (' . $row->remarks . ')';?></option>
                            <?php
                }
                ?>
                        </select>
                    </td>
                </tr>
                <!-- <tr>
                    <th>Leave From</th>
                    <td><input type="date" name="" id=""></td>
                </tr>
                <tr>
                    <th>Leave To</th>
                    <td><input type="date" name="" id=""></td>
                </tr> -->
                <tr>
                    <td colspan="2">
                        <input class="btn btn-success" type="submit" value="Submit">
                        <input class="btn btn-primary" type="reset" value="Clear">
                    </td>

                </tr>
            </table>
        </form>
    </div>
</body>

</html>