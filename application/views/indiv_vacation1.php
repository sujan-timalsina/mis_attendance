<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Vacation Entry | MIS</title>
    <style>
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <div class="p-2">
            <?php $vac_sn = 0; ?>
            <form action="<?php echo base_url('indiv_vacation1'); ?>" method="POST">
                <input type="hidden" value="<?php echo $num; ?>" name="no_of_vac">
                <?php for ($i = 0; $i < $num; $i++) { ?>
                    <div class="d-flex justify-content-center align-items-center flex-wrap bg-white my-3">
                        <div class="form-group p-2 col-md-1 col-2">
                            <label>SN</label>
                            <?php echo ++$vac_sn; ?>
                        </div>
                        <div class="form-group p-2 col-md-3 col-10">
                            <label>Assign to</label>
                            <select class="form-control" name="eid_<?php echo $i; ?>">
                                <?php foreach ($get_name as $name) { ?>
                                    <option value="<?php echo $name->employee_id; ?>"><?php echo $name->full_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group p-2 col-md-2 col-6">
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="sdate_<?php echo $i; ?>">
                        </div>
                        <div class="form-group p-2 col-md-2 col-6">
                            <label>End Date</label>
                            <input type="date" class="form-control" name="edate_<?php echo $i; ?>">
                        </div>
                        <div class="col-md-4 col-12">
                            <label>Remarks</label>
                            <textarea class="form-control" cols="30" rows="3" name="remark_<?php echo $i; ?>"></textarea>
                        </div>
                    </div>
                <?php } ?>
                <div class="d-flex justify-content-center my-3">
                    <input type="submit" class="btn btn-primary mx-2">
                    <input type="reset" class="btn btn-primary mx-2">
                </div>
            </form>
        </div>
    </div>
</body>

</html>