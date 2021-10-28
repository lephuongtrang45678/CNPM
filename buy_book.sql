-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 05:43 PM
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
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(40) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`name`, `pass`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `book_isbn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `book_title` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_author` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_image` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_descr` text CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `book_price` decimal(6,2) NOT NULL,
  `publisherid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`book_isbn`, `book_title`, `book_author`, `book_image`, `book_descr`, `book_price`, `publisherid`) VALUES
('978-0-321-94786-4', 'Tự Động Hóa PLC S7-1200 Với Tia Portal', 'Trần Văn Hiếu', 'book4.jpg', 'Tự Động Hóa PLC S7-1200 Với Tia Portal Trong lần tái bản mới này, tác giả dành nhiều thời gian chỉnh sửa lỗi chính tả, một số sai sót khác và bổ sung thêm nội dung như: Recipe, Data log, những cập nhật thông tin mới cho dòng sản phẩm PLC S7 - 1200 với Firmware CPU và phần mềm TIA Portal mới nhất', '312.00', '1'),
('978-0-7303-1484-4', 'Xây Dựng Web Cùng Một Lúc Trên Ba Ngôn Ngữ ', 'Đậu Quang Tuấn  ', 'book10.jpg', '﻿Nội dung của tập sách sẽ hướng dẫn các bạn thiết kế được những trang Web phục vụ cho công việc của mình. Nghiên cứu tập sách này, chắc chắn các bạn sẽ cảm thấy hài lòng, những kiến thức hướng dẫn trong các trang Web mẫu sẽ giúp các bạn tự thiết kế những trang Web khác một cách dễ dàng và các bạn có thể nghiên cứu thêm để thiết kế những trang Web mang tính chuyên nghiệp. Hy vọng tập sách này sẽ là động cơ thúc đẩy các bạn yêu thích lập trình Web và sẽ đưa các bạn tiến sâu hơn trên con đường tin học của mình.\r\n\r\n', '51.00', '5'),
('978-1-118-94924-5', 'Tớ Học Lập Trình - Làm Quen Với Lập Trình Scratch', 'Louie Stowell   Rosie Dickins   Jonathan Melmoth  ', 'book7.jpg', 'Cẩm nang hướng dẫn hoàn chỉnh và đơn giản nhất dành cho bạn trẻ bắt đầu học lập trình\r\nNgôn ngữ lập trình Scratch đặc biệt phù hợp cho bạn trẻ mới học, vì tính tương tác trực quan, đồ họa sống động, ra sản phẩm liền tay mà vẫn đảm bảo khoa học và liên thông tri thức sau này.\r\nChỉ cần nắm và kéo các khối lệnh đầy màu sắc có sẵn để lắp ghép thành một kịch bản điều khiển các đối tượng trên màn hình.\r\nKhông có những dòng lệnh logic khô cứng và dễ lỗi, những khái niệm kỹ thuật khó hiểu, những quy tắc luật lệ chằng chịt và mệt mỏi trong các ngôn ngữ lập trình kiểu người lớn.', '89.00', '2'),
('978-1-1180-2669-4', 'Lập Trình Giao Diện Người Và Máy - HMI ', 'Trần Thu Hà Phạm Quang Huy  ', 'book9.jpg', 'Nội dung cuốn sách bao gồm:\r\nChương 1: Tổng quan về Wincc\r\nChương 2: Soạn thảo dự án trong Wincc\r\nChương 3: Sử dụng Tag Logging\r\nChương 4: Tìm hiểu Alarm logging\r\nChương 5: Thực hành\r\nĐiều khiển và giám sát bồn nước\r\nĐiều khiển băng chuyền\r\nĐiều khiển và giám sát trạm trộn bê tông\r\nDây chuyền sản xuất sữa ngô', '59.00', '4'),
('978-1-44937-075-6', 'Phân Tích Dữ Liệu Với R - Hỏi Và Đáp', 'Nguyễn Văn Tuấn  ', 'book6.jpg', 'Cuốn sách bạn đang cầm trên tay là một nỗ lực nhằm giới thiệu các phương pháp phân tích mô hình và thống kê phổ biến. các phương pháp gồm mô hình hồi qui tuyết tính, hồi qui logistic, phân tích tổng hợp (meta - anlysis), mô hình phân tích sống còn (survival anlysis), phương pháp phân tích chuỗi dữ liệu theo thời gian (time series data), phương pháp bayes, phương pháp bootstrap... Với nội dung đa dạng như thế, cuốn sách này sẽ giúp ích cho các nhà nghiên cứu, giảng viên cao đẳng và đại học, sinh viên, hay bất cứ ai muốn học về thống kê và phương pháp phân tích dữ liệu.\r\n\r\n \r\n\r\nNgôn ngữ được sử dụng trong sách là R. Có nhiều lý do R được chọn làm ngôn ngữ để thực hiên các phương pháp trên, kể cả sự miễn phí và năng lực khoa học. Không giống như các phần miềm thương mại khác đều tốn khá  nhiều tiền, R hoàn toàn miễn phí. Bất cứ ai ở bất cứ nơi nào trên thế giới có truy cập mạng internet điều có thể tải R về máy tính, tốn vài phút cài đặt , và bắt đầu sử dụng. Trước đây, chỉ có một thiểu số nhà nghiên cứu (chủ yếu là các nước tiên tiến) mới có điều kiện sử dụng phần mềm thống kê, nhưng từ ngày có R thì bất cứ ai cũng đều có điều kiện áp dụng những phương pháp phân tích tinh vi nhất và hiện đại nhất cho nghiên cứu khoa học và phân tích dữ liệu. Do đó, sự ra đời của R đã làm cuộc cách mạng thống kê ở qui mô toàn cầu. R còn \"dân chủ hóa\" việc tiếp cận các phương pháp phân tích dữ liệu tiên tiến nhất trên thế giới.', '153.00', '3'),
('978-1-4571-0402-2', 'Stem - Học Viện Lập Trình Viên', 'Steve Martin  ', 'book12.jpg', 'Bạn có biết rằng các lập trình viên có thể viết những chương trình điều khiển người máy, lập trình ô tô không người lái và đưa tên lửa vào không gian?\r\nTại Học viện Lập trình viên, bạn sẽ đi những bước đầu tiên trên con đường trở thành như họ. Bạn sẽ học cách tạo ra âm nhạc, trò chơi, trang Web và hoạt hình. Bạn sẽ học về cách mà máy tính suy nghĩ, cách để ra lệnh cho chúng, cách sử dụng Scratch, viết mã HTML cùng nhiều thứ khác.\r\nNào, bật máy tính lên và sẵn sàng lập trình thôi!\r\nSử dụng Simon trong “THỬ THÁCH LẬP TRÌNH NGƯỜI MÁY” ở phần sau cuốn sách.', '76.50', '6'),
('978-1-484217-26-9', 'Lập Trình Viên - Phù Thủy Thế Giới Mạng', 'Jane (J.M) Bedell  ', 'book5.jpg', 'Grammar Gateway Intermediate là sách ngữ pháp Tiếng Anh trung cấp giúp người học có thể nâng cao trình độ của mình thông qua các bài tập ngữ pháp chuyên sâu.\r\nCuốn sách này bao gồm 110 bài học về các chủ điểm ngữ pháp quan trọng nhất được đưa ra sau quá trình phân tích và quan sát cách người bản ngữ sử dụng Tiếng Anh. Mỗi bài học gói gọn trong 2 trang sách, ở trang bên trái là phần lý thuyết được giải thích một cách rõ ràng và dễ hiểu còn ở trang bên phải là phần bài tập được đưa ra để người học có thể luyện tập những kiến thức ngữ pháp mình vừa được học. Đây đều là những bài học ngữ pháp được trình bày một cách đơn giản sử dụng các ví dụ minh họa sinh động thay vì sử dụng các thuật ngữ khó hiểu, giúp những người đang gặp khó khăn trong việc học ngữ pháp tìm được hứng thú học tập. Ngoài ra bộ sách này cũng giúp cho người học có thể rèn luyện các kĩ năng khác như kĩ năng viết và kĩ năng nói thông qua các ví dụ gần gũi với đời sống thường nhật và các loại bài tập phong phú. Việc luyện tập thêm với bài tập online miễn phí trên trang web (www.HackersIngang.com) cũng sẽ mang lại hiệu quả trong việc luyện tập thêm hai kĩ năng này.', '160.00', '2'),
('978-1-49192-706-9', 'Phân Tích Dữ Liệu Với R (Tái Bản 2020)', 'GS. TS. Nguyễn Văn Tuấn  ', 'book8.jpg', 'Cuốn sách bạn đang cầm trên tay là một nổ lực nhằm giới thiệu các phương pháp phân tích mô hình và thống kê phổ biến. các phương pháp gồm mô hình hồi qui tuyết tính, hồi qui logistic, phân tích tổng hợp (meta - anlysis), mô hình phân tích sống còn (survival anlysis), phương pháp phân tích chuỗi dữ liệu theo thời gian (time series data) phương pháp bayes, phương pháp bootstrap, v.v.. Với một nội dung khá rộng như thế, cuốn sách này sẽ giúp ích cho các nhà nghiên cứu, giảng viên cao đẳng và đại học, sinh viên, hay bất cứ ai muốn học về thống kê và phương pháp phân tích dữ liệu.\r\nNgôn ngữ được sử dụng trong sách là R. Có nhiều lý do R được chọn làm ngôn ngữ để thực hiên các phương pháp trên, kể cả sự miễn phí và năng lực khoa học. Không giống như các phần miềm thương mại khác đều tốn khá  nhiều tiền, R hoàn toàn miễn phí. Bất cứ ai ở bất cứ nơi nào trên thế giới có truy cập mạng internet điều có thể tải R về máy tính, tốn vài phút cài đặt , và bắt đầu sử dụng. Trước đây, chỉ có một thiểu số nhà nghiên cứu (chủ yếu là các nước tiên tiến) mới có điều kiện sử dụng phần mềm thống kê, nhưng từ ngày có R thì bất cứ ai cũng đều có điều kiện áp dụng những phương pháp phân tích tinh vi nhất và hiện đại nhất cho nghiên cứu khoa học và phân tích dữ liệu. Do đó, sự ra đời của R đã làm cuộc cách mạng thống kê ở qui mô toàn cầu. R còn \"dân chủ hóa\" việc tiếp cận các phương pháp phân tích dữ liệu tiên tiến nhất trên thế giới.', '212.50', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books_add`
--

