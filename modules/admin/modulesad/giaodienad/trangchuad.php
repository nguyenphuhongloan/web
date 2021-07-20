<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Bảng điều khiển</p>
        <div class="right__cards">
            <a class="right__card" href="indexad.php?action=viewproduct">
                <div class="right__cardTitle">Sản Phẩm</div>
                <?php
                include("./config.php");
                $sql = "SELECT * from tbl_sanpham";
                $query = $connect->query($sql);
                $numpage = ceil($query->num_rows);
                echo "<div class='right__cardNumber'>$numpage</div>";
                ?>
                <div class="right__cardDesc">Xem Chi Tiết <img src="modulesad/img/arrow-right.svg" alt=""></div>
            </a>
            <a class="right__card" href="indexad.php?action=khachhang">
                <div class="right__cardTitle">Khách Hàng</div>
                <?php
                include("./config.php");
                $sql = "SELECT * from tbl_khachhang";
                $query = $connect->query($sql);
                $numpage = ceil($query->num_rows);
                echo "<div class='right__cardNumber'>$numpage</div>";
                ?>

                <div class="right__cardDesc">Xem Chi Tiết <img src="modulesad/img/arrow-right.svg" alt=""></div>
            </a>
            <a class="right__card" href="indexad.php?action=thongke">
                <div class="right__cardTitle" style="margin-bottom: 55px;">Thống Kê</div>

                <div class="right__cardDesc">Xem Chi Tiết <img src="modulesad/img/arrow-right.svg" alt=""></div>
            </a>
            <a class="right__card" href="indexad.php?action=hoadon">
                <div class="right__cardTitle">Đơn Hàng</div>
                <?php
                include("./config.php");
                $sql = "SELECT * from tbl_hoadon";
                $query = $connect->query($sql);
                $numpage = ceil($query->num_rows);
                echo "<div class='right__cardNumber'>$numpage</div>";
                ?>

                <div class="right__cardDesc">Xem Chi Tiết <img src="modulesad/img/arrow-right.svg" alt=""></div>
            </a>
        </div>
    </div>
</div>