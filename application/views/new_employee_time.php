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
th{
    text-align:left;
  
}
td{
    text-align:center;
   
}
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <!-- <h1>Assign New Employee Time</h1> -->
        <table style="margin-left: 30%;">
            <tr>
                <th>Employee name</th>
                <td>
                    <select name="name" id="names">
                        <?php
                    
                    foreach ($emp_cat as $row) {
                ?>
                        <option value="<?php echo $row->full_name; ?>"><?php echo $row->full_name; ?></option>
                        <?php
                }
                ?>
                    </select>

                </td>
            </tr>
            <tr>
                <th>Employee Working Time</th>
                <td>
                    <select name="work_time" id="work_time">
                        <?php     
                    foreach ($emp_cat as $row) {
                ?>
                        <option value="<?php echo $row->category_name . ' (' . $row->remarks . ')'; ?>"><?php echo $row->category_name . ' (' . $row->remarks . ')';?></option>
                        <?php
                }
                ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Leave From</th>
                <td><input type="date" name="" id=""></td>
            </tr>
            <tr>
                <th>Leave To</th>
                <td><input type="date" name="" id=""></td>
            </tr>
            <tr>
            <td colspan="2">
            <input class="btn btn-success" type="submit" name="" id="" value="Submit">
            <input class="btn btn-primary" type="reset" name="" id="" value="Clear">
            </td>

        </tr>
        </table>

    </div>
</body>

</html>