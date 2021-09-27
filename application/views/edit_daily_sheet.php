<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Daily Sheet | MIS</title>
    <style>
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <form action="<?php echo base_url('daily_sheet'); ?>" method="POST">
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
        <div class="container my-2">
            <div class="card my-2 mx-auto" style="min-width: 300px;max-width:400px;">
                <?php foreach ($to_edit_data as $edit) { ?>
                    <form action="<?php echo base_url('edit_daily_sheet'); ?>" class="p-3" method="POST">
                        <div class="card-header text-center">
                            Edit Existing Record
                        </div>
                        <input type="hidden" value="<?php echo $edit->fp_timestamp_id; ?>" name="edit_timestamp_id">
                        <div class="form-group my-2">
                            <label>Employe Name</label>
                            <select class="form-control" name="edit_empid">
                                <?php foreach ($emp_data as $row) { ?>
                                    <option value="<?php echo $row->employee_id; ?>" <?php if ($edit->employee_id == $row->employee_id) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label>Check-In/Out</label>
                            <input type="radio" class="form-check-input ms-2" id="check-in" name="edit_check" value="1" <?php if ($edit->is_check_in == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                            <label class="form-check-label" for="check-in">Check-In</label>
                            <input type="radio" class="form-check-input ms-2" id="check-out" name="edit_check" value="0" <?php if ($edit->is_check_in == 0) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                            <label class="form-check-label" for="check-out">Check-Out</label>
                        </div>
                        <div class="form-group my-2">
                            <label>Date</label>
                            <input type="date" class="form-control" name="edit_date" value="<?php echo $edit->timestamp_date; ?>">
                        </div>
                        <div class="form-group my-2">
                            <label>Time</label>
                            <input type="time" class="form-control" name="edit_time" value="<?php echo $edit->timestamp_time; ?>">
                        </div>
                        <div class="form-group my-2">
                            <label>Remarks</label>
                            <textarea name="edit_remarks" cols="30" rows="3" class="form-control"><?php echo $edit->remarks; ?></textarea>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary mx-2" value="Update">
                            <input type="reset" class="btn btn-primary mx-2" value="Reset">
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>