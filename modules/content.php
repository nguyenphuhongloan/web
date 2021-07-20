<?php
    include("action.php");
    if(isset($_GET["action"])){
        if($_GET["action"]=="product"){
            include("giaodien/product.php");
        }else if($_GET["action"]=="homepage"){
            include("giaodien/homepage.php");
        }else if($_GET["action"]=="gioithieu"){
            include("giaodien/gioithieu.php");
        }else if($_GET["action"]=="contact"){
            include("giaodien/contact.php");
        }else if($_GET["action"]=="detail"){
            include("giaodien/detail.php");
        }else if($_GET["action"]=="giohang"){
            include("giaodien/giohang.php");
        }else if($_GET["action"]=="history"){
            include("giaodien/history.php");
        }else if($_GET["action"]=="thanhtoan"){
            include("giaodien/thanhtoan.php");
        }else if($_GET["action"]=="chitietdh"){
            include("giaodien/chitietdh.php");
        } else if ($_GET["action"] == "search") {
            if(isset($_GET['loai'])){
                include("giaodien/searchloai.php");  
            }else{
                include("giaodien/productsearch.php");
            }
        } else if ($_GET["action"] == "loai") {
            include("giaodien/productloai.php");
        } else if($_GET["action"]=="giasp"){
            include("giaodien/giasp.php");
        }
        
        else{
            include("giaodien/homepage.php");
        }
    }else{
        include("giaodien/homepage.php");
    }
