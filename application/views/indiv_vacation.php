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
        <div>
            <div class="card my-2 mx-auto" style="min-width: 300px;max-width:400px;">
                <div class="card-header text-center">
                    Number of Vacation
                </div>
                <form action="<?php echo base_url('indiv_vacation1'); ?>" class="p-3" method="GET">
                    <div class="form-group my-2">
                        <select class="form-control" name="no_of_vacation">
                            <?php
                            for ($i = 0; $i < 20; $i++) {
                                $inr_i = $i + 1;
                            ?>
                                <option value="<?php echo $inr_i; ?>"><?php echo $inr_i; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary mx-2" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>