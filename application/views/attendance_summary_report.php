<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee Time</title>
    <style>
    th {
        text-align: left;

    }

    td {
        text-align: center;

    }
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <!-- <h1>Assign New Employee Time</h1> -->
        <form action="<?php echo base_url(); ?>" method="POST">
            <Label>Show Employee</Label>
            <select name="" id="">
                <option value="">All</option>
            </select>
            <input type="radio" name="radio" id="">Full Time
            <input type="radio" name="radio" id="">Part Time
            <input type="radio" name="radio" id="">Both
            <button type="submit">Show</button>
        </form>
    </div>
</body>

</html>