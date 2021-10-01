<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Leave Snapshot</title>
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
        <form action="" method="post">
            <table class="table table-striped table-hover">

                <tr>
                    <th>Name:</th>
                    <td><input type="text" name="name_id" id="name_id"></td>
                </tr>
                <tr>
                    <th>Date From:</th>
                    <td><input type="date" name="datefrom_id" id="datefrom_id"></td>
                </tr>
                <tr>
                    <th>Date To:</th>
                    <td><input type="date" name="dateto_id" id="dateto_id"></td>
                </tr>
                <tr>
                    <th>Year Snapshot:</th>
                    <td>
                        <select name="value_id" id="value_id">
                            <option value=""></option>
                            <option value="All">All</option>
                            <?php foreach ($get_year as $get_row) { ?>
                                <option value="<?php echo $get_row->year; ?>"><?php echo $get_row->year; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Include Left Employee:</th>
                    <td>
                        <input type="radio" name="radio" id="">Yes
                        <input type="radio" name="radio" id="">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">Submit</button>
                        <button type="reset">Reset</button>
                    </td>
                </tr>
            </table>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr>
                    <th colspan="5">LEAVE SNAPSHOP FOR CURRENT YEAR</th>
                </tr>
                <tr>
                    <th>S.N</th>
                    <th>Employee Name</th>
                    <th>Total Leave Days</th>
                    <th>First Leave Date</th>
                    <th>Last Leave Date</th>
                </tr>
            </table>
        </div>
    </div>
<script>
        $('#value_id').change(function(e) {
            var a = $(this).val();
            if(a=="All"){
                $('#datefrom_id').val(a.concat(""));
                $('#dateto_id').val(a.concat(""));
            }else{
            $('#datefrom_id').val(a.concat("-01-01"));
            $('#dateto_id').val(a.concat("-12-31"));
            }
        });
</script>
</body>

</html>