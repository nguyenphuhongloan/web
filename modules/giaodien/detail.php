<div id="detail">
    <div class="grid">
        <div class="row">
            <?php
            $a = new action;
            $a->detailproduct($_GET["id"]);
            ?>
            <div class="column_3">
                <h2 class="best-product-title">Sản phẩm bán chạy</h2>
                <div class="best-item">
                    <div class="best-product-img">
                        <img src="modules/img/piano_4.jpg" alt="" width="100px" height="100px">
                    </div>
                    <div class="best-product-info">
                        <h3 class="best-product-name" onclick='openTab(event, `detail`),productdetail(19)'>Đàn piano Yamaha CLP 665GP</h3>
                        <div class="best-product-price">20.000.000₫</div>
                    </div>
                </div>
                <div class="best-item">
                    <div class="best-product-img">
                        <img src="modules/img/dan-silent-guitar-slg110n.jpg" alt="" width="100px" height="100px">
                    </div>
                    <div class="best-product-info">
                        <h3 class="best-product-name" onclick='openTab(event, `detail`),productdetail(1)'>Đàn SILENT guitar Yamaha SLG-200S</h3>
                        <div class="best-product-price">16.900.000₫</div>
                    </div>
                </div>
                <div class="best-item">
                    <div class="best-product-img">
                        <img src="modules/img/piano_2.jpg" alt="" width="100px" height="100px">
                    </div>
                    <div class="best-product-info">
                        <h3 class="best-product-name" onclick='openTab(event, `detail`),productdetail(7)'>Đàn Piano điện Casio PX-780M</h3>
                        <div class="best-product-price">28.000.000₫</div>
                    </div>
                </div>
                <div class="best-item">
                    <div class="best-product-img">
                        <img src="modules/img/ken1.jpg" alt="" width="100px" height="100px">
                    </div>
                    <div class="best-product-info">
                        <h3 class="best-product-name" onclick='openTab(event, `detail`),productdetail(10)'>Kèn Alto Saxophone Leister ASE100D</h3>
                        <div class="best-product-price">7.900.000₫</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function themvaogiohang(id) {
        var sl = $('#sl').val();
        if(isNaN(sl)){
            alert("Nhập số lượng là số");
            return;
        }
        $.post("modules/ajax.php", {
            id: id,
            sl: sl,
            action: "themvaogiohang"
        }, function(result) {
            if (result == 1) {
                alert("Them vao thanh cong");
            } else if (result == 2) {
                alert("So luong vuot muc cho phep");
            } else {
                alert(result);
            }
        });
    }
</script>