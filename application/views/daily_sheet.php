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
                    <select class="form-control">
                        <option value="2021">2021</option>
                    </select>
                </div>
                <div class="form-group col-4 col-md-2 p-1">
                    <label>Month</label>
                    <select class="form-control">
                        <option value="January">January</option>
                    </select>
                </div>
                <div class="form-group col-4 col-md-2 p-1">
                    <label>Day</label>
                    <select class="form-control">
                        <option value="1">1</option>
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
            <div class="row my-2">
                <button class="btn btn-success d-inline-block" style="width:150px;">Add New Record</button>
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
                        <?php foreach ($emp_details as $row) { ?>
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
                                <td><?php echo $row->usr_name; ?></td>
                                <td><?php echo $row->remarks; ?></td>
                                <td>[<a>Edit</a>] [<a>Delete</a>]</td>
                                <td><?php echo $row->check_remarks; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>