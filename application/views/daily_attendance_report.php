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
                    <input type="submit" value="Search" class="btn btn-primary" name="submit">
                </div>
            </div>
        </form>
        <div class="container my-3 d-flex justify-content-center align-items-center flex-wrap card-group">
            <?php if (isset($_POST['submit'])) {
                $repeat_check = [];
                foreach ($emp_details as $row) {
                    if (!in_array($row->employee_id, $repeat_check)) {
                        $repeat_check[] = $row->employee_id;
            ?>
                        <div class="card m-3" style="min-width:300px;">
                            <div class="row g-0">
                                <div class="col-md-4 d-flex justify-content-center align-items-center p-2">
                                    <img src="<?php echo base_url('employee_photo/') . $row->employee_id . ".jpg"; ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text">Employee Name:<?php echo " " . $row->emp_name; ?></p>
                                        <hr>
                                        <p class="card-text">Employee Type:<?php echo " " . $row->type; ?></p>
                                        <hr>
                                        <p class="card-text">Working Time:<?php echo " " . $row->agreement_type; ?></p>
                                        <hr>
                                        <p class="card-text">Contact No.:<?php echo " " . $row->phone_no; ?></p>
                                        <hr>
                                        <p class="card-text">Expected Time:<?php echo " Check-In: " . $row->start_time . " Check-Out: " . $row->end_time; ?></p>
                                        <hr>
                                        <p>Actual Time:
                                            <?php foreach ($emp_details as $check) {
                                                if ($check->employee_id == $row->employee_id && $check->timestamp_date == $row->timestamp_date) {
                                                    if ($check->is_check_in == 1) {
                                                        echo " Check-In: " . $check->timestamp_time;
                                                    } else if ($check->is_check_in == 0) {
                                                        echo " Check-Out: " . $check->timestamp_time;
                                                    }
                                                }
                                            } ?>
                                        </p>
                                        <hr>
                                        <p class="card-text"> Date:<?php echo " " . $row->timestamp_date; ?></p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php }
                }
            } ?>
        </div>
    </div>
</body>

</html>