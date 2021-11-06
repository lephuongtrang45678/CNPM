-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2021 lúc 01:59 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `buy_book`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idAd` int(10) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Addministrators` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idAd`, `name`, `pass`, `id_Addministrators`) VALUES
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(3, 'trang', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(4, 'linh', 'c4ca4238a0b923820dcc509a6f75849b', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `administrators`
--

CREATE TABLE `administrators` (
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Addministrators` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `administrators`
--

INSERT INTO `administrators` (`name`, `pass`, `id_Addministrators`) VALUES
('trang', 'c4ca4238a0b923820dcc509a6f75849b', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `book_isbn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_author` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_image` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_Category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_descr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_price` decimal(6,2) NOT NULL,
  `publisherid` int(10) NOT NULL,
  `idAd` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`book_isbn`, `book_title`, `book_author`, `book_image`, `book_Category`, `book_descr`, `book_price`, `publisherid`, `idAd`) VALUES
('918-0-321-94786-0', 'CON KHÔNG NGỐC', 'LƯ TÔ VỸ', './img/img-index/412073con_khong_ngoc.jpg', 'Tiểu Thuyết', 'Từ một cậu bé không may mắc phải căn bệnh viêm não Nhật Bản dẫn đến bị bại não và chỉ số IQ chỉ còn 70 vươn lên trở thành một thiên tài sở hữu 500 phát minh, tác giả của hơn 50 đầu sách nổi tiếng về giáo dục, một chuyên gia nổi tiếng trong lĩnh vực khai thác và phát triển năng lực tiềm ẩn, cuộc đời của Lư Tô Vỹ quả thực là một cuộc đời kỳ diệu!', '123.00', 3, 3),
('978-0-321-94786-0', 'Đồi gió hú', 'Revo', 'img/img-index/doi_gio_hu.JPG', 'Tiểu thuyết tình cảm', 'Đồi gió hú là tiểu thuyết duy nhất của nữ nhà văn Emily Brontë, được xuất bản lần đầu năm 1847 dưới bút danh Ellis Bell. Lần xuất bản thứ hai của tác phẩm là sau khi Emily đã qua đời và lần xuất bản này được biên tập bởi chính chị gái của nhà văn là Charlotte Brontë.', '123.00', 6, 4),
('978-0-321-94786-10', 'a', 'a', 'img/img-index/KEAX71KG.jpg', 'a', 'a', '1.00', 1, 4),
('978-0-321-94786-2', 'Mẹ ơi con chưa chết', 'Thảo Trang', 'img/img-index/kinh_di.JPG', 'Truyện ma', 'Câu chuyện kinh dị về ngôi làng nhỏ , trong gia đình có 3 mẹ con. Người chồng đã mất khi đứa con 2 vừa sinh ra.', '200.00', 4, 3),
('978-0-321-94786-4', 'Tự Động Hóa PLC S7-1200 Với Tia Portal', 'Trần Văn Hiếu', 'img/img-index/book4.jpg', 'Vừa học vừa chơi', 'Tự Động Hóa PLC S7-1200 Với Tia Portal Trong lần tái bản mới này, tác giả dành nhiều thời gian chỉnh sửa lỗi chính tả, một số sai sót khác và bổ sung thêm nội dung như: Recipe, Data log, những cập nhật thông tin mới cho dòng sản phẩm PLC S7 - 1200 với Firmware CPU và phần mềm TIA Portal mới nhất', '312.00', 1, 4),
('978-0-7303-1484-4', 'Xây Dựng Web Cùng Một Lúc Trên Ba Ngôn Ngữ ', 'Đậu Quang Tuấn  ', 'img/img-index/book10.jpg', 'Học tập', '﻿Nội dung của tập sách sẽ hướng dẫn các bạn thiết kế được những trang Web phục vụ cho công việc của mình. Nghiên cứu tập sách này, chắc chắn các bạn sẽ cảm thấy hài lòng, những kiến thức hướng dẫn trong các trang Web mẫu sẽ giúp các bạn tự thiết kế những trang Web khác một cách dễ dàng và các bạn có thể nghiên cứu thêm để thiết kế những trang Web mang tính chuyên nghiệp. Hy vọng tập sách này sẽ là động cơ thúc đẩy các bạn yêu thích lập trình Web và sẽ đưa các bạn tiến sâu hơn trên con đường tin học của mình.\r\n\r\n', '51.00', 5, 3),
('978-1-118-94924-5', 'Tớ Học Lập Trình - Làm Quen Với Lập Trình Scratch', 'Louie Stowell   Rosie Dickins   Jonathan Melmoth  ', 'img/img-index/book7.jpg', 'Vừa học vừa chơi', 'Cẩm nang hướng dẫn hoàn chỉnh và đơn giản nhất dành cho bạn trẻ bắt đầu học lập trình\r\nNgôn ngữ lập trình Scratch đặc biệt phù hợp cho bạn trẻ mới học, vì tính tương tác trực quan, đồ họa sống động, ra sản phẩm liền tay mà vẫn đảm bảo khoa học và liên thông tri thức sau này.\r\nChỉ cần nắm và kéo các khối lệnh đầy màu sắc có sẵn để lắp ghép thành một kịch bản điều khiển các đối tượng trên màn hình.\r\nKhông có những dòng lệnh logic khô cứng và dễ lỗi, những khái niệm kỹ thuật khó hiểu, những quy tắc luật lệ chằng chịt và mệt mỏi trong các ngôn ngữ lập trình kiểu người lớn.', '89.00', 2, 4),
('978-1-1180-2669-4', 'Lập Trình Giao Diện Người Và Máy - HMI ', 'Trần Thu Hà Phạm Quang Huy  ', 'img/img-index/book9.jpg', 'Vừa học vừa chơi', 'Nội dung cuốn sách bao gồm:\r\nChương 1: Tổng quan về Wincc\r\nChương 2: Soạn thảo dự án trong Wincc\r\nChương 3: Sử dụng Tag Logging\r\nChương 4: Tìm hiểu Alarm logging\r\nChương 5: Thực hành\r\nĐiều khiển và giám sát bồn nước\r\nĐiều khiển băng chuyền\r\nĐiều khiển và giám sát trạm trộn bê tông\r\nDây chuyền sản xuất sữa ngô', '59.00', 4, 4),
('978-1-44937-075-6', 'Phân Tích Dữ Liệu Với R - Hỏi Và Đáp', 'Nguyễn Văn Tuấn  ', 'img/img-index/book6.jpg', 'Học tập', 'Cuốn sách bạn đang cầm trên tay là một nỗ lực nhằm giới thiệu các phương pháp phân tích mô hình và thống kê phổ biến. các phương pháp gồm mô hình hồi qui tuyết tính, hồi qui logistic, phân tích tổng hợp (meta - anlysis), mô hình phân tích sống còn (survival anlysis), phương pháp phân tích chuỗi dữ liệu theo thời gian (time series data), phương pháp bayes, phương pháp bootstrap... Với nội dung đa dạng như thế, cuốn sách này sẽ giúp ích cho các nhà nghiên cứu, giảng viên cao đẳng và đại học, sinh viên, hay bất cứ ai muốn học về thống kê và phương pháp phân tích dữ liệu.\r\n\r\n \r\n\r\nNgôn ngữ được sử dụng trong sách là R. Có nhiều lý do R được chọn làm ngôn ngữ để thực hiên các phương pháp trên, kể cả sự miễn phí và năng lực khoa học. Không giống như các phần miềm thương mại khác đều tốn khá  nhiều tiền, R hoàn toàn miễn phí. Bất cứ ai ở bất cứ nơi nào trên thế giới có truy cập mạng internet điều có thể tải R về máy tính, tốn vài phút cài đặt , và bắt đầu sử dụng. Trước đây, chỉ có một thiểu số nhà nghiên cứu (chủ yếu là các nước tiên tiến) mới có điều kiện sử dụng phần mềm thống kê, nhưng từ ngày có R thì bất cứ ai cũng đều có điều kiện áp dụng những phương pháp phân tích tinh vi nhất và hiện đại nhất cho nghiên cứu khoa học và phân tích dữ liệu. Do đó, sự ra đời của R đã làm cuộc cách mạng thống kê ở qui mô toàn cầu. R còn \"dân chủ hóa\" việc tiếp cận các phương pháp phân tích dữ liệu tiên tiến nhất trên thế giới.', '153.00', 3, 4),
('978-1-4571-0402-2', 'Stem - Học Viện Lập Trình Viên', 'Steve Martin  ', 'img/img-index/book12.jpg', 'Vừa học vừa chơi', 'Bạn có biết rằng các lập trình viên có thể viết những chương trình điều khiển người máy, lập trình ô tô không người lái và đưa tên lửa vào không gian?\r\nTại Học viện Lập trình viên, bạn sẽ đi những bước đầu tiên trên con đường trở thành như họ. Bạn sẽ học cách tạo ra âm nhạc, trò chơi, trang Web và hoạt hình. Bạn sẽ học về cách mà máy tính suy nghĩ, cách để ra lệnh cho chúng, cách sử dụng Scratch, viết mã HTML cùng nhiều thứ khác.\r\nNào, bật máy tính lên và sẵn sàng lập trình thôi!\r\nSử dụng Simon trong “THỬ THÁCH LẬP TRÌNH NGƯỜI MÁY” ở phần sau cuốn sách.', '76.50', 6, 4),
('978-1-484217-26-9', 'Lập Trình Viên - Phù Thủy Thế Giới Mạng', 'Jane (J.M) Bedell  ', 'img/img-index/book5.jpg', 'Học tập', 'Grammar Gateway Intermediate là sách ngữ pháp Tiếng Anh trung cấp giúp người học có thể nâng cao trình độ của mình thông qua các bài tập ngữ pháp chuyên sâu.\r\nCuốn sách này bao gồm 110 bài học về các chủ điểm ngữ pháp quan trọng nhất được đưa ra sau quá trình phân tích và quan sát cách người bản ngữ sử dụng Tiếng Anh. Mỗi bài học gói gọn trong 2 trang sách, ở trang bên trái là phần lý thuyết được giải thích một cách rõ ràng và dễ hiểu còn ở trang bên phải là phần bài tập được đưa ra để người học có thể luyện tập những kiến thức ngữ pháp mình vừa được học. Đây đều là những bài học ngữ pháp được trình bày một cách đơn giản sử dụng các ví dụ minh họa sinh động thay vì sử dụng các thuật ngữ khó hiểu, giúp những người đang gặp khó khăn trong việc học ngữ pháp tìm được hứng thú học tập. Ngoài ra bộ sách này cũng giúp cho người học có thể rèn luyện các kĩ năng khác như kĩ năng viết và kĩ năng nói thông qua các ví dụ gần gũi với đời sống thường nhật và các loại bài tập phong phú. Việc luyện tập thêm với bài tập online miễn phí trên trang web (www.HackersIngang.com) cũng sẽ mang lại hiệu quả trong việc luyện tập thêm hai kĩ năng này.', '160.00', 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books_add`
--

CREATE TABLE `books_add` (
  `book_ad_id` int(10) NOT NULL,
  `book_title` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_author` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_image` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_descr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `date_add` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_ship` timestamp NOT NULL DEFAULT current_timestamp(),
  `ship_address` char(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `amount` decimal(6,2) DEFAULT 0.00,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `orderid` int(10) NOT NULL,
  `book_isbn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` float DEFAULT 0,
  `quantity` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publisher`
--

CREATE TABLE `publisher` (
  `publisherid` int(10) NOT NULL,
  `publisher_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hotline` varchar(12) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `publisher`
--

INSERT INTO `publisher` (`publisherid`, `publisher_name`, `email`, `hotline`, `location`) VALUES
(1, 'Nhà xuất bản Tiền Phong', 'tienphong@gmail.com', '0382964712', 'Hà Nội'),
(2, 'Nhà xuất bản Hồng Ngoại', 'hongngoai@gmail.com', '0397379273', 'Hải Phòng'),
(3, 'Nhà xuất bản Việt Nam', 'vn@gmail.com', '0238726384', 'Hồ Chí Minh'),
(4, 'Nhà xuất bản Hà Nôi', 'hanoi1@gmail.com', '0283746352', 'Hồ Tây Hà Nội'),
(5, 'Nhà xuất bản Hà Hải', 'hahai@gmail.com', '0392837461', 'Ninh Bình'),
(6, 'Nhà xuất bản Hữu Nghị', 'huunghi@gmail.com', '02837162734', 'Hà Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` datetime DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userid`, `first_name`, `last_name`, `email`, `password`, `registration_date`, `status`, `code`, `avatar`, `address`, `city`) VALUES
(2, 'Tô', 'Hương Linh', 'huonglinhlinh095@gmail.com', '$2y$10$YmJV217/sj/o5GaxT8MCAO8N0IM0rd4acHJ8hfkFuMitFIfI3pZq6', NULL, 1, NULL, 'img/img_user/5.jpg', '1', 'hn'),
(4, 'Lê', 'Trang', 'lephuongtrang@gmail.com', '$2y$10$mPueyW8NLa7dEwgKg9U2AOdqtFkz8wOmSfLJJ7dA9.hpgvp8E1C0a', NULL, 1, NULL, 'img/img_user/7.jpg', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAd`),
  ADD KEY `admin_ibfk_1` (`id_Addministrators`);

--
-- Chỉ mục cho bảng `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id_Addministrators`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_isbn`),
  ADD KEY `publisherid` (`publisherid`),
  ADD KEY `books_ibfk_2` (`idAd`);

--
-- Chỉ mục cho bảng `books_add`
--
ALTER TABLE `books_add`
  ADD PRIMARY KEY (`book_ad_id`),
  ADD KEY `userid` (`userid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `userid` (`userid`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `orderid` (`orderid`),
  ADD KEY `book_isbn` (`book_isbn`);

--
-- Chỉ mục cho bảng `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idAd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id_Addministrators` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `books_add`
--
ALTER TABLE `books_add`
  MODIFY `book_ad_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisherid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_Addministrators`) REFERENCES `administrators` (`id_Addministrators`);

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`publisherid`) REFERENCES `publisher` (`publisherid`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`idAd`) REFERENCES `admin` (`idAd`);

--
-- Các ràng buộc cho bảng `books_add`
--
ALTER TABLE `books_add`
  ADD CONSTRAINT `books_add_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`book_isbn`) REFERENCES `books` (`book_isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
