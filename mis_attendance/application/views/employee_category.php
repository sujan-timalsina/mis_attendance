<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Category | MIS</title>
    <style>
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <div class="card my-2 mx-auto" style="min-width: 300px;max-width:400px;">
            <div class="card-header text-center">
                Search
            </div>
            <form action="" class="p-3">
                <div class="form-group my-2">
                    <label>Employee Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group my-2">
                    <label>Employee Type</label>
                    <input type="radio" class="form-check-input ms-2" id="faculty">
                    <label class="form-check-label" for="faculty">Faculty</label>
                    <input type="radio" class="form-check-input ms-2" id="staff">
                    <label class="form-check-label" for="staff">Staff</label>
                    <input type="radio" class="form-check-input ms-2" id="all">
                    <label class="form-check-label" for="all">All</label>
                </div>
            </form>
            <div class="card-footer d-flex justify-content-center">
                <input type="submit" class="btn btn-primary mx-2" value="Go">
                <input type="reset" class="btn btn-primary mx-2" value="Reset">
            </div>
        </div>
        <div class="container my-5">
            <div class="text-center h4">Employee List</div>
            <div class="table-responsive my-2">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Employee Name</th>
                            <th>Employee Type</th>
                            <th>Current Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 0;
                        foreach ($emp_cat as $row) {
                        ?>
                            <tr>
                                <td><?php echo ++$sn; ?></td>
                                <td><?php echo $row->full_name; ?></td>
                                <td><?php echo $row->type; ?></td>
                                <td><?php echo $row->category_name . ' (' . $row->remarks . ')'; ?></td>
                                <td><input type="checkbox"></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div>
                <div class="card my-2 mx-auto" style="min-width: 300px;max-width:400px;">
                    <div class="card-header text-center">
                        Select a Category
                    </div>
                    <form action="" class="p-3">
                        <div class="form-group my-2">
                            <select class="form-control">
                                <option value="">--------</option>
                            </select>
                        </div>
                    </form>
                    <div class="card-footer d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary mx-2" value="Assign">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>