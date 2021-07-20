<?php
    session_start();
    $username="";
    $password="";
    if (isset($_POST['name']) && isset($_POST['pass'])) {
        $username = $_POST['name'];
        $password = $_POST['pass'];
        $password = md5($password);
        $check = false;
        include("../config.php");
        $sql = "SELECT * FROM tbl_nhanvien WHERE tknv='$username' and mknv='$password'";
        $query=$connect->query($sql);
            if(mysqli_num_rows($query)>0){
                $row = $query->fetch_array();
                if($row['trangthai']==1){
                    $_SESSION['admin'] = $username;
                    header("Location: ../indexad.php");
                }
                else {
                    unset($_SESSION['admin']);
                    $_SESSION['thongbaodn']=2;
                    header("Location: ../dangnhapad.php");
                }
            }else{
                unset($_SESSION['admin']);
                $_SESSION['thongbaodn'] = 0;
                header("Location: ../dangnhapad.php");
            }

    }
