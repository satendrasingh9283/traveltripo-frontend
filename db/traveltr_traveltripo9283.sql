-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2026 at 07:25 PM
-- Server version: 10.11.15-MariaDB-cll-lve
-- PHP Version: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveltr_traveltripo9283`
--

-- --------------------------------------------------------

--
-- Table structure for table `advanture_booking`
--

CREATE TABLE `advanture_booking` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `no_of_person` int(200) NOT NULL,
  `days` int(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advanture_list`
--

CREATE TABLE `advanture_list` (
  `id` int(100) NOT NULL,
  `city` varchar(200) NOT NULL,
  `advanture_name` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `advanture_type` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `images` varchar(200) NOT NULL,
  `number` int(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `video` varchar(300) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `privacy` varchar(5000) NOT NULL,
  `date` date NOT NULL,
  `status` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `checkin_date` date NOT NULL,
  `no_of_person` int(200) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`id`, `name`, `email`, `checkin_date`, `no_of_person`, `room_type`, `amount`, `status`) VALUES
(240, 'FlatMojo', 'satendrasingh9283@gmail.com', '2026-06-25', 4, 'double', 12, '1'),
(239, 'Rett', 'rinkugreat007@gmail.com', '2026-05-19', 2, 'double', 900, '1'),
(238, 'FlatMojo', 'satendrasingh9283@gmail.com', '2026-06-03', 1, '', 900, '1'),
(236, '', '', '0000-00-00', 0, '', 900, '1'),
(237, 'Testyy', 'rinkugreat007@gmail.com', '2026-05-24', 4, 'double', 900, '1');

-- --------------------------------------------------------

--
-- Table structure for table `city_data`
--

CREATE TABLE `city_data` (
  `id` varchar(100) NOT NULL,
  `city` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city_data`
--

INSERT INTO `city_data` (`id`, `city`, `status`) VALUES
('city_23053', 'Mussoorie', 'active'),
('city_33324', 'Manali', 'active'),
('city_52778', 'Shimla', 'active'),
('city_62517', 'Kerala', 'active'),
('city_72419', 'Goa', 'active'),
('city_90080', 'Kashmir', 'active'),
('city_95348', 'Rishikesh', 'active'),
('city_95684', 'Nanital', 'active'),
('city_95978', 'Ladhak', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_list`
--

CREATE TABLE `hotel_list` (
  `id` varchar(11) NOT NULL,
  `property_type` varchar(100) NOT NULL,
  `city` varchar(200) NOT NULL,
  `name` char(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `number` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `images` varchar(5000) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `property_for` char(200) NOT NULL,
  `landmark` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `checkin_time` varchar(200) NOT NULL,
  `car_parking` varchar(200) NOT NULL,
  `swiming_pool` varchar(200) NOT NULL,
  `indoor_gym` varchar(200) NOT NULL,
  `air_condition` varchar(100) NOT NULL,
  `fridge` varchar(200) NOT NULL,
  `attached_washroom` varchar(200) NOT NULL,
  `microwave` varchar(200) NOT NULL,
  `discription` varchar(20000) NOT NULL,
  `video` text NOT NULL,
  `map` varchar(6000) NOT NULL,
  `policy` varchar(2000) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hotel_list`
--

INSERT INTO `hotel_list` (`id`, `property_type`, `city`, `name`, `address`, `number`, `email`, `images`, `room_type`, `property_for`, `landmark`, `price`, `checkin_time`, `car_parking`, `swiming_pool`, `indoor_gym`, `air_condition`, `fridge`, `attached_washroom`, `microwave`, `discription`, `video`, `map`, `policy`, `status`) VALUES
('hotel_11080', '', 'Shimla', ' Hotel Aachman Regency', ' Kachi Ghati, Shimla', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f2297ca0f41.25382468.webp\",\"uploads/hotel_img_6a1f2298060165.38575548.webp\",\"uploads/hotel_img_6a1f22985f99b4.20997022.avif\",\"uploads/hotel_img_6a1f2298833872.83938806.avif\",\"uploads/hotel_img_6a1f22989ae659.69412714.avif\",\"uploads/hotel_img_6a1f2298a61f78.18974537.avif\",\"uploads/hotel_img_6a1f2298be4d94.73117149.webp\",\"uploads/hotel_img_6a1f229932ed60.89982485.avif\"]', 'Standard Room', 'All', 'main-city', 2800, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3416.5605490685916!2d77.13945389999999!3d31.0941487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzHCsDA1JzM4LjkiTiA3N8KwMDgnMjIuMCJF!5e0!3m2!1sen!2sin!4v1780425349626!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_11950', '', 'Goa', 'The Camelot Resort', 'Calangute, Goa', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f25bf4090b5.22988033.webp\",\"uploads/hotel_img_6a1f25bf4e4215.94807633.avif\",\"uploads/hotel_img_6a1f25bf59bad2.53665722.jpg\",\"uploads/hotel_img_6a1f25bf80cad8.51038908.webp\",\"uploads/hotel_img_6a1f25bf9d5c23.51542365.webp\",\"uploads/hotel_img_6a1f25bfbae6e1.98472104.webp\",\"uploads/hotel_img_6a1f25bfc794e5.10846490.jpg\",\"uploads/hotel_img_6a1f25c004c556.54249039.avif\"]', 'Standard Room', 'All', 'main-city', 1500, '12:AM', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3843.7081845832336!2d73.75869329999999!3d15.5537667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTXCsDMzJzEzLjYiTiA3M8KwNDUnMzEuMyJF!5e0!3m2!1sen!2sin!4v1780426149131!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_15230', '', 'Kerala', 'Hotel Nilkanth', ' Salangpur, Bhavnagar', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f2aa4b34ca2.19174544.jpg\",\"uploads/hotel_img_6a1f2aa4e08141.27392970.jpg\",\"uploads/hotel_img_6a1f2aa53cb1a2.37254141.jpg\",\"uploads/hotel_img_6a1f2aa56a5429.41067782.jpg\",\"uploads/hotel_img_6a1f2aa598f6e6.32994982.jpg\"]', 'Standard Room', 'All', 'main-city', 2500, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3698.737337866833!2d71.572847!3d22.021373000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjLCsDAxJzE2LjkiTiA3McKwMzQnMjIuMyJF!5e0!3m2!1sen!2sin!4v1780427349087!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n\r\n', 'active'),
('hotel_16879', '', 'Rishikesh', 'Shiv Ganaga Hotels', ' Tapovan, Rishikesh', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1e870e2d11f8.51499244.avif\",\"uploads/hotel_img_6a1e870e2d44b7.39978833.avif\",\"uploads/hotel_img_6a1e870e2d7a57.94350310.avif\",\"uploads/hotel_img_6a1e870e2d8c64.63403759.avif\"]', 'Standard Room', 'All', 'near-river', 2250, '12:AM', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', '', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3450.6823761690916!2d78.323646!3d30.131901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDA3JzU0LjgiTiA3OMKwMTknMjUuMSJF!5e0!3m2!1sen!2sin!4v1780385528841!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting your personal information. We collect only the information necessary to provide hotel bookings, travel services, customer support, and website improvements. Your data may include your name, contact details, booking preferences, and payment information. We use secure technologies to safeguard your information and do not sell your personal data to third parties. Information may be shared only with trusted partners required to complete your bookings or comply with legal obligations. By using our website and services, you agree to the collection and use of information as outlined in this Privacy Policy.\r\n', 'active'),
('hotel_19484', 'Hotels', 'Kashmir', 'Hotel Mirage', 'Raj Bagh, Srinagar', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f2c82636725.75770021.jpg\",\"uploads/hotel_img_6a1f2c83831497.91965150.jpg\",\"uploads/hotel_img_6a1f2c847f6894.70324769.jpg\",\"uploads/hotel_img_6a1f2c8489ce88.29720196.jpg\",\"uploads/hotel_img_6a1f2c853b0368.95543097.avif\",\"uploads/hotel_img_6a1f2c8598fc89.42149558.avif\",\"uploads/hotel_img_6a1f2c860dd329.36680584.avif\",\"uploads/hotel_img_6a1f2c862b5564.58677343.webp\"]', 'Standard Room', 'All', 'main-city', 5500, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', 'undefined', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3305.1225539603474!2d74.8262148!3d34.0663725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzTCsDAzJzU4LjkiTiA3NMKwNDknMzQuNCJF!5e0!3m2!1sen!2sin!4v1780427886174!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_31991', '', 'Shimla', 'Hotel Ganga', 'Shoghi, Shimla', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f206c60e418.10225153.webp\",\"uploads/hotel_img_6a1f206c96c3c2.65652177.webp\",\"uploads/hotel_img_6a1f206d171a57.25121274.webp\",\"uploads/hotel_img_6a1f206d47e9a3.30960933.avif\",\"uploads/hotel_img_6a1f206d6fb2b1.90913282.avif\",\"uploads/hotel_img_6a1f206dacfc95.70662218.webp\",\"uploads/hotel_img_6a1f206e142d97.53663558.webp\",\"uploads/hotel_img_6a1f206e6dc6d8.11663344.avif\"]', 'Standard Room', 'All', 'main-city', 1800, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3416.145859460431!2d77.16555830000001!3d31.1056778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzHCsDA2JzIwLjQiTiA3N8KwMDknNTYuMCJF!5e0!3m2!1sen!2sin!4v1780424782516!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_35207', 'Hotels', 'Nanital', 'Corbett Nivara Retret', 'Corbett, Nainital', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1ea6c9824f07.46550824.avif\",\"uploads/hotel_img_6a1ea6c99974d5.63669669.jpg\",\"uploads/hotel_img_6a1ea6c9ca86f9.01584900.jpg\",\"uploads/hotel_img_6a1ea6ca0d4fe2.13315356.avif\",\"uploads/hotel_img_6a1ea6ca1cb162.80908289.webp\",\"uploads/hotel_img_6a1ea6ca41ccc9.98853209.avif\",\"uploads/hotel_img_6a1ea6ca59b836.00576699.webp\",\"uploads/hotel_img_6a1ea6ca768786.66043800.avif\",\"uploads/hotel_img_6a1ea6ca8a4e68.01962396.webp\"]', 'Standard Room', 'All', 'near-river', 0, '12:AM', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.', 'undefined', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3471.188339985378!2d78.934708!3d29.540008999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjnCsDMyJzI0LjAiTiA3OMKwNTYnMDUuMCJF!5e0!3m2!1sen!2sin!4v1780393653505!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_41026', '', 'Mussoorie', 'Hotel Filigree', ' Picture Palace, Mussoorie', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1e8f5a829d76.66796445.avif\",\"uploads/hotel_img_6a1e8f5a98f615.74676428.webp\",\"uploads/hotel_img_6a1e8f5add9218.05209417.avif\",\"uploads/hotel_img_6a1e8f5b1367a8.45910847.jpg\",\"uploads/hotel_img_6a1e8f5b299ed8.93588061.avif\",\"uploads/hotel_img_6a1e8f5b5f9935.51561164.avif\",\"uploads/hotel_img_6a1e8f5b9c2601.71968467.avif\",\"uploads/hotel_img_6a1e8f5bb586f8.06372793.avif\",\"uploads/hotel_img_6a1e8f5bcb8073.35150840.avif\"]', 'Standard Room', 'All', 'main-city', 3500, '12:AM', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3439.233190587938!2d78.0798714!3d30.4578325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDI3JzI4LjIiTiA3OMKwMDQnNDcuNSJF!5e0!3m2!1sen!2sin!4v1780387646509!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting your personal information. We collect only the information necessary to provide hotel bookings, travel services, customer support, and website improvements. Your data may include your name, contact details, booking preferences, and payment information. We use secure technologies to safeguard your information and do not sell your personal data to third parties. Information may be shared only with trusted partners required to complete your bookings or comply with legal obligations. By using our website and services, you agree to the collection and use of information as outlined in this Privacy Policy.\r\n', 'active'),
('hotel_42932', '', 'Kerala', 'Mount Shadow Resort', ' Bhandaria, Bhavnagar', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f2976885e60.38306888.webp\",\"uploads/hotel_img_6a1f29771cfb88.03045936.avif\",\"uploads/hotel_img_6a1f29773a7881.22404693.avif\",\"uploads/hotel_img_6a1f2977830151.24451020.avif\",\"uploads/hotel_img_6a1f2977a18115.48849307.avif\",\"uploads/hotel_img_6a1f2977b77815.79086015.avif\"]', 'Standard Room', 'All', 'main-city', 2200, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3710.3426066997717!2d72.1002255!3d21.572545800000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjHCsDM0JzIxLjIiTiA3MsKwMDYnMDAuOCJF!5e0!3m2!1sen!2sin!4v1780427109413!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_49631', '', 'Goa', 'Hotel Candolim Grande', 'Candolim, Goa', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f2745678443.76946391.jpg\",\"uploads/hotel_img_6a1f2745eef202.02782210.webp\",\"uploads/hotel_img_6a1f2746184ba9.98936262.webp\",\"uploads/hotel_img_6a1f274635d687.20124118.jpg\",\"uploads/hotel_img_6a1f274675d300.10478637.webp\",\"uploads/hotel_img_6a1f2746d8f124.56042034.jpg\",\"uploads/hotel_img_6a1f2747286cb6.58709159.jpg\"]', 'Standard Room', 'All', 'main-city', 1800, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3844.2365312384795!2d73.765862!3d15.525445699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTXCsDMxJzMxLjYiTiA3M8KwNDUnNTcuMSJF!5e0!3m2!1sen!2sin!4v1780426405361!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_54796', '', 'Manali', 'Hill Hotel & Cottages', ' Kanyal Road, Manali', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f1ec2406ee1.02876331.avif\",\"uploads/hotel_img_6a1f1ec2407f95.25686859.webp\",\"uploads/hotel_img_6a1f1ec2409565.88031339.avif\",\"uploads/hotel_img_6a1f1ec240a2b2.84316403.avif\",\"uploads/hotel_img_6a1f1ec240b8b5.29828864.avif\"]', 'Standard Room', 'All', 'main-city', 1500, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3375.5252146419175!2d77.1855587!3d32.2170219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzLCsDEzJzAxLjMiTiA3N8KwMTEnMDguMCJF!5e0!3m2!1sen!2sin!4v1780424366930!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_55959', '', 'Rishikesh', 'La Kailasha Residency', 'Tapovan, Rishikesh', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1e8833ed0db4.83756977.webp\",\"uploads/hotel_img_6a1e8833ed2b89.56607118.avif\",\"uploads/hotel_img_6a1e8834019855.93004044.webp\",\"uploads/hotel_img_6a1e8834453a88.86947438.avif\",\"uploads/hotel_img_6a1e88345e5d49.61265119.avif\",\"uploads/hotel_img_6a1e88346a9027.94693345.avif\",\"uploads/hotel_img_6a1e88347be732.76906173.avif\",\"uploads/hotel_img_6a1e883490a808.75605039.avif\"]', 'Standard Room', 'All', 'main-city', 5358, '12:AM', 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3450.798785877958!2d78.3241503!3d30.1285707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDA3JzQyLjkiTiA3OMKwMTknMjYuOSJF!5e0!3m2!1sen!2sin!4v1780385825722!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting your personal information. We collect only the information necessary to provide hotel bookings, travel services, customer support, and website improvements. Your data may include your name, contact details, booking preferences, and payment information. We use secure technologies to safeguard your information and do not sell your personal data to third parties. Information may be shared only with trusted partners required to complete your bookings or comply with legal obligations. By using our website and services, you agree to the collection and use of information as outlined in this Privacy Policy.\r\n', 'active'),
('hotel_57749', 'Hotels', 'Nanital', 'Momado Hotels & Resorts', ' Bhimtal, Bhimtal', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1ea36d0b3d66.69038868.webp\",\"uploads/hotel_img_6a1ea36d4151c8.85650846.avif\",\"uploads/hotel_img_6a1ea36d7f1639.25076006.avif\",\"uploads/hotel_img_6a1ea36dbd58f3.64318842.avif\",\"uploads/hotel_img_6a1ea36e48aae7.65589724.avif\",\"uploads/hotel_img_6a1ea36ebf1377.43602403.avif\",\"uploads/hotel_img_6a1ea36f425192.42105968.avif\",\"uploads/hotel_img_6a1ea36fdca4b7.19954711.avif\",\"uploads/hotel_img_6a1ea370811462.09057061.avif\",\"uploads/hotel_img_6a1ea370a14138.89645545.avif\"]', 'Standard Room', 'All', 'main-city', 2500, '12:AM', 'No', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.', 'undefined', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3477.7922525406284!2d79.5570843!3d29.347083599999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjnCsDIwJzQ5LjUiTiA3OcKwMzMnMjUuNSJF!5e0!3m2!1sen!2sin!4v1780392780321!5m2!1sen!2sin', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.', 'active'),
('hotel_57908', '', 'Kashmir', 'Hotel Sunlight Srinagar', ' Dal Lake, Srinagar', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f2d8ba0d270.84887577.webp\",\"uploads/hotel_img_6a1f2d8c34a683.61777314.avif\",\"uploads/hotel_img_6a1f2d8c41ca13.46500019.avif\",\"uploads/hotel_img_6a1f2d8c99b6e6.12894473.avif\",\"uploads/hotel_img_6a1f2d8ce13c58.63388131.avif\",\"uploads/hotel_img_6a1f2d8d1cb332.01341712.avif\",\"uploads/hotel_img_6a1f2d8d536232.83452546.avif\",\"uploads/hotel_img_6a1f2d8d84b671.64798192.avif\"]', 'Standard Room', 'Familiy', 'main-city', 2200, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3304.211891267941!2d74.8337689!3d34.0897119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzTCsDA1JzIzLjAiTiA3NMKwNTAnMDEuNiJF!5e0!3m2!1sen!2sin!4v1780428153871!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_63135', '', 'Manali', 'Sakina Hotels', 'Mall Road, Manali', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f1c6bb7f5c2.44411859.jpg\",\"uploads/hotel_img_6a1f1c6c019a30.69268065.webp\",\"uploads/hotel_img_6a1f1c6c7034d5.30345552.jpg\",\"uploads/hotel_img_6a1f1c6cae37f3.18749067.avif\",\"uploads/hotel_img_6a1f1c6cd15a75.50115049.avif\",\"uploads/hotel_img_6a1f1c6ce946f8.98691025.jpg\",\"uploads/hotel_img_6a1f1c6d313565.57094440.jpg\",\"uploads/hotel_img_6a1f1c6d75d015.70569430.jpg\",\"uploads/hotel_img_6a1f1c6db035c6.15704678.jpg\"]', 'Standard Room', 'All', 'main-city', 2000, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3375.300499214121!2d77.18661209999999!3d32.223074399999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzLCsDEzJzIzLjEiTiA3N8KwMTEnMTEuOCJF!5e0!3m2!1sen!2sin!4v1780423764003!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_76638', '', 'Goa', 'Hotel Astoria', ' Assagaon, Goa', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f243268ad78.89498658.avif\",\"uploads/hotel_img_6a1f2432b26180.87350022.webp\",\"uploads/hotel_img_6a1f24332adf57.19937725.jpg\",\"uploads/hotel_img_6a1f2433b70a14.06869925.avif\",\"uploads/hotel_img_6a1f2433c276e4.69679664.avif\",\"uploads/hotel_img_6a1f2433cb4071.48561040.webp\",\"uploads/hotel_img_6a1f2433d19975.50813988.avif\",\"uploads/hotel_img_6a1f2433e001f8.02580995.jpg\"]', 'Standard Room', 'All', 'main-city', 2000, '12:AM', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3842.899734667349!2d73.7891843!3d15.597004999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTXCsDM1JzQ5LjIiTiA3M8KwNDcnMjEuMSJF!5e0!3m2!1sen!2sin!4v1780425761185!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_80344', '', 'Kerala', 'Hotel Rooms & Dormitory', 'Jail Road, Bhavnagar', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f2882a30125.92817255.avif\",\"uploads/hotel_img_6a1f2882a31281.67541504.webp\",\"uploads/hotel_img_6a1f2882a339b3.73183398.avif\",\"uploads/hotel_img_6a1f2882a35c42.54327306.jpg\"]', 'Standard Room', 'All', 'main-city', 1000, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3705.311120230833!2d72.14032499999999!3d21.7682167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjHCsDQ2JzA1LjYiTiA3MsKwMDgnMjUuMiJF!5e0!3m2!1sen!2sin!4v1780426864859!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_80937', '', 'Manali', 'Hotel Dchalet', ' Mall Road, Manali', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f1dab2c1da4.12269378.webp\",\"uploads/hotel_img_6a1f1dab4b1609.19533914.webp\",\"uploads/hotel_img_6a1f1dab6f7475.93190828.jpg\",\"uploads/hotel_img_6a1f1dab891652.26689878.jpg\",\"uploads/hotel_img_6a1f1dabaa88f8.97483856.webp\",\"uploads/hotel_img_6a1f1dabc620b1.50142770.avif\",\"uploads/hotel_img_6a1f1dabd29164.37579252.jpg\",\"uploads/hotel_img_6a1f1dac029069.58439681.avif\",\"uploads/hotel_img_6a1f1dac1599d0.72876066.avif\"]', 'Standard Room', 'All', 'main-city', 4500, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3374.3645505415334!2d77.1858115!3d32.248272400000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzLCsDE0JzUzLjgiTiA3N8KwMTEnMDguOSJF!5e0!3m2!1sen!2sin!4v1780424085471!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_89154', 'Hotels', 'Rishikesh', 'Check Inn Hotels', ' Tapovan, Rishikesh', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1e8536beb981.76635467.avif\",\"uploads/hotel_img_6a1e8536d58318.22342452.jpg\",\"uploads/hotel_img_6a1e8537225272.38353057.jpg\",\"uploads/hotel_img_6a1e8538097e66.18508566.avif\",\"uploads/hotel_img_6a1e85387f2257.74874516.avif\",\"uploads/hotel_img_6a1e8538e10082.17288435.avif\"]', 'Standard Room', 'All', 'main-city', 2080, '12:AM', 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.', 'undefined', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3450.5724888026316!2d78.3174944!3d30.135044399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDA4JzA2LjIiTiA3OMKwMTknMDMuMCJF!5e0!3m2!1sen!2sin!4v1780385052955!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting your personal information. We collect only the information necessary to provide hotel bookings, travel services, customer support, and website improvements. Your data may include your name, contact details, booking preferences, and payment information. We use secure technologies to safeguard your information and do not sell your personal data to third parties. Information may be shared only with trusted partners required to complete your bookings or comply with legal obligations. By using our website and services, you agree to the collection and use of information as outlined in this Privacy Policy.', 'active'),
('hotel_89848', '', 'Shimla', 'Sunrise Villa', ' Shoghi, Shimla', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1f2194631d23.47494242.webp\",\"uploads/hotel_img_6a1f2194b5c8f6.78024108.jpg\",\"uploads/hotel_img_6a1f21951c3987.09127582.jpg\",\"uploads/hotel_img_6a1f21964358a6.89653831.avif\",\"uploads/hotel_img_6a1f2196a4b391.62309069.jpg\",\"uploads/hotel_img_6a1f2196f1d877.99657536.jpg\",\"uploads/hotel_img_6a1f21974dc7f1.22402807.jpg\",\"uploads/hotel_img_6a1f2197b9b0d4.50783401.avif\",\"uploads/hotel_img_6a1f21980b1ee2.59859014.jpg\"]', 'Standard Room', 'All', 'main-city', 3300, '12:AM', 'Yes', 'No', '', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3418.3312771220503!2d77.131638!3d31.044876000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzHCsDAyJzQxLjYiTiA3N8KwMDcnNTMuOSJF!5e0!3m2!1sen!2sin!4v1780425071669!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting the information you provide when listing your hotel on our platform. We collect details such as hotel name, address, contact information, email, images, pricing, and other relevant listing content to manage and promote your property. Your information is used to facilitate bookings, customer inquiries, and improve our services. We do not sell, trade, or share your personal data with unauthorized third parties. Reasonable security measures are implemented to safeguard your information. By using our platform, you agree to this Privacy Policy and any future updates.\r\n', 'active'),
('hotel_91243', '', 'Mussoorie', 'Sun N Star Hotel', ' Gandhi Chowk, Mussoorie', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1e8d5dd3ccc0.73948220.avif\",\"uploads/hotel_img_6a1e8d5dd3ed83.03431633.avif\",\"uploads/hotel_img_6a1e8d5ddc5501.41228240.avif\",\"uploads/hotel_img_6a1e8d5de7cdf2.87718229.avif\",\"uploads/hotel_img_6a1e8d5e030b56.42389341.avif\",\"uploads/hotel_img_6a1e8d5e161545.58012034.avif\",\"uploads/hotel_img_6a1e8d5e2fb913.76370225.avif\",\"uploads/hotel_img_6a1e8d5e42c3b9.08032685.avif\",\"uploads/hotel_img_6a1e8d5e5da288.31610712.jpg\"]', 'Standard Room', 'All', 'main-city', 6000, '12:AM', 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n\r\n', '', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3439.2259049545396!2d78.06864999999999!3d30.4580389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDI3JzI4LjkiTiA3OMKwMDQnMDcuMSJF!5e0!3m2!1sen!2sin!4v1780387131445!5m2!1sen!2sin', 'At TravelTripo, we value your privacy and are committed to protecting your personal information. We collect only the information necessary to provide hotel bookings, travel services, customer support, and website improvements. Your data may include your name, contact details, booking preferences, and payment information. We use secure technologies to safeguard your information and do not sell your personal data to third parties. Information may be shared only with trusted partners required to complete your bookings or comply with legal obligations. By using our website and services, you agree to the collection and use of information as outlined in this Privacy Policy.\r\n\r\n', 'active'),
('hotel_91405', 'Hotels', 'Mussoorie', 'Royal Valley View', ' Mall Road, Mussoorie', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1e9148282886.63307827.avif\",\"uploads/hotel_img_6a1e91485edc98.78971047.avif\",\"uploads/hotel_img_6a1e9148906eb1.86999878.avif\",\"uploads/hotel_img_6a1e9148cac5f4.05688355.avif\",\"uploads/hotel_img_6a1e9148ea02f2.68852527.avif\"]', 'Standard Room', 'All', 'main-city', 2500, '12:AM', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', 'undefined', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3439.3450321662526!2d78.07920829999999!3d30.454663899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDI3JzE2LjgiTiA3OMKwMDQnNDUuMiJF!5e0!3m2!1sen!2sin!4v1780388003018!5m2!1sen!2sin', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.', 'active');
INSERT INTO `hotel_list` (`id`, `property_type`, `city`, `name`, `address`, `number`, `email`, `images`, `room_type`, `property_for`, `landmark`, `price`, `checkin_time`, `car_parking`, `swiming_pool`, `indoor_gym`, `air_condition`, `fridge`, `attached_washroom`, `microwave`, `discription`, `video`, `map`, `policy`, `status`) VALUES
('hotel_98785', 'Hotels', 'Nanital', 'Dreamcatcher Hotel', ' Chanfi, Bhimtal', 2147483647, 'info@traveltripo.com', '[\"uploads/hotel_img_6a1ea543ee7a28.39671015.jpg\",\"uploads/hotel_img_6a1ea544907915.41059102.jpg\",\"uploads/hotel_img_6a1ea5450be390.09186322.jpg\",\"uploads/hotel_img_6a1ea545713056.89382779.avif\",\"uploads/hotel_img_6a1ea54623d637.38962051.avif\",\"uploads/hotel_img_6a1ea546a0cd28.47035094.webp\",\"uploads/hotel_img_6a1ea54772f090.82298232.jpg\",\"uploads/hotel_img_6a1ea548579632.18384232.jpg\",\"uploads/hotel_img_6a1ea548eb0922.14415789.jpg\",\"uploads/hotel_img_6a1ea549c10be4.78738555.avif\"]', 'Standard Room', 'All', 'near-river', 2990, '12:AM', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.\r\n', 'undefined', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3476.9194923736923!2d79.58129149999999!3d29.372646399999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjnCsDIyJzIxLjUiTiA3OcKwMzQnNTIuNyJF!5e0!3m2!1sen!2sin!4v1780393254726!5m2!1sen!2sin', 'TravelTripo Hotels offers comfortable, affordable, and quality accommodation options for every type of traveler. Whether you are planning a family vacation, business trip, romantic getaway, or weekend escape, TravelTripo helps you find the perfect hotel with ease. Browse a wide selection of hotels, resorts, boutique stays, and luxury properties across popular destinations. Enjoy convenient booking, competitive prices, secure payments, and excellent customer support. Each property is carefully listed with detailed information, amenities, photos, and guest reviews to help you make informed decisions. Experience hassle-free travel planning and create memorable stays with TravelTripo Hotels wherever your journey takes you.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'sattu', '123');

-- --------------------------------------------------------

--
-- Table structure for table `owners_list`
--

CREATE TABLE `owners_list` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` int(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `property_type` varchar(200) NOT NULL,
  `tiup_amount` int(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_booking`
--

CREATE TABLE `package_booking` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `no_of_person` int(200) NOT NULL,
  `days` int(200) NOT NULL,
  `amount` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `package_booking`
--

INSERT INTO `package_booking` (`id`, `name`, `email`, `booking_date`, `no_of_person`, `days`, `amount`, `status`) VALUES
(17, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(16, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(18, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(19, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(20, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(21, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(22, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(23, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(24, 'satendra singh', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(25, 'satendra singh', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(26, 'satendra singh', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(27, 'satendra singh', 'satendrasingh9283@gmail.com', '', 3, 0, 8000, '1'),
(28, 'satendra singh', 'satendrasingh9283@gmail.com', '', 3, 0, 8000, '1'),
(29, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 1, 0, 8000, '1'),
(30, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 4, 0, 12000, '1'),
(31, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 4, 0, 12000, '1'),
(32, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 4, 0, 12000, '1'),
(33, 'FlatMojo', 'satendrasingh9283@gmail.com', '', 4, 0, 12000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `package_list`
--

CREATE TABLE `package_list` (
  `id` varchar(100) NOT NULL,
  `city` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `days` int(200) NOT NULL,
  `price` int(200) NOT NULL,
  `hotel_type` varchar(200) NOT NULL,
  `number` int(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `images` varchar(6000) NOT NULL,
  `food` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `sightseeing` varchar(200) NOT NULL,
  `video` varchar(300) NOT NULL,
  `policy` varchar(20000) NOT NULL,
  `description` varchar(20000) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `package_list`
--

INSERT INTO `package_list` (`id`, `city`, `title`, `days`, `price`, `hotel_type`, `number`, `address`, `images`, `food`, `transport`, `sightseeing`, `video`, `policy`, `description`, `status`) VALUES
('packages_852055', 'Rishikesh', 'Romantic Side Rishikesh ', 3, 12000, 'standard', 2147483647, 'Rishikesh', '[\"uploads/hotel_img_6a12ac5d3d97e4.26887183.jpeg\"]', 'Yes', 'Yes', 'Yes', 'undefined', 'We value your privacy and are committed to protecting your personal information. Any details collected through our website, including name, email, phone number, and booking information, are used only to provide better services and improve your experience. We do not sell, share, or misuse your personal data with third parties except when required by law or for booking-related services. Our website may use cookies to enhance user experience and website performance. By using our services, you agree to our privacy practices. We continuously maintain security measures to keep your information safe, secure, and confidential at all times.', 'Enjoy a memorable holiday experience with exciting destinations, comfortable stays, and unforgettable moments for families, couples, and solo travelers. Our holiday packages are designed to provide the perfect balance of relaxation, adventure, and comfort at affordable prices. Explore beautiful attractions, local culture, shopping areas, beaches, mountains, and popular tourist spots with ease. Travelers can enjoy premium accommodations, delicious meals, guided tours, transportation assistance, and exceptional customer support throughout the journey. Whether you are planning a romantic getaway, family vacation, weekend escape, or group tour, we ensure a stress-free and enjoyable holiday experience. Book your holiday today and create lasting memories with comfort, convenience, and value.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `property_listing`
--

CREATE TABLE `property_listing` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` int(100) NOT NULL,
  `city` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_list`
--

CREATE TABLE `review_list` (
  `id` int(100) NOT NULL,
  `review_name` varchar(200) NOT NULL,
  `review_email` varchar(200) NOT NULL,
  `review_rating` int(100) NOT NULL,
  `review_date` date NOT NULL,
  `review_comment` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_offers`
--

CREATE TABLE `travel_offers` (
  `id` int(100) NOT NULL,
  `property_type` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `travel_offers`
--

INSERT INTO `travel_offers` (`id`, `property_type`, `status`) VALUES
(1, 'hotel', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` int(100) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advanture_booking`
--
ALTER TABLE `advanture_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advanture_list`
--
ALTER TABLE `advanture_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `city_data`
--
ALTER TABLE `city_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_list`
--
ALTER TABLE `hotel_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners_list`
--
ALTER TABLE `owners_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_booking`
--
ALTER TABLE `package_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_list`
--
ALTER TABLE `package_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_listing`
--
ALTER TABLE `property_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_list`
--
ALTER TABLE `review_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_offers`
--
ALTER TABLE `travel_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advanture_booking`
--
ALTER TABLE `advanture_booking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `advanture_list`
--
ALTER TABLE `advanture_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owners_list`
--
ALTER TABLE `owners_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package_booking`
--
ALTER TABLE `package_booking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `property_listing`
--
ALTER TABLE `property_listing`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_list`
--
ALTER TABLE `review_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `travel_offers`
--
ALTER TABLE `travel_offers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
