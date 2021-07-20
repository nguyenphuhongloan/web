<?php
  $connect = new mysqli("localhost","admin","admin","db_new") or die("Lỗi link") ;
  mysqli_set_charset($connect, "utf8");
