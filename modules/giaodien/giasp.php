<div id="product">
    <div class="grid">
        <div class="row" style="margin-top: 30px;">
            <div class="column_3">
                <div class="product-category">
                    <h3>Danh mục</h3>
                    <ul id="categary">

                        <?php
                        include("modules/admin/config.php");
                        $sql =  "SELECT * FROM tbl_theloai";
                        $query = mysqli_query($connect, $sql);
                        while ($row = $query->fetch_array()) {
                            echo "<a href='index.php?action=loai&loaisp=" . $row['matheloai'] . "'><li>" . $row['tentheloai'] . "</li></a>";
                        }
                        ?>
                    </ul>
                </div>
                <div id="chongia">
                    <div class="khoanggia">Khoảng giá</div>
                    <div class="giainput">
                        <input class="ipgia" type="text" name="" id="giaduoi" placeholder="Từ">
                        <input class="ipgia" type="text" name="" id="giatren" placeholder="Đến">
                    </div>
                    <div id="nutapdung" class="chonkhoanggia" onclick="chongia()">Áp dụng</div>
                </div>
            </div>
            <div class="column_9">

                <div class="row" id="product-item">
                    <?php
                    $dem = 1;
                    include("modules/admin/config.php");
                    if (isset($_GET['giacao']) && isset($_GET['giathap'])) {
                        if (!isset($_GET['loaisp']) && !isset($_GET['text'])) {
                            $giathap = $_GET['giathap'];
                            $giacao = $_GET['giacao'];
                            $loaisp = "matheloai";
                            $search = "tensp";

                            $sql = " SELECT * from tbl_sanpham where giaban>=$giathap  and giaban<=$giacao";
                        }
                        if (isset($_GET['loaisp']) && !isset($_GET['text'])) {
                            $giathap = $_GET['giathap'];
                            $giacao = $_GET['giacao'];
                            $loaisp = $_GET['loaisp'];
                            $search = "tensp";

                            $sql = " SELECT * from tbl_sanpham where giaban>=$giathap  and giaban<=$giacao and matheloai = '$loaisp' and trangthai = 1";
                        }
                        if (!isset($_GET['loaisp']) && isset($_GET['text'])) {
                            $giathap = $_GET['giathap'];
                            $giacao = $_GET['giacao'];
                            $search = $_GET['text'];
                            $loaisp = "matheloai";
                            $sql = " SELECT * from tbl_sanpham where giaban>=$giathap  and giaban<=$giacao and tensp LIKE  N'%" . $search . "%' and trangthai =1";
                        }
                        if (isset($_GET['loaisp']) && isset($_GET['text'])) {
                            $giathap = $_GET['giathap'];
                            $giacao = $_GET['giacao'];
                            $search = $_GET['text'];
                            $loaisp = $_GET['loaisp'];
                            $sql = " SELECT * from tbl_sanpham where giaban>=$giathap  and giaban<=$giacao and tensp LIKE  N'%" . $search . "%' and matheloai ='$loaisp' and trangthai =1";
                        }
                        $query = $connect->query($sql);
                        $numpage = ceil($query->num_rows);
                        while ($row = $query->fetch_array()) {
                            if ($dem == 1) {
                                echo "<div class='row' style='margin: 0 auto' id='row_product_1'>";
                            }
                            if ($dem <= 6) {
                                if ($row['giakhuyenmai'] != 0) {
                                    echo "<div class='column_4'>
                                        <a href='index.php?action=detail&id=" . $row["masp"] . "' style='text-decoration:none;'>
                                        <div class='product-box'>
                                            <div class='sale-flash'>Sale</div>
                                            <div class='product-img'>
                                                <img src='modules/img/" . $row["linkhinhanh"] . "'>
                                            </div>
                                            <div class='product-info'>
                                                <p class='product-name'>" . $row["tensp"] . "</p>
                                                <div class='product-price'>" . number_format($row["giaban"]) . "₫</div>
                                                <div class='product-price-old'>" . number_format($row["giakhuyenmai"]) . "₫</div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>";
                                } else {
                                    echo "<div class='column_4'>
                                        <a href='index.php?action=detail&id=" . $row["masp"] . "' style='text-decoration:none;'>
                                        <div class='product-box'>
                                            <div class='product-img'>
                                                <img src='modules/img/" . $row["linkhinhanh"] . "'>
                                            </div>
                                            <div class='product-info'>
                                                <p class='product-name'>" . $row["tensp"] . "</p>
                                                <div class='product-price'>" . number_format($row["giaban"]) . "₫</div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>";
                                }
                            }
                            if ($dem % 3 == 0 && $dem != $numpage) {
                                echo "</div></br><div class='row' style='margin: 0 auto' id='row_product_2'>";
                            }
                            $dem++;
                        }
                    }
                    ?>
                </div>

            </div>

            <div id="trang">
                <?php $dem--;
                if ($dem > 6) {
                    for ($i = 1; $i <= ceil($dem / 6); $i++) {
                        if ($i == 1) {
                            echo "<a id='btn_phantrang" . $i . "'  class='slide active1' class = 'active1' onclick='chuyentrang(`" . $i . "`,`" . $giathap . "`,`" . $giacao . "`, `" . $search . "`, `" . $loaisp . "`)'>" . $i . "</a>&ensp;";
                        } else {
                            echo "<a id='btn_phantrang" . $i . "'  class='slide' onclick='chuyentrang(`" . $i . "`,`" . $giathap . "`,`" . $giacao . "`, `" . $search . "`, `" . $loaisp . "`)'>" . $i . "</a> &ensp;";
                        }
                    }
                    echo "</div></div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    function chuyentrang(sotrang, giathap, giacao, search, loaisp) {
         $.post("modules/ajax.php", {
            sotrang: sotrang,
            giathap: giathap,
            giacao: giacao,
            search: search,
            loaisp: loaisp,
            action: "phantranggia",
            sql: "SELECT * FROM tbl_sanpham where giaban>= "+giathap+" and giaban<= "+giacao+" and matheloai = '"+loaisp+"' and tensp like "+"N%'"+search+"'%"
        }, function(result) {
            var dem = 1;
            $("#row_product_1").html('');
            $("#row_product_2").html('');
            result.items.forEach(item => {
                if (dem <= 3) {
                    if (item.giakhuyenmai != 0) {
                        $("#row_product_1").append("<div class='column_4'><a href='index.php?action=detail&id=" + item.masp + "' style='text-decoration:none;'><div class='product-box'><div class='sale-flash'>Sale</div><div class='product-img'><img src='modules/img/" + item.linkhinhanh + "'></div><div class='product-info'><p class='product-name'>" + item.tensp + "</p><div class='product-price'>" + item.giaban + "₫</div><div class='product-price-old'>" + item.giakhuyenmai + "₫</div></div></div></a></div>");
                    } else $("#row_product_1").append("<div class='column_4'><a href='index.php?action=detail&id=" + item.masp + "' style='text-decoration:none;'><div class='product-box'><div class='product-img'><img src='modules/img/" + item.linkhinhanh + "'></div><div class='product-info'><p class='product-name'>" + item.tensp + "</p><div class='product-price'>" + item.giaban + "₫</div></div></div></a></div>");
                } else {
                    if (item.giakhuyenmai != 0) {
                        $("#row_product_2").append("<div class='column_4'><a href='index.php?action=detail&id=" + item.masp + "' style='text-decoration:none;'><div class='product-box'><div class='sale-flash'>Sale</div><div class='product-img'><img src='modules/img/" + item.linkhinhanh + "'></div><div class='product-info'><p class='product-name'>" + item.tensp + "</p><div class='product-price'>" + item.giaban + "₫</div><div class='product-price-old'>" + item.giakhuyenmai + "₫</div></div></div></a></div>");
                    } else $("#row_product_2").append("<div class='column_4'><a href='index.php?action=detail&id=" + item.masp + "' style='text-decoration:none;'><div class='product-box'><div class='product-img'><img src='modules/img/" + item.linkhinhanh + "'></div><div class='product-info'><p class='product-name'>" + item.tensp + "</p><div class='product-price'>" + item.giaban + "₫</div></div></div></a></div>");
                }
                dem++;
            });
            $(".active1").removeClass("active1");
            $("#btn_phantrang" + sotrang).addClass("active1");
        }); 
    }

    function chongia() {
        var giacao = document.getElementById('giatren').value;
        var giathap = document.getElementById('giaduoi').value;
        location.href = "index.php?action=giasp&giathap=" + giathap + "&giacao=" + giacao;
    }
</script>