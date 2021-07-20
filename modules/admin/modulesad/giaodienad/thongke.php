<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Thống kê</p>
        <div class="right__table">
            <div class="right__tableWrapper">
                <select name="" id="tkloai" style="margin-bottom: 20px;" onchange="thongkeloai()">
                
                <option value="0" Selected>Tất cả sản phẩm</option>
                <?php
                    include("./config.php");
                    $sql = "SELECT * from tbl_theloai";
                    $query = $connect->query($sql);
                    while($row=$query->fetch_array()){
                        echo"<option value='".$row['matheloai']."'>".$row["tentheloai"]."</option>";
                    }
                ?>
                </select>
                <table>
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng bán</th>
                            <th>Hình ảnh</th>
                            <th>Giá SP</th>
                        </tr>
                    </thead>

                    <tbody id="tktime">
                        <?php
                        include("./config.php");
                        $sql = "SELECT sp.masp,sp.tensp,Sum(cthd.soluong) as soluong,sp.linkhinhanh,sp.giaban,tbl_hoadon.trangthai from tbl_sanpham as sp,tbl_chitiethd as cthd, tbl_hoadon where sp.masp=cthd.masp and tbl_hoadon.trangthai='Hoàn thành' and cthd.mahd = tbl_hoadon.mahd group by sp.masp order by soluong DESC";
                        $query = $connect->query($sql);
                        while ($row = $query->fetch_array()) {
                            echo "<tr><td data-label='STT'>" . $row["masp"] . "</td>
                                <td data-label='Tên sản phẩm'>" . $row["tensp"] . "</td>
                                <td data-label='Số lượng'>" . $row["soluong"] . "</td>
                                <td data-label='Hình ảnh'><img src='../img/" . $row["linkhinhanh"] . "' style='width:100px'></td>
                                <td data-label='Giá SP'>".number_format($row["giaban"])."₫</td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function thongkeloai(){
        var tkloai= $("#tkloai").val();
        if(tkloai==0){
            location.href="indexad.php?action=thongke";
        }else
        location.href="indexad.php?action=thongkeloai&tktl="+tkloai+"";
    }
</script>