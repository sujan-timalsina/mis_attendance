<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <style>
        .main-header {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .college-img {
            width: 200px;
            height: auto;
        }

        .user-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .profile-section {
            text-align: center;
        }

        .pageInfo {
            /* font-size: 25px; */
            text-align: center;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #DCDCDC;
        }

        .pageInfo a {
            text-decoration: none;
            color: black;
        }

        .dropdown-section {
            position: absolute;
            right: 10%;
            top: 85px;
            height: 60px;
            text-align: center;
            display: none;
        }

        .dropdown-section li {
            background-color: #DCDCDC;
            border: 1px solid black;
            list-style-type: none;
            height: 30px;
            width: 100px;
        }

        .dropdown-section a {
            text-decoration: none;
            color: black;
        }

        .user-section {
            cursor: pointer;
        }

        .page-container {
            min-height: 78vh;
        }

        .main-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #DCDCDC;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="main-header container">
        <div class="logo-section">
            <img src="<?php echo base_url(); ?>upload/apex_logo.png" alt="logo" class="college-img">
        </div>
        <div class="profile-section">
            <div class="picture-section">
                <img src="<?php echo base_url(); ?>upload/default_pic.jpg" alt="photo" class="user-img">
            </div>
            <div class="user-section">
                <p class="username-section"><?php echo $username; ?> <span>&#9660;</span></p>
            </div>
        </div>
    </div>
    <div class="pageInfo container">
        <div>
            <a href="<?php echo base_url(); ?>home" class="a-homepage">Home</a>
            <?php echo $title; ?>
        </div>
    </div>
    <ul class="dropdown-section">
        <li><a href="#">Profile</a></li>
        <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
    </ul>

    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <script>
        $('document').ready(function() {
            $('.user-section').on('click', function(e) {
                $('.dropdown-section').show();
                e.stopPropagation();
            });

            $(".dropdown-section").click(function(e) {
                e.stopPropagation();
            });

            $(document).click(function() {
                $(".dropdown-section").hide();
            });
        });
    </script>
</body>

</html>