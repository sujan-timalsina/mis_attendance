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
        <form action="<?php echo base_url('daily_attendance_report'); ?>" method="POST">
            <div class="d-flex justify-content-center align-items-center flex-wrap">
                <div class="form-group col-12 col-md-4 p-1">
                    <label>Employe Name</label>
                    <select class="form-control" name="emp_id">
                        <option value="0">All</option>
                        <?php foreach ($emp_data as $row) { ?>
                            <option value="<?php echo $row->employee_id; ?>"><?php echo $row->name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-4 col-md-2 p-1">
                    <label>Year</label>
                    <select class="form-control" name="emp_year">
                        <?php foreach ($get_year as $get_row) { ?>
                            <option value="<?php echo $get_row->year; ?>"><?php echo $get_row->year; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-4 col-md-2 p-1">
                    <label>Month</label>
                    <select class="form-control" name="emp_month">
                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $get_month[$i]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-4 col-md-2 p-1">
                    <label>Day</label>
                    <select class="form-control" name="emp_day">
                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-4 col-md-2 p-1">
                    <label style="visibility: hidden;">Search</label>
                    <br>
                    <input type="submit" value="Search" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</body>

</html>