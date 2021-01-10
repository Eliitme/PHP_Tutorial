-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2021 lúc 02:23 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopthucung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `ten_dang_nhap`, `mat_khau`, `level`) VALUES
(1, 'admin', '$1$hHXfCc0W$8D50uNuNTRXbepGlZLyij1', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_li_chi_tiet_hoa_don`
--

CREATE TABLE `quan_li_chi_tiet_hoa_don` (
  `id_hoa_don` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `gia` float NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_li_hoa_don`
--

CREATE TABLE `quan_li_hoa_don` (
  `id` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `ngay_dat_don` date NOT NULL DEFAULT current_timestamp(),
  `tinh_trang` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_li_loai_san_pham`
--

CREATE TABLE `quan_li_loai_san_pham` (
  `id` int(11) NOT NULL,
  `ten_loai_san_pham` varchar(255) NOT NULL,
  `is_phu_kien` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quan_li_loai_san_pham`
--

INSERT INTO `quan_li_loai_san_pham` (`id`, `ten_loai_san_pham`, `is_phu_kien`) VALUES
(5, 'Chó Alaska', 0),
(6, 'Mèo anh lông ngắn', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_li_san_pham`
--

CREATE TABLE `quan_li_san_pham` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `anh_san_pham` varchar(255) NOT NULL,
  `gia` float NOT NULL,
  `so_luong` int(11) NOT NULL,
  `mo_ta` text NOT NULL,
  `tinh_trang` tinyint(1) NOT NULL,
  `id_loai_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quan_li_san_pham`
--

INSERT INTO `quan_li_san_pham` (`id`, `ten_san_pham`, `anh_san_pham`, `gia`, `so_luong`, `mo_ta`, `tinh_trang`, `id_loai_san_pham`) VALUES
(1, 'Chó Alaska 1 tháng tuổi', '../../images/912021-1610217948.jpg', 123456, 1, '<h1>Ch&oacute; Alaska &ndash; T&igrave;m hiểu đặc điểm, gi&aacute; b&aacute;n, c&aacute;ch chăm s&oacute;c ch&oacute; Alaska</h1>\r\n\r\n<p><em>Alaska l&agrave; loại ch&oacute; được y&ecirc;u th&iacute;ch tr&ecirc;n to&agrave;n thế giới bởi d&aacute;ng vẻ oai h&ugrave;ng nhưng kh&ocirc;ng k&eacute;m phần đ&aacute;ng y&ecirc;u. Kế thừa bộ gen của d&ograve;ng ch&oacute; s&oacute;i tuyết hoang d&atilde; v&agrave; được thuần ho&aacute; bởi tộc Malamute,&nbsp;</em><em>Alaska</em><em>&nbsp;nhanh ch&oacute;ng trở th&agrave;nh một trong những giống ch&oacute; được nhiều người y&ecirc;u th&iacute;ch nhất. Để hiểu r&otilde; hơn về giống&nbsp;</em><a href=\"https://petmaster.vn/petroom/cho-canh/alaska/\" target=\"_blank\"><em>ch&oacute; Alaska</em></a><em>&nbsp;huyền thoại n&agrave;y, h&atilde;y c&ugrave;ng Petroom t&igrave;m hiểu tất tần tật c&aacute;c th&ocirc;ng tin về ch&uacute;ng qua b&agrave;i viết dưới đ&acirc;y.</em></p>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/wp-content/uploads/2020/03/hinh-anh-cho-alaska.jpg\" rel=\"nofollow\" target=\"_blank\"><img alt=\"Chó Alaska\" src=\"https://petmaster.vn/petroom/wp-content/uploads/2020/03/hinh-anh-cho-alaska.jpg\" style=\"height:412px; width:600px\" title=\"hinh-anh-cho-alaska\" /></a></p>\r\n\r\n<p><em>Tất tần tật về si&ecirc;u ch&oacute; Alaska</em></p>\r\n', 1, 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- Chỉ mục cho bảng `quan_li_chi_tiet_hoa_don`
--
ALTER TABLE `quan_li_chi_tiet_hoa_don`
  ADD KEY `id_hoa_don` (`id_hoa_don`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `quan_li_hoa_don`
--
ALTER TABLE `quan_li_hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`);

--
-- Chỉ mục cho bảng `quan_li_loai_san_pham`
--
ALTER TABLE `quan_li_loai_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quan_li_san_pham`
--
ALTER TABLE `quan_li_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai_san_pham` (`id_loai_san_pham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quan_li_hoa_don`
--
ALTER TABLE `quan_li_hoa_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quan_li_loai_san_pham`
--
ALTER TABLE `quan_li_loai_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `quan_li_san_pham`
--
ALTER TABLE `quan_li_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `quan_li_chi_tiet_hoa_don`
--
ALTER TABLE `quan_li_chi_tiet_hoa_don`
  ADD CONSTRAINT `quan_li_chi_tiet_hoa_don_ibfk_1` FOREIGN KEY (`id_hoa_don`) REFERENCES `quan_li_hoa_don` (`id`),
  ADD CONSTRAINT `quan_li_chi_tiet_hoa_don_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `quan_li_san_pham` (`id`);

--
-- Các ràng buộc cho bảng `quan_li_hoa_don`
--
ALTER TABLE `quan_li_hoa_don`
  ADD CONSTRAINT `quan_li_hoa_don_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`);

--
-- Các ràng buộc cho bảng `quan_li_san_pham`
--
ALTER TABLE `quan_li_san_pham`
  ADD CONSTRAINT `quan_li_san_pham_ibfk_1` FOREIGN KEY (`id_loai_san_pham`) REFERENCES `quan_li_loai_san_pham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
