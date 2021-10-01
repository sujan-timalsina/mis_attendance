<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Within College</title>
</head>

<body>
    <div class="page-container container bg-light p-md-3">
        <?php if ($emp_details != NULL) {
            foreach ($emp_details as $row) { ?>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url('employee_photo/') . $row->emp . ".jpg"; ?>" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <p class="card-text"><?php echo $row->name;  ?></p>
                        <p class="card-text"><?php echo "( " . $row->type . " )";  ?></p>
                        <p class="card-text">Last Check-In:<?php echo " " . $row->lastlogintime;  ?></p>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</body>

</html>