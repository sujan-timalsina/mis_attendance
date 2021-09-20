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
        <div><?php echo $this->session->flashdata("query_message"); ?></div>
        <div class="card my-2 mx-auto" style="min-width: 300px;max-width:400px;">
            <div class="card-header text-center">
                Add New Vacation Type
            </div>
            <form action="<?php echo base_url('vacation_type'); ?>" class="p-3" method="POST">
                <div class="form-group my-2">
                    <label>Vacation Name</label>
                    <input type="text" class="form-control" name="vac_name" value="<?php echo set_value('vac_name'); ?>">
                    <small class="text-danger"><?php echo form_error('vac_name'); ?></small>
                </div>
                <div class="form-group my-2">
                    <label>Remarks</label>
                    <textarea class="form-control" cols="30" rows="3" name="remark"><?php echo set_value('remark'); ?></textarea>
                    <small class="text-danger"><?php echo form_error('remark'); ?></small>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary mx-2" value="Submit">
                    <input type="reset" class="btn btn-primary mx-2" value="Reset">
                </div>
            </form>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $vac_sn = 0;
                        foreach ($vac_type as $typ) {
                        ?>
                            <tr>
                                <td><?php echo ++$vac_sn; ?></td>
                                <td><?php echo $typ->vacation_name; ?></td>
                                <td><?php echo $typ->remarks; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>