CREATE TABLE `books_add` (
  `book_isbn` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `book_title` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_author` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_image` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_descr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_price` decimal(6,2) NOT NULL,
  `publisherid` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customerid` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `city` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `zip_code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `city`, `zip_code`, `country`) VALUES
(1, 'a', 'a', 'a', 'a', 'a'),
(2, 'b', 'b', 'b', 'b', 'b'),
(3, 'test', '123 test', '12121', 'test', 'test'),
(4, 'janobe sourcecode', 'kab', 'kabankalan', '61211', 'Philippines');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ship_name` char(60) COLLATE latin1_general_ci NOT NULL,
  `ship_address` char(80) COLLATE latin1_general_ci NOT NULL,
  `ship_city` char(30) COLLATE latin1_general_ci NOT NULL,
  `ship_zip_code` char(10) COLLATE latin1_general_ci NOT NULL,
  `ship_country` char(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `date`, `ship_name`, `ship_address`, `ship_city`, `ship_zip_code`, `ship_country`) VALUES
(1, 1, '60.00', '2015-12-03 13:30:12', 'a', 'a', 'a', 'a', 'a'),
(2, 2, '60.00', '2015-12-03 13:31:12', 'b', 'b', 'b', 'b', 'b'),
(3, 3, '20.00', '2015-12-03 19:34:21', 'test', '123 test', '12121', 'test', 'test'),
(4, 1, '20.00', '2015-12-04 10:19:14', 'a', 'a', 'a', 'a', 'a'),
(5, 4, '80.00', '2020-10-23 00:28:15', 'janobe sourcecode', 'kab', 'kabankalan', '61211', 'Philippines'),
(6, 4, '20.00', '2020-10-24 11:01:03', 'janobe sourcecode', 'kab', 'kabankalan', '61211', 'Philippines');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `book_isbn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `item_price` decimal(6,2) NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`orderid`, `book_isbn`, `item_price`, `quantity`) VALUES
(1, '978-1-118-94924-5', '20.00', 1),
(1, '978-1-44937-019-0', '20.00', 1),
(1, '978-1-49192-706-9', '20.00', 1),
(2, '978-1-118-94924-5', '20.00', 1),
(2, '978-1-44937-019-0', '20.00', 1),
(2, '978-1-49192-706-9', '20.00', 1),
(3, '978-0-321-94786-4', '20.00', 1),
(1, '978-1-49192-706-9', '20.00', 1),
(5, '978-1-484217-26-9', '20.00', 4),
(5, '978-1-118-94924-5', '20.00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publisher`
--

CREATE TABLE `publisher` (
  `publisherid` int(10) UNSIGNED NOT NULL,
  `publisher_name` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Đang đổ dữ liệu cho bảng `publisher`
--

INSERT INTO `publisher` (`publisherid`, `publisher_name`) VALUES
(1, 'Wrox'),
(2, 'Wiley'),
(3, 'O\'Reilly Media'),
(4, 'Apress'),
(5, 'Packt Publishing'),
(6, 'Addison-Wesley');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userid` mediumint(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime DEFAULT current_timestamp(),
  `user_level` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `code` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userid`, `first_name`, `last_name`, `email`, `password`, `registration_date`, `user_level`, `status`, `code`, `avatar`) VALUES
(53, 'Lê', 'Phương Trang', 'lephuongtrang45678@gmail.com', '$2y$10$/NNQQbIcHUe0UBjwixkNJ.xhM.1QvDlJBeHsBIWQMqPJ25c9DyoJa', '2021-10-16 10:49:30', 0, 1, 'f93db365f3f52a54125c155466b3d5ff', 'admin-upload/3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`,`pass`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_isbn`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Chỉ mục cho bảng `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisherid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
