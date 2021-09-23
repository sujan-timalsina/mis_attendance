<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Leave</title>
    <style>
        th{
            text-align:left; 
        }
        td{
            text-align:center;  
        }
    </style>
</head>

<body>
    <div class="page-container container bg-light">
        <table style="margin-left: 30%;">
        <tr>
            <th>Employee Name:</th>
            <td>
                <select name="" id="">
                    <option value=""></option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Leave Type</th>
            <td>
                <select name="" id="">
                    <option value=""></option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Purpose of Leave</th>
            <td><textarea name="" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <th>Leave From</th>
            <td><input type="date"></td>
        </tr>
        <tr>
            <th>Leave To</th>
            <td><input type="date"></td>
        </tr>
        <tr>
            <th>No of days</th>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td colspan="2">
            <input class="btn btn-success" type="submit" name="" id="" value="Submit">
            <input class="btn btn-primary" type="reset" name="" id="" value="Clear">
            </td>

        </tr>
        </table>

    </div>
</body>

</html>