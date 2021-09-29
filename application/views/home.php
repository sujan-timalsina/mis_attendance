<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | MIS</title>
    <style>
        .custom-home-layout {
            display: flex;
            justify-content: center;
        }

        .card {
            width: 300px;
            margin: 20px;
        }

        .card-header {
            background-color: #DCDCDC;
        }

        .custom-home-layout a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <div class="row custom-home-layout">
            <div class="card">
                <div class="card-header">
                    Employee Attendance Entry
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">Attendance Category</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('daily_sheet'); ?>">Daily Attendance Add/Update</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('employee_category'); ?>">Category to Employee Link</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('vacation_type'); ?>">Vacation Type</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('vacation_entry'); ?>">Vacation Entry</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('indiv_vacation'); ?>">Individual Vacation Entry</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('employee_leave'); ?>">Employee Leave</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('new_employee_time'); ?>">Change Employee Worktime</a></li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    Employee Attendance Report
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="<?php echo base_url('daily_attendance_report'); ?>">Daily Attendance Report</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('attendance_summary_report'); ?>">Attendence Summary Report</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('employee_within_college'); ?>">Employee Within College Premises</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('employee_leave_snapshot'); ?>">Employee Leave SnapShots</a></li>

                </ul>
            </div>
        </div>
    </div>
</body>

</html>

