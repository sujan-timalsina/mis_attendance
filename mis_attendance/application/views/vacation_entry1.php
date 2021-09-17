<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacation Entry | MIS</title>
    <style>
        td,
        th {
            max-width: 50px;
        }
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <div class="p-2">
            <?php $vac_sn = 0; ?>
            <form action="<?php echo base_url('vacation_entry1'); ?>" method="POST">
                <?php for ($i = 0; $i < $num; $i++) { ?>
                    <div class="d-flex justify-content-center align-items-center flex-wrap bg-white my-3">
                        <div class="form-group p-2 col-md-1 col-2">
                            <label>SN</label>
                            <?php echo ++$vac_sn; ?>
                        </div>
                        <div class="form-group p-2 col-md-2 col-5">
                            <label>Start Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group p-2 col-md-2 col-5">
                            <label>End Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-2 col-12">
                            <label>Remarks</label>
                            <textarea class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <div class="form-group p-2 col-md-3 col-6">
                            <label>Assign to</label>
                            <select class="form-control" multiple>
                                <?php foreach ($get_category as $category) { ?>
                                    <option value="<?php echo $category->fp_category_id; ?>"><?php echo $category->category_name . '( ' . $category->remarks . ' )'; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group p-2 col-md-2 col-6">
                            <label>Type</label>
                            <select class="form-control">
                                <?php foreach ($get_type as $type) { ?>
                                    <option value="<?php echo $type->fp_vacation_type_id; ?>"><?php echo $type->vacation_name; ?></option>
                                <?php } ?>
                            </select>
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