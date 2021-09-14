<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            margin: 5px 25px;
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
            /* margin-right: 50px; */
            text-align: center;
        }

        @media only screen and (max-width: 500px) {
            .profile-section {
                margin: 0px;
            }
        }

        .pageInfo {
            background-color: #DCDCDC;
            font-size: 25px;
            margin: 5px 25px;
            text-align: center;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 500px;
        }

        .dropdown-section {
            position: absolute;
            right: 30px;
            top: 80px;
            width: 100px;
            height: 60px;
            text-align: center;
            background-color: #DCDCDC;
            display: none;
        }

        .dropdown-section li {
            border: 1px solid black;
            list-style-type: none;
            height: 30px;
        }

        .dropdown-section a {
            text-decoration: none;
            color: black;
        }

        .user-section {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="main-header">
        <div class="logo-section">
            <img src="<?php echo base_url(); ?>upload/apex_logo.png" alt="logo" class="college-img">
        </div>
        <div class="profile-section">
            <div class="picture-section">
                <img src="<?php echo base_url(); ?>upload/default_pic.jpg" alt="photo" class="user-img">
            </div>
            <div class="user-section" onmouseover="document.getElementsByClassName('dropdown-section').style.display = 'inline-block';">
                <p class="username-section"><?php echo $username; ?> <span>&#9660;</span></p>
            </div>
        </div>
    </div>
    <div class="pageInfo">
        <p>
            <a href="<?php echo base_url(); ?>home" class="a-homepage">Home</a>
            <?php echo $title; ?>
        </p>
    </div>
    <ul class="dropdown-section">
        <li><a href="#">Profile</a></li>
        <li><a href="#">Logout</a></li>
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