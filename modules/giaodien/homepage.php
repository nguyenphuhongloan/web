<div id="home" style="display: block;">
        <section class="section-1">
            <div class="home-slider">
                <div class="section-1-item" style="display:block;">
                    <img src="modules/img/slider_1.jpg" alt="">
                </div>
                <div class="section-1-item">
                    <img src="modules/img/slider_2.jpg" alt="">
                </div>
                <div class="section-1-item">
                    <img src="modules/img/slider_3.jpg" alt="">
                </div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </section>
        <section class="section-2">
            <div class="banner grid">
                <div class="img-banner">
                    <div class="img-card">
                        <img src="modules/img/bn1.jpg" alt="">
                    </div>
                </div>
                <div class="img-banner">
                    <div class="img-card">
                        <img src="modules/img/bn2.jpg" alt="">
                    </div>
                </div>
                <div class="img-banner">
                    <div class="img-card">
                        <img src="modules/img/bn3.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="section-3">
            <h2 class="all-product">tất cả sản phẩm</h2>
            <div class="row" id="product_hot">
                <?php
                    $b= new action();
                    $b->product1(); 
                ?>
            </div>
            <div class="seemore">
                <div class="seemore-text" >
                    <a href="index.php?action=product" style="text-decoration:none;color:#ff6d00;">Xem tiếp</a>
                </div>
            </div>
        </section>
        <section class="section-4">
            <div class="grid">
                <div class="title-home-best">
                    <h2>Sản phẩm bán chạy</h2>
                    <div class="product-text-best">
                        Nhu cầu số đông lựa chọn theo những sản phẩm dưới , sản phẩm được ưu tiên lựa chọn nhiều nhất
                        trong Moza nhạc cụ
                    </div>
                </div>
                <div class="all-product-best">
                    <div class="product-box-best">
                        <div class="product-img-best">
                            <img src="modules/img/trong.jpg" alt="">
                        </div>
                        <div class="product-best-info" onclick='openTab(event, `detail`),productdetail(14)'>
                            <h3 class="product-best-name">
                                Bộ trống jazz Deviser JZGD22RD
                            </h3>
                            <div class="product-best-price">
                                <div class="product-best-price-new">
                                    10.000.000₫
                                </div>
                                <div class="product-best-price-old">
                                    11.000.000₫
                                </div>
                            </div>
                            <ul class="product-content">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Thiết kế ấn tượng, đẹp mắt
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Chất âm acoustic tuyệt vời
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Phù hợp với phong cách nhạc rock
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-box-best">
                        <div class="product-img-best">
                            <img src="modules/img/trong_2.jpg" alt="">
                        </div>
                        <div class="product-best-info" onclick='openTab(event, `detail`),productdetail(15)'>
                            <h3 class="product-best-name">
                                Trống điện Medeli DD512
                            </h3>
                            <div class="product-best-price">
                                <div class="product-best-price-new">
                                    13.500.000₫
                                </div>
                            </div>
                            <ul class="product-content">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Thiết kế kiểu dáng đẹp, nhỏ hơn
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Âm thanh sống động chân thực
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Tích hợp tính năng chơi nhạc chuyên nghiệp
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-box-best">
                        <div class="product-img-best">
                            <img src="modules/img/violin.jpg" alt="">
                        </div>
                        <div class="product-best-info" onclick='openTab(event, `detail`),productdetail(17)'>
                            <h3 class="product-best-name">
                                Violin gỗ size 1/4' KBD 34A5 (Nâu cánh gián)
                            </h3>
                            <div class="product-best-price">
                                <div class="product-best-price-new">
                                    1.080.000₫
                                </div>
                                <div class="product-best-price-old">
                                    1.200.000₫
                                </div>
                            </div>
                            <ul class="product-content">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Kích thước nhỏ, âm thanh cao
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Mặt gỗ với sắc nâu cánh gián đẹp mắt
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Size 1/4 thích hợp cho trẻ em
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-box-best" style="margin-right: 0;">
                        <div class="product-img-best">
                            <img src="modules/img/piano.jpg" alt="">
                        </div>
                        <div class="product-best-info" onclick='openTab(event, `detail`),productdetail(6)'>
                            <h3 class="product-best-name">
                                Đàn Piano điện Casio PX-780M
                            </h3>
                            <div class="product-best-price">
                                <div class="product-best-price-new">
                                    25.000.000₫
                                </div>
                                <div class="product-best-price-old">
                                    26.500.000₫
                                </div>
                            </div>
                            <ul class="product-content">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Thiết kế ấn tượng, đẹp mắt
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Chất âm acoustic tuyệt vời
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Phù hợp với phong cách nhạc rock
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-6">
            <div class="grid">
                <div class="row">
                    <div class="column_4">
                        <div class="service">
                            <div class="service-img">
                                <img src="modules/img/icon-servies-1.png" alt="">
                            </div>
                            <div class="service-content">
                                <div class="service-name">
                                    Giao hàng miễn phí
                                </div>
                                <div class="service-title">
                                    Miễn phí giao hàng trên toàn quốc với các đơn hàng trên 5 triệu đồng
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column_4">
                        <div class="service">
                            <div class="service-img">
                                <img src="modules/img/icon-servies-2.png" alt="">
                            </div>
                            <div class="service-content">
                                <div class="service-name">
                                    Thanh toán
                                </div>
                                <div class="service-title">
                                    Thanh toán trực tiếp khi nhận hàng, hoàn trả khi lỗi do nhà sản suất
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column_4">
                        <div class="service">
                            <div class="service-img">
                                <img src="modules/img/icon-servies-3.png" alt="">
                            </div>
                            <div class="service-content">
                                <div class="service-name">
                                    Khuyến mãi khủng
                                </div>
                                <div class="service-title">
                                    Khuyễn mãi cho những khách hàng thân thiết
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>