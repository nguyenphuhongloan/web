-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2021 lúc 06:01 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_new`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiethd`
--

CREATE TABLE `tbl_chitiethd` (
  `mahd` int(20) NOT NULL,
  `masp` int(20) NOT NULL,
  `giagoc` varchar(20) NOT NULL,
  `giaban` varchar(20) NOT NULL,
  `soluong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitiethd`
--

INSERT INTO `tbl_chitiethd` (`mahd`, `masp`, `giagoc`, `giaban`, `soluong`) VALUES
(4, 1, '0', '16900000', 3),
(5, 2, '0', '2500000', 2),
(6, 2, '0', '2500000', 1),
(7, 1, '0', '16900000', 1),
(7, 2, '0', '2500000', 1),
(9, 1, '0', '16900000', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chucvu`
--

CREATE TABLE `tbl_chucvu` (
  `macv` int(20) NOT NULL,
  `tencv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_chucvu`
--

INSERT INTO `tbl_chucvu` (`macv`, `tencv`) VALUES
(1, 'Admin'),
(2, 'Quản lý'),
(3, 'Nhân viên'),
(4, 'Quản lý nhân sự'),
(5, 'Quản lý nhập hàng'),
(8, 'abc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctphieunhap`
--

CREATE TABLE `tbl_ctphieunhap` (
  `maphieu` int(20) NOT NULL,
  `masp` int(20) NOT NULL,
  `gianhap` int(20) NOT NULL,
  `soluong` int(10) NOT NULL,
  `thanhtien` varchar(20) NOT NULL,
  `ngaynhap` date NOT NULL,
  `manv` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_ctphieunhap`
--

INSERT INTO `tbl_ctphieunhap` (`maphieu`, `masp`, `gianhap`, `soluong`, `thanhtien`, `ngaynhap`, `manv`) VALUES
(1, 15, 1500000, 10, '15000000', '2021-05-11', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `mahd` int(20) NOT NULL,
  `makh` int(20) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `tongtien` varchar(100) NOT NULL,
  `ngayban` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`mahd`, `makh`, `hoten`, `sdt`, `tongtien`, `ngayban`, `diachi`, `trangthai`) VALUES
(4, 1, 'Tuấn Hưng', '0397907756', '50700000', '20-04-2021', 'Quảng Trị', 'Hoàn thành'),
(5, 1, 'Tuấn Hưng', '0397907756', '5000000', '20-04-2021', 'Quảng Trị', 'Hủy đơn'),
(6, 1, 'tuanhung', '123456789', '2500000', '21-04-2021', 'Quảng Trị', 'Hủy đơn'),
(7, 1, 'Tuấn Hưng', '0397907756', '19400000', '03-05-2021', 'Quảng Trị', 'Hủy đơn'),
(9, 1, 'Loan', '0123456789', '84500000', '13-05-2021', 'abc', 'Hoàn thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `makh` int(20) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `trangthai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`makh`, `tenkh`, `diachi`, `sdt`, `taikhoan`, `matkhau`, `trangthai`) VALUES
(1, 'Lê Tuấn Hưng', 'Quảng Trị', '0397907756', 'tuanhung23042001@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(2, 'Loan Xinh Xắn', 'Hồ Chí Minh', '0123456789', 'nguyenphuhongloan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(3, 'Loan', 'Hồ Chí Minh', 'abc', 'peloandethuong1991@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhanvien`
--

CREATE TABLE `tbl_nhanvien` (
  `manv` int(20) NOT NULL,
  `tennv` varchar(20) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `tknv` varchar(20) NOT NULL,
  `mknv` varchar(100) NOT NULL,
  `trangthai` varchar(10) NOT NULL,
  `macv` int(20) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhanvien`
--

INSERT INTO `tbl_nhanvien` (`manv`, `tennv`, `sdt`, `tknv`, `mknv`, `trangthai`, `macv`, `diachi`) VALUES
(1, 'Tuấn Hưng', '0397907756', 'tuanhung', 'e10adc3949ba59abbe56e057f20f883e', '1', 8, 'Quảng Trị'),
(8, 'admin', '123456789', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 1, 'admin'),
(9, 'Loan Xinh', '1', 'loanxinh', 'e10adc3949ba59abbe56e057f20f883e', '1', 3, 'd'),
(10, 'a', '12645', 'a', 'e10adc3949ba59abbe56e057f20f883e', '0', 3, 'a'),
(11, 'Nhân Viên', '111', 'nv', 'e10adc3949ba59abbe56e057f20f883e', '1', 3, '211'),
(12, 'admin 2', '0123456789', 'admin2', 'e10adc3949ba59abbe56e057f20f883ee10adc3949ba59abbe56e057f20f883e', '1', 8, 'nhà');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieunhap`
--

CREATE TABLE `tbl_phieunhap` (
  `maphieu` int(20) NOT NULL,
  `nhacungcap` varchar(20) NOT NULL,
  `ngaynhan` date NOT NULL,
  `tongtien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_phieunhap`
--

INSERT INTO `tbl_phieunhap` (`maphieu`, `nhacungcap`, `ngaynhan`, `tongtien`) VALUES
(1, 'Yamaha', '2021-05-11', '150000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quyen`
--

CREATE TABLE `tbl_quyen` (
  `maquyen` int(20) NOT NULL,
  `tenquyen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_quyen`
--

INSERT INTO `tbl_quyen` (`maquyen`, `tenquyen`) VALUES
(1, 'Sản phẩm'),
(2, 'Thể loại'),
(3, 'Khách Hàng'),
(4, 'Nhân Viên'),
(5, 'Hóa đơn'),
(6, 'Phân phối quyền và chức vụ'),
(7, 'Thống kê');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quyenthuocchucvu`
--

CREATE TABLE `tbl_quyenthuocchucvu` (
  `macv` int(20) NOT NULL,
  `maquyen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_quyenthuocchucvu`
--

INSERT INTO `tbl_quyenthuocchucvu` (`macv`, `maquyen`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 3),
(3, 5),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 5),
(8, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `masp` int(20) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `giaban` varchar(50) NOT NULL,
  `giakhuyenmai` varchar(50) NOT NULL,
  `soluong` int(100) NOT NULL,
  `matheloai` int(100) NOT NULL,
  `trangthai` varchar(100) NOT NULL,
  `mota` varchar(100) NOT NULL,
  `linkhinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`masp`, `tensp`, `giaban`, `giakhuyenmai`, `soluong`, `matheloai`, `trangthai`, `mota`, `linkhinhanh`) VALUES
(1, 'Đàn SILENT guitar Yamaha SLG-200S', '16900000', '17500000', 991, 1, '1', 'Mặt phím đàn bằng gỗ thích, bộ phận cảm ứng âm thanh chữ V bằng nhôm, chức năng Dập Cuộn Model Pacif', 'dan-silent-guitar-slg110n.jpg'),
(2, 'Đàn Guitar Acoustic Epiphone DR100', '2500000', '2700000', 996, 1, '1', 'Mặt đàn: Vân Sam chọn lọc (Select Spruce), Lưng và hông đàn: gỗ Dái Ngựa (Mahogany), Cần đàn: gỗ Dái', 'img11.png'),
(3, 'Đàn Acoustic guitar Yamaha F310-Màu gỗ tự nhiên', '3200000', '0', 1000, 1, '1', 'Đàn Acoustic guitar Yamaha F310 Màu gỗ tự nhiên, Guitar Acoustic là loại guitar dây sắt, phù hợp để ', 'img8-1.png'),
(4, 'Đàn Guitar điện Yamaha Pacifica 112VM', '7840000', '0', 1000, 1, '1', 'Mặt phím đàn bằng gỗ thích, bộ phận cảm ứng âm thanh chữ V bằng nhôm, chức năng Dập Cuộn', 'dan-guitar-dien-yamaha-pacifica-112vm-2.jpg'),
(5, 'Đàn organ Yamaha PSR-S670', '18000000', '19000000', 1000, 2, '1', 'Bộ sản phẩm gồm: đàn, adaptor, chân, bao, 230 giai điệu phong phú bao gồm DJ style', 'organ.jpg'),
(6, 'Đàn Piano điện Casio PX-780M', '25000000', '26500000', 1000, 2, '1', 'Nguồn âm thanh Morphing AiR đa chiều, Bàn phím hoạt động đầu cần ba cảm biến II, Các phím đàn mô phỏ', 'piano.jpg'),
(7, 'Đàn Piano Điện Casio AP-460BN Celviano (Nâu gỗ)', '28000000', '0', 1000, 2, '1', 'Bộ sản phẩm gồm: Đàn, adaptor, chân, pedal, ghế, Công nghệ âm thanh Morphing AiR đa chiều, Hệ thống ', 'piano_2.jpg'),
(8, 'Đàn Organ điện tử Casio WK-240', '6500000', '7000000', 1000, 2, '1', 'Nguồn âm thanh AHL, Bàn phím kiểu piano 76 phím, phản hồi chạm, Hiệu ứng kỹ thuật số cho âm thanh số', 'organ_2.jpg'),
(9, 'Pickup đàn guitar Double B2G', '1600000', '1700000', 1000, 6, '1', 'Là thiết bị giúp khuếch đại âm thanh cho đàn guitar, một đầu gắn trực tiếp vào miệng đàn, đầu còn lạ', 'Pickup.jpg'),
(10, 'Kèn Alto Saxophone Leister ASE100D', '7900000', '8600000', 1000, 3, '1', 'Chất liệu đồng thau trơn bóng, sắc vàng hoàng kim sang trọng, sản phẩm thuộc dòng Alto Saxophone dễ ', 'ken1.jpg'),
(11, 'Amly guitar acoustic Stagg 20AA', '2000000', '0', 1000, 6, '1', 'Thiết kế đẹp, kiểu dáng nhỏ gọn, chất lượng tốt, mức giá hợp lý, phù hợp với nhiều đối tượng chơi gu', 'Amply.jpg'),
(12, 'Phơ guitar Zoom Effect Pedal G1on', '2000000', '0', 1000, 6, '1', 'Sản phẩm dành cho guitar điện, Tạo hiệu ứng âm thanh đặc biệt khi chơi, Sản xuất tại Trung Quốc theo', 'Phơ.jpg'),
(13, 'Trống cơ Stagg TIM122BBK', '8500000', '0', 1000, 4, '1', 'Thiết kế ấn tượng, đẹp mắt, chất âm acoustic tuyệt vời, phù hợp với phong cách nhạc rock', 'trong_3.jpg'),
(14, 'Bộ trống jazz Deviser JZGD22RD', '10000000', '11000000', 1000, 4, '1', 'Thiết kế ấn tượng, đẹp mắt, chất âm acoustic tuyệt vời, phù hợp với phong cách nhạc rock', 'trong_4.jpg'),
(15, 'Trống điện Medeli DD512', '13500000', '0', 1000, 4, '1', 'Thiết kế kiểu dáng đẹp, nhỏ gọn, âm thanh sống động, chân thực, tích hợp tính năng chơi nhạc chuyên ', 'trong_5.jpg'),
(16, 'Violin size 1/4 Deviser V-30MA (Nâu cánh gián)', '1650000', '1750000', 1000, 5, '1', 'Kích thước nhỏ, âm thanh cao, mặt gỗ với sắc nâu cánh gián đẹp mắt, size 1/4 thích hợp cho trẻ em', 'violin_1.jpg'),
(17, 'Violin gỗ size 1/4 KBD 34A5 (Nâu cánh gián)', '1080000', '1200000', 1000, 5, '1', 'Kích thước nhỏ, âm thanh cao, mặt gỗ với sắc nâu cánh gián đẹp mắt, size 1/4 thích hợp cho trẻ em', 'violin_2.jpg'),
(18, 'Đàn piano điện Yamaha CLP-565GP', '98900000', '0', 1000, 2, '1', 'Bộ sản phẩm gồm: Đàn, adaptor, chân, pedal, ghế, tiếng piano mẫu từ dòng Yamaha CFX và Bösendor', 'piano_3.jpg'),
(19, 'Đàn Piano Yamaha CLP 665GP', '20000000', '0', 1000, 2, '1', 'Đàn Piano Yamaha CLP 665GP Kích cỡ/trọng lượng Kích thước Chiều rộng 1430mm', 'piano_4.jpg'),
(20, 'Đàn Piano Yamaha CLP 645PE', '59000000', '0', 1000, 2, '1', 'Piano điện Yamaha CLP_645 là model Piano điện mới được Yamaha tung ra năm 2017, được phát triển từ m', 'piano_5.jpg'),
(21, 'Đàen Electric guitar PACIFICA212VQM', '8900000', '9100000', 1000, 1, '1', 'Mặt phím đàn bằng gỗ thích, bộ phận cảm ứng âm thanh chữ V bằng nhôm,chức năng Dập Cuộn', 'guitar.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_theloai`
--

CREATE TABLE `tbl_theloai` (
  `matheloai` int(20) NOT NULL,
  `tentheloai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_theloai`
--

INSERT INTO `tbl_theloai` (`matheloai`, `tentheloai`) VALUES
(1, 'Guitar'),
(2, 'Piano - Organs'),
(3, 'Kèn - Sáo - Harmonic'),
(4, 'Trống - Bộ gõ'),
(5, 'Keyboards - Violin'),
(6, 'Amply - Effect');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_chitiethd`
--
ALTER TABLE `tbl_chitiethd`
  ADD PRIMARY KEY (`mahd`,`masp`),
  ADD KEY `cthd-sp` (`masp`);

--
-- Chỉ mục cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD PRIMARY KEY (`macv`);

--
-- Chỉ mục cho bảng `tbl_ctphieunhap`
--
ALTER TABLE `tbl_ctphieunhap`
  ADD PRIMARY KEY (`maphieu`,`masp`),
  ADD KEY `ctpn-sp` (`masp`);

--
-- Chỉ mục cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `kh-hd` (`makh`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD PRIMARY KEY (`manv`),
  ADD KEY `nv-cv` (`macv`);

--
-- Chỉ mục cho bảng `tbl_phieunhap`
--
ALTER TABLE `tbl_phieunhap`
  ADD PRIMARY KEY (`maphieu`);

--
-- Chỉ mục cho bảng `tbl_quyen`
--
ALTER TABLE `tbl_quyen`
  ADD PRIMARY KEY (`maquyen`);

--
-- Chỉ mục cho bảng `tbl_quyenthuocchucvu`
--
ALTER TABLE `tbl_quyenthuocchucvu`
  ADD PRIMARY KEY (`macv`,`maquyen`),
  ADD KEY `q-qcv` (`maquyen`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `sp-tl` (`matheloai`);

--
-- Chỉ mục cho bảng `tbl_theloai`
--
ALTER TABLE `tbl_theloai`
  ADD PRIMARY KEY (`matheloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  MODIFY `macv` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `mahd` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `makh` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  MODIFY `manv` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_phieunhap`
--
ALTER TABLE `tbl_phieunhap`
  MODIFY `maphieu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_quyen`
--
ALTER TABLE `tbl_quyen`
  MODIFY `maquyen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `masp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_theloai`
--
ALTER TABLE `tbl_theloai`
  MODIFY `matheloai` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_chitiethd`
--
ALTER TABLE `tbl_chitiethd`
  ADD CONSTRAINT `cthd-hd` FOREIGN KEY (`mahd`) REFERENCES `tbl_hoadon` (`mahd`),
  ADD CONSTRAINT `cthd-sp` FOREIGN KEY (`masp`) REFERENCES `tbl_sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `tbl_ctphieunhap`
--
ALTER TABLE `tbl_ctphieunhap`
  ADD CONSTRAINT `ctpn-pn` FOREIGN KEY (`maphieu`) REFERENCES `tbl_phieunhap` (`maphieu`),
  ADD CONSTRAINT `ctpn-sp` FOREIGN KEY (`masp`) REFERENCES `tbl_sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD CONSTRAINT `kh-hd` FOREIGN KEY (`makh`) REFERENCES `tbl_khachhang` (`makh`);

--
-- Các ràng buộc cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD CONSTRAINT `nv-cv` FOREIGN KEY (`macv`) REFERENCES `tbl_chucvu` (`macv`);

--
-- Các ràng buộc cho bảng `tbl_quyenthuocchucvu`
--
ALTER TABLE `tbl_quyenthuocchucvu`
  ADD CONSTRAINT `q-qcv` FOREIGN KEY (`maquyen`) REFERENCES `tbl_quyen` (`maquyen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qcv-cv` FOREIGN KEY (`macv`) REFERENCES `tbl_chucvu` (`macv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `sp-tl` FOREIGN KEY (`matheloai`) REFERENCES `tbl_theloai` (`matheloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
