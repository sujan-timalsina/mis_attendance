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
            <div>
                <?php
                echo $this->session->flashdata("insert_msg");
                echo $this->session->flashdata("edit_msg");
                ?>
            </div>
            <div class="card my-2 mx-auto" style="min-width: 300px;max-width:400px;">
                <form action="<?php echo base_url('daily_sheet/insert'); ?>" class="p-3" method="POST">
                    <div class="card-header text-center">
                        Add New Record
                    </div>
                    <div class="form-group my-2">
                        <label>Employe Name</label>
                        <select class="form-control" name="add_empid">
                            <?php foreach ($emp_data as $row) { ?>
                                <option value="<?php echo $row->employee_id; ?>"><?php echo $row->name; ?></option>
                            <?php } ?>
                        </select>
                        <small class="text-danger"><?php echo form_error('add_empid'); ?></small>
                    </div>
                    <div class="form-group my-2">
                        <label>Check-In/Out</label>
                        <input type="radio" class="form-check-input ms-2" id="check-in" name="add_check" value="1">
                        <label class="form-check-label" for="check-in">Check-In</label>
                        <input type="radio" class="form-check-input ms-2" id="check-out" name="add_check" value="0">
                        <label class="form-check-label" for="check-out">Check-Out</label>
                        <small class="text-danger"><?php echo form_error('add_check'); ?></small>
                    </div>
                    <div class="form-group my-2">
                        <label>Date</label>
                        <input type="date" class="form-control" name="add_date" value="<?php echo set_value('add_date'); ?>">
                        <small class="text-danger"><?php echo form_error('add_date'); ?></small>
                    </div>
                    <div class="form-group my-2">
                        <label>Time</label>
                        <input type="time" class="form-control" name="add_time" value="<?php echo set_value('add_time'); ?>">
                        <small class="text-danger"><?php echo form_error('add_time'); ?></small>
                    </div>
                    <div class="form-group my-2">
                        <label>Remarks</label>
                        <textarea name="add_remarks" cols="30" rows="3" class="form-control"><?php echo set_value('add_remarks'); ?></textarea>
                        <small class="text-danger"><?php echo form_error('add_remarks'); ?></small>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary mx-2" value="Add">
                        <input type="reset" class="btn btn-primary mx-2" value="Reset">
                    </div>
                </form>
            </div>
            <div class="table-responsive my-2">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Check-In/Out</th>
                            <th>Updated By</th>
                            <th>Remarks</th>
                            <th>Action</th>
                            <th>Check-In/Out Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_POST['emp_id'])) {
                            foreach ($emp_details as $row) { ?>
                                <tr>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->timestamp_date; ?></td>
                                    <td><?php echo $row->timestamp_time; ?></td>
                                    <td>
                                        <?php if ($row->is_check_in == 0) {
                                            echo "Check-Out";
                                        } else {
                                            echo "Check-In";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row->usr_name)) {
                                            echo $row->usr_name;
                                        } else {
                                            echo "System";
                                        } ?>
                                    </td>
                                    <td><?php echo $row->remarks; ?></td>
                                    <td>
                                        [<a href="<?php echo base_url(); ?>edit_daily_sheet/<?php echo $row->fp_timestamp_id; ?>">Edit</a>]
                                        [<a href="#">Delete</a>]
                                    </td>
                                    <td><?php echo $row->check_remarks; ?></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>