-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 02:27 AM
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
  `book_isbn` int(20) NOT NULL,
  `book_title` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_author` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_image` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_price` decimal(6,2) NOT NULL,
  `publisherid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`book_isbn`, `book_title`, `book_author`, `book_image`, `book_descr`, `book_price`, `publisherid`) VALUES
(1, 'C# 6.0 in a Nutshell, 6th Edition', 'Joseph Albahari, Ben Albahari', '1.jpg', '\r\n\r\nKhi bạn có thắc mắc về C # 6.0 hoặc .NET CLR và các cụm khung lõi của nó, hướng dẫn bán chạy nhất này có câu trả lời bạn cần. C # đã trở thành một ngôn ngữ linh hoạt và chiều rộng bất thường kể từ buổi ra mắt vào năm 2000, nhưng sự phát triển liên tục này có nghĩa là vẫn còn nhiều thứ để học hỏi. Tổ chức xung quanh các khái niệm và trường hợp sử dụng, phiên bản thứ sáu được cập nhật kỹ lưỡng này cung cấp các lập trình viên trung cấp và nâng cao với bản đồ ngắn gọn về kiến thức C # và .NET.\r\nTổ chức xung quanh các khái niệm và trường hợp sử dụng, phiên bản thứ sáu được cập nhật kỹ lưỡng này cung cấp các lập trình viên trung cấp và nâng cao với bản đồ ngắn gọn về kiến thức C # và .NET.\r\nOrganizing around concepts and use cases, this thoroughly updated sixth version provides intermediate and advanced programmers with a brief map of C # and .NET knowledge.\r\nTổ chức xung quanh các khái niệm và trường hợp sử dụng, phiên bản thứ sáu được cập nhật kỹ lưỡng này cung cấp các lập trình viên trung cấp và nâng cao với bản đồ súc tích của kiến thức C # và .NET.\r\nOrganizing around concepts and use cases, this thoroughly updated sixth version provides intermediate and advanced programmers with concise maps of C # and .NET knowledge.\r\n Lặn và khám phá lý do tại sao hướng dẫn Nutshell này được coi là tài liệu tham khảo dứt khoát trên C #. \r\nXem thêm về văn bản nguồn này. Nhập văn bản nguồn để có thông tin dịch thuật bổ sung\r\n', '135.20', 6),
(2, 'Doing Good By Doing Good', 'Peter Baines', '2.jpg', 'Làm tốt bằng cách thực hiện các chương trình tốt làm thế nào để cải thiện điểm mấu chốt bằng cách thực hiện một chương trình hấp dẫn, xác thực và nâng cao kinh doanh giúp nhân viên và doanh nghiệp phát triển mạnh. Tư vấn CSR quốc tế Peter Baines rút ra những bài học kinh nghiệm từ những thách thức phải đối mặt trong sự nghiệp của mình với tư cách là một sĩ quan cảnh sát, điều tra viên pháp y và người sáng lập hai người trên mặt nước để mô tả cảnh quan CSR của Úc, và các yếu tố tạo nên một chương trình mang lại lợi ích cho mọi người tham gia . Nghiên cứu trường hợp minh họa hiệu quả thực sự của CSR đối với cả doanh nghiệp và xã hội, với hướng dẫn rõ ràng theo hướng tối đa hóa sự tham gia, tham gia tất cả nhân viên và cải thiện điểm mấu chốt. Các nghiên cứu trường hợp rút ra các công ty đang tập trung vào việc tạo ra giá trị chung trong việc đáp ứng những thách thức của xã hội trong khi đồng thời mang lại lợi nhuận kinh tế mạnh mẽ.\r\n\r\nNgười tiêu dùng hiện đang mong đợi rằng các doanh nghiệp lớn với lợi nhuận ngày càng tăng mang lại cho cộng đồng mà những lợi nhuận phát sinh. Đồng thời, các cổ đông đang yêu cầu chia sẻ của họ và rất vui khi thấy cổ tức bay lên. Bắt đúng cách này là một hành động cân bằng, và làm tốt bằng cách làm tốt giúp các công ty phân định một kế hoạch hành động để hoàn thành nó.', '20.00', 2),
(3, 'Programmable Logic Controllers', 'Dag H. Hanssen', '3.jpg', 'Được sử dụng rộng rãi trên tự động hóa công nghiệp và sản xuất, bộ điều khiển logic lập trình (PLC) thực hiện một loạt các tác vụ cơ điện với nhiều thỏa thuận đầu vào và đầu ra, được thiết kế đặc biệt để đối phó với các điều kiện môi trường nghiêm trọng như các nhà máy ô tô và hóa học. Bộ điều khiển logic có khả năng: một cách tiếp cận thực tế Sử dụng CodeSys là một hướng dẫn thực hành để nhanh chóng đạt được trình độ phát triển và hoạt động của các PLC dựa trên tiêu chuẩn IEC 61131-3. Sử dụng mã công cụ phần mềm * có sẵn miễn phí, được sử dụng rộng rãi trong các dự án tự động hóa thiết kế công nghiệp, tác giả có cách tiếp cận thực tế cao đối với thiết kế PLC bằng các ví dụ trong thế giới thực. Công cụ thiết kế, CodeSys, cũng có tính năng tích hợp trong trình giả lập / PLC mềm cho phép người đọc thực hiện các bài tập và kiểm tra các ví dụ.', '120.00', 2),
(4, 'Android Studio New Media Fundamentals', 'Wallace Jackson', '4.jpg', 'Android Studio Các phương tiện truyền thông mới là một phương tiện truyền thông mới bao gồm các khái niệm trung tâm đối với sản xuất đa phương tiện cho Android bao gồm hình ảnh kỹ thuật số, âm thanh kỹ thuật số, video kỹ thuật số, minh họa kỹ thuật số và 3D, sử dụng các gói phần mềm nguồn mở như GIMP, Audacity, Blender và Inkscape. Các gói phần mềm chuyên nghiệp này được sử dụng cho cuốn sách này vì chúng được tự do sử dụng thương mại. Cuốn sách xây dựng dựa trên các khái niệm nền tảng của Raster, vector và dạng sóng (âm thanh) và tiến bộ hơn như các chương tiến triển, bao gồm những tài sản phương tiện mới nào là tốt nhất để sử dụng với Android Studio cũng như các yếu tố chính liên quan đến quá trình làm việc tối ưu hóa dấu chân dữ liệu Và tại sao nội dung phương tiện mới và tối ưu hóa dữ liệu phương tiện mới rất quan trọng.', '120.00', 4),
(5, 'Professional JavaScript for Web Developers, 3rd Edition', 'Nicholas C. Zakas', '5.jpg', 'Nếu bạn muốn đạt được tiềm năng đầy đủ của JavaScript, điều quan trọng là phải hiểu bản chất, lịch sử và hạn chế của nó. Cuối cùng, phiên bản cập nhật của cặp người bán chạy nhất này bởi tác giả cựu chiến binh và JavaScript Guru Nicholas C. Zakas bao gồm JavaScript từ khi bắt đầu các hóa thân trong ngày nay bao gồm DOM, AJAX và HTML5. Zakas chỉ cho bạn cách mở rộng ngôn ngữ mạnh mẽ này để đáp ứng các nhu cầu cụ thể và tạo giao diện người dùng động cho web làm mờ dòng giữa máy tính để bàn và internet. Vào cuối cuốn sách, bạn sẽ hiểu rõ về những tiến bộ đáng kể trong phát triển web vì chúng liên quan đến JavaScript để bạn có thể áp dụng chúng vào trang web tiếp theo của mình.', '120.00', 1),
(6, 'Learning Web App Development', 'Semmy Purewal', '6.jpg', 'Nắm bắt các nguyên tắc cơ bản của phát triển ứng dụng web bằng cách xây dựng một ứng dụng được hỗ trợ cơ sở dữ liệu đơn giản từ đầu, sử dụng HTML, JavaScript và các công cụ nguồn mở khác. Thông qua các hướng dẫn thực hành, hướng dẫn thực tế này cho thấy các nhà phát triển ứng dụng web thiếu kinh nghiệm Cách tạo giao diện người dùng, hãy viết một máy chủ, xây dựng giao tiếp máy khách và sử dụng dịch vụ dựa trên đám mây để triển khai ứng dụng.\r\n\r\nMỗi chương bao gồm các vấn đề thực hành, ví dụ đầy đủ và mô hình tinh thần của quy trình công việc phát triển. Lý tưởng cho một khóa học cấp đại học, cuốn sách này giúp bạn bắt đầu phát triển ứng dụng web bằng cách cung cấp cho bạn một nền tảng vững chắc trong quá trình này.', '120.00', 3),
(7, 'Beautiful JavaScript', 'Anton Kovalyov', '7.jpg', 'JavaScript được cho là ngôn ngữ lập trình phân cực và hiểu sai nhất trên thế giới. Nhiều người đã cố gắng thay thế nó làm ngôn ngữ của web, nhưng JavaScript đã sống sót, phát triển và phát triển mạnh. Tại sao một ngôn ngữ được tạo ra trong quá vội vàng như vậy thành công mà người khác thất bại?\r\n\r\nHướng dẫn này cung cấp cho bạn một cái nhìn hiếm hoi thành JavaScript từ những người quen thuộc với nó. Các chương được đóng góp bởi các chuyên gia tên miền như Jacob Thornton, Ariya Hidayat, và Sara Chipp cho thấy những gì họ yêu thích về ngôn ngữ yêu thích của họ - cho dù đó là biến các tính năng đáng sợ nhất thành các công cụ hữu ích hoặc cách JavaScript có thể được sử dụng để tự biểu hiện.', '120.00', 3),
(8, 'Professional ASP.NET 4 in C# and VB', 'Scott Hanselman', '8.jpg', 'ASP.NET là về việc khiến bạn tạo hiệu quả nhất có thể khi xây dựng các ứng dụng web nhanh chóng và an toàn. Mỗi bản phát hành ASP.NET sẽ tốt hơn và loại bỏ rất nhiều mã tẻ nhạt mà trước đây bạn cần phải đặt, tạo các tác vụ ASP.NET phổ biến dễ dàng hơn. Với cuốn sách này, một đội ngũ tác giả tuyệt vời đã hướng dẫn bạn vượt qua toàn bộ bề rộng của ASP.NET và các khả năng mới và thú vị của ASP.NET 4. Các tác giả cũng chỉ cho bạn cách tối đa hóa sự phong phú của các tính năng mà ASP.NET cung cấp để thực hiện quá trình phát triển của bạn mượt mà và hiệu quả hơn.', '120.00', 1);

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
