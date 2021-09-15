<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacation Type | MIS</title>
    <style>
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <div class="card my-2 mx-auto" style="min-width: 300px;max-width:400px;">
            <div class="card-header text-center">
                Add New Vacation Type
            </div>
            <form action="" class="p-3">
                <div class="form-group my-2">
                    <label>Vacation Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group my-2">
                    <label>Remarks</label>
                    <textarea class="form-control" cols="30" rows="3"></textarea>
                </div>
            </form>
            <div class="card-footer d-flex justify-content-center">
                <input type="submit" class="btn btn-primary mx-2" value="Submit">
                <input type="reset" class="btn btn-primary mx-2" value="Reset">
            </div>
        </div>
        <div class="container my-5">
            <div class="text-center h4">Current Vacation Type</div>
            <div class="table-responsive my-2">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Vacation Name</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>