<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="modulesad/css/main.css">
    <script src="modulesad/js/main1.js"></script>
    <script src="modulesad/js/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
        <div class="container">
            <div class="dashboard">
                <div class="left">
                    <span class="left__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <?php 
                        if(isset($_SESSION['admin'])){
                            include("modulesad/giaodienad/menuleft.php");
                            include("modulesad/contentad.php");
                        } else {
                            header("Location: dangnhapad.php");
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>