-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2018 at 06:13 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ks_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` char(36) CHARACTER SET utf8 NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `houseno` varchar(50) DEFAULT NULL,
  `villagename` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `subdistrict` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `district` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `province` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `zipcode` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `houseno`, `villagename`, `subdistrict`, `district`, `province`, `zipcode`, `salary`, `name`, `age`, `created`, `updated`, `status`) VALUES
('', 'test2', '123', '100', 'ลัดดาแลนด์', 'สุเทพ', 'สุเทพ', 'เชียงใหม่', '50200', '20000', 'นู๋เฟิร์ส', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
('3f5bb6cf-a553-4395-afef-989043c0e343', 'first', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-03-30 07:47:52', '0000-00-00 00:00:00', 2),
('70bbe631-4588-4b02-855b-566d98ca4b3e', 'test3', '123', '330', 'ชมจันทร์', 'ห้วยนาง', 'ห้วยยอด', 'ตรัง', '92130', '20000', 'บูกิ', 5, '2018-05-06 07:45:05', '0000-00-00 00:00:00', 2),
('742d5f06-423a-48ff-bff4-2a02d0557213', 'test1', '123', '80', '-', 'สุเทพ', 'เมืองเชียงใหม่', 'เชียงใหม่', '50200', '5', 'เฟิร์ส', 5, '2018-04-27 08:24:58', '0000-00-00 00:00:00', 2),
('7a0fdd07-d418-4675-b577-2125ff676f2b', 'test', '123', '100', 'ลัดดาแลนด์', 'สุเทพ', 'เมืองเชียงใหม่', 'เชียงใหม่', '50200', '500', NULL, 0, '2018-04-27 04:38:14', '0000-00-00 00:00:00', 2),
('871ad17b-e18c-4cda-816d-78aa795a57e2', 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-11-14 10:07:02', '0000-00-00 00:00:00', 1),
('b37d758d-e0bb-4d97-bf27-39291ad77978', 'user01', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-11-14 11:21:16', '0000-00-00 00:00:00', 2),
('b47014f5-0a94-4629-b8c0-60ad3b0c8b93', 'user03', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-11-24 16:33:24', '0000-00-00 00:00:00', 2),
('caad3575-5b0b-41a2-a389-6a0830d50f6b', 'user02', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-11-14 11:47:08', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `activecodes`
--

CREATE TABLE `activecodes` (
  `id` char(36) CHARACTER SET utf8 NOT NULL,
  `ac_code` char(16) CHARACTER SET utf8 NOT NULL,
  `game_id` char(36) CHARACTER SET utf8 NOT NULL,
  `account_id` char(36) CHARACTER SET utf8 DEFAULT NULL,
  `code_status` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecodes`
--

INSERT INTO `activecodes` (`id`, `ac_code`, `game_id`, `account_id`, `code_status`, `created`, `updated`) VALUES
('17a82b8d-f1f5-42e0-a2e1-9857713e145a', '17a82b8d-f1f5-42', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-06-05 07:16:37', '0000-00-00 00:00:00'),
('2840a31a-2adf-45a8-b3d6-3b23fc3ee82f', '2840a31a-2adf-45', '0159b259-7cf8-4e39-9c84-2871e6af328b', '3f5bb6cf-a553-4395-afef-989043c0e343', 2, '2018-03-30 07:46:47', '0000-00-00 00:00:00'),
('3f29f3e4-5eab-4f3d-99d6-7b50c97a6ddd', '3f29f3e4-5eab-4f', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-03-30 07:24:02', '0000-00-00 00:00:00'),
('4135cb70-bf1e-4a78-9458-63ca7d242296', '4135cb70-bf1e-4a', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-06-05 07:16:37', '0000-00-00 00:00:00'),
('426a9367-3055-48fc-a20f-3715f7c2b62a', '426a9367-3055-48', '0159b259-7cf8-4e39-9c84-2871e6af328b', NULL, 1, '2018-03-30 07:46:47', '0000-00-00 00:00:00'),
('4b897fe5-b2f0-40ee-ae83-27976710c7b7', '4b897fe5-b2f0-40', '9f56cd2a-f6d5-4e54-ad18-608a44299521', 'b37d758d-e0bb-4d97-bf27-39291ad77978', 2, '2018-01-09 08:44:35', '0000-00-00 00:00:00'),
('4fb70c01-1e4f-419b-a04f-cc65c6627ecb', '4fb70c01-1e4f-41', '9f56cd2a-f6d5-4e54-ad18-608a44299521', 'b37d758d-e0bb-4d97-bf27-39291ad77978', 2, '2018-01-09 08:44:35', '0000-00-00 00:00:00'),
('5213c6c6-407f-49e0-a333-420b22a6a44d', '5213c6c6-407f-49', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-01-09 08:44:35', '0000-00-00 00:00:00'),
('597e3f70-ac48-49ce-826c-dfca08cbbf3f', '597e3f70-ac48-49', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-03-30 07:24:02', '0000-00-00 00:00:00'),
('697d27b4-d1c0-4ab9-a47a-bf170b03e05e', '697d27b4-d1c0-4a', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-06-05 07:16:37', '0000-00-00 00:00:00'),
('84abbca9-a98d-43ec-81dd-d9290d432dfa', '84abbca9-a98d-43', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-03-30 07:24:02', '0000-00-00 00:00:00'),
('8ab3d9ac-20e9-4ead-83e8-db4cbf620984', '8ab3d9ac-20e9-4e', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-06-05 07:16:37', '0000-00-00 00:00:00'),
('ad28f0c4-1a5d-4217-90ac-4cb40d0a1ec4', 'ad28f0c4-1a5d-42', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-01-09 08:44:35', '0000-00-00 00:00:00'),
('d1ed7f8a-f7b9-4a4d-889a-ce2c1ee3c607', 'd1ed7f8a-f7b9-4a', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-03-30 07:24:02', '0000-00-00 00:00:00'),
('dc697288-c8e0-4713-b08a-1467aa319018', 'dc697288-c8e0-47', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-06-05 07:16:37', '0000-00-00 00:00:00'),
('ee7c3270-e1a1-4dc2-94e9-9b0ae147d245', 'ee7c3270-e1a1-4d', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-03-30 07:24:02', '0000-00-00 00:00:00'),
('f9225964-0df2-40e1-ad42-690bbb42ba37', 'f9225964-0df2-40', '9f56cd2a-f6d5-4e54-ad18-608a44299521', NULL, 1, '2018-01-09 08:44:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` char(36) CHARACTER SET utf8 NOT NULL,
  `game_nameTH` varchar(80) CHARACTER SET utf8 NOT NULL,
  `game_nameEN` varchar(80) CHARACTER SET utf8 NOT NULL,
  `game_image_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `game_voice_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `game_image_path` varchar(200) CHARACTER SET utf8 NOT NULL,
  `game_voice_path` varchar(200) CHARACTER SET utf8 NOT NULL,
  `game_path` varchar(200) NOT NULL,
  `game_complete_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_nameTH`, `game_nameEN`, `game_image_name`, `game_voice_name`, `created`, `updated`, `game_image_path`, `game_voice_path`, `game_path`, `game_complete_status`) VALUES
('0159b259-7cf8-4e39-9c84-2871e6af328b', 'โรงเรียน', 'School', 'School-image.jpg', 'School-voice.mp3', '2018-03-30 07:27:20', '2018-03-30 07:27:20', 'uploadfile/School/School-image.jpg', 'uploadfile/School/School-voice.mp3', 'uploadfile/School/', 1),
('9f56cd2a-f6d5-4e54-ad18-608a44299521', 'โรงพยาบาล', 'HospitalTAK01', 'Hospital-image.jpg', 'Hospital-voice.mp3', '2018-01-09 07:51:57', '2018-01-09 07:51:57', 'uploadfile/HospitalTAK01/Hospital-image.jpg', 'uploadfile/HospitalTAK01/Hospital-voice.mp3', 'uploadfile/HospitalTAK01/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gamesfour`
--

CREATE TABLE `gamesfour` (
  `id` char(36) CHARACTER SET utf8 NOT NULL,
  `game4_number` int(1) NOT NULL,
  `game4_nameTH` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `game4_nameEN` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `game4_voiceTH_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game4_voiceEN_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game4_image_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game4_color` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `game_id` char(36) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `game4_voiceTH_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game4_voiceEN_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game4_image_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game4_complete_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamesfour`
--

INSERT INTO `gamesfour` (`id`, `game4_number`, `game4_nameTH`, `game4_nameEN`, `game4_voiceTH_name`, `game4_voiceEN_name`, `game4_image_name`, `game4_color`, `game_id`, `created`, `updated`, `game4_voiceTH_path`, `game4_voiceEN_path`, `game4_image_path`, `game4_complete_status`) VALUES
('08d5d14d-1921-485b-92b6-e2b542018927', 13, 'เนค17', 'nex17', 'Hospital-7nex17-voiceTH.mp3', 'Hospital-7nex17-voiceEN.mp3', 'Hospital-7nex17-image.jpg', 'ส้ม', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-7nex17-voiceTH.mp3', 'MiniGame4/Hospital-7nex17-voiceEN.mp3', 'MiniGame4/Hospital-7nex17-image.jpg', 1),
('0909a6c9-c80f-4760-83c9-397a15eae5e2', 19, 'เนค110', 'nex110', 'Hospital-10nex110-voiceTH.mp3', 'Hospital-10nex110-voiceEN.mp3', 'Hospital-10nex110-image.jpg', 'ดำ', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:08', '2018-01-09 08:00:08', 'MiniGame4/Hospital-10nex110-voiceTH.mp3', 'MiniGame4/Hospital-10nex110-voiceEN.mp3', 'MiniGame4/Hospital-10nex110-image.jpg', 1),
('1513494e-39c3-49a5-9dc4-260e564ae030', 7, 'เนค14', 'nex14', 'Hospital-4nex14-voiceTH.mp3', 'Hospital-4nex14-voiceEN.mp3', 'Hospital-4nex14-image.jpg', 'ชมพู', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-4nex14-voiceTH.mp3', 'MiniGame4/Hospital-4nex14-voiceEN.mp3', 'MiniGame4/Hospital-4nex14-image.jpg', 1),
('1f4ccfd9-c64d-4bb6-be65-aa5b3e71c674', 11, 'เนค16', 'nex16', 'Hospital-6nex16-voiceTH.mp3', 'Hospital-6nex16-voiceEN.mp3', 'Hospital-6nex16-image.jpg', 'ขาว', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-6nex16-voiceTH.mp3', 'MiniGame4/Hospital-6nex16-voiceEN.mp3', 'MiniGame4/Hospital-6nex16-image.jpg', 1),
('27c73b4d-6751-4310-8883-d8041bcc731e', 6, 'เนค23', 'nex23', 'Hospital-nex233-voiceTH.mp3', 'Hospital-nex233-voiceEN.mp3', 'Hospital-nex233-image.jpg', 'น้ำเงิน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-nex233-voiceTH.mp3', 'MiniGame4/Hospital-nex233-voiceEN.mp3', 'MiniGame4/Hospital-nex233-image.jpg', 1),
('48c82ba4-f56e-48cd-a6ad-91032c1aecbd', 7, 'ก47', 'g47', 'School-4g47-voiceTH.mp3', 'School-4g47-voiceEN.mp3', 'School-4g47-image.jpg', 'ชมพู', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-4g47-voiceTH.mp3', 'MiniGame4/School-4g47-voiceEN.mp3', 'MiniGame4/School-4g47-image.jpg', 1),
('49f41541-613c-4943-a9e6-eb249206c896', 16, 'เนค28', 'nex28', 'Hospital-nex288-voiceTH.mp3', 'Hospital-nex288-voiceEN.mp3', 'Hospital-nex288-image.jpg', 'เขียว', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:08', '2018-01-09 08:00:08', 'MiniGame4/Hospital-nex288-voiceTH.mp3', 'MiniGame4/Hospital-nex288-voiceEN.mp3', 'MiniGame4/Hospital-nex288-image.jpg', 1),
('52657538-292e-43aa-9a01-086a59187a9d', 11, 'ก411', 'g411', 'School-6g411-voiceTH.mp3', 'School-6g411-voiceEN.mp3', 'School-6g411-image.jpg', 'ขาว', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-6g411-voiceTH.mp3', 'MiniGame4/School-6g411-voiceEN.mp3', 'MiniGame4/School-6g411-image.jpg', 1),
('57951d7d-725f-428a-aa8c-6a19509ee0f4', 8, 'เนค24', 'nex24', 'Hospital-nex244-voiceTH.mp3', 'Hospital-nex244-voiceEN.mp3', 'Hospital-nex244-image.jpg', 'ชมพู', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-nex244-voiceTH.mp3', 'MiniGame4/Hospital-nex244-voiceEN.mp3', 'MiniGame4/Hospital-nex244-image.jpg', 1),
('60b22635-beaa-461c-98d7-43ae4d90877b', 18, 'ก418', 'g418', 'School-g4189-voiceTH.mp3', 'School-g4189-voiceEN.mp3', 'School-g4189-image.jpg', 'น้ำตาล', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-g4189-voiceTH.mp3', 'MiniGame4/School-g4189-voiceEN.mp3', 'MiniGame4/School-g4189-image.jpg', 1),
('6afbc299-4ca8-45e5-9eef-bcc6c06b0846', 12, 'ก412', 'g412', 'School-g4126-voiceTH.mp3', 'School-g4126-voiceEN.mp3', 'School-g4126-image.jpg', 'ขาว', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-g4126-voiceTH.mp3', 'MiniGame4/School-g4126-voiceEN.mp3', 'MiniGame4/School-g4126-image.jpg', 1),
('718e6d02-7fc8-4f78-8bd6-36058b559f09', 1, 'เนค11', 'nex11', 'Hospital-1nex11-voiceTH.mp3', 'Hospital-1nex11-voiceEN.mp3', 'HospitalTAK-nex111-image.jpg', 'เหลือง', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-1nex11-voiceTH.mp3', 'MiniGame4/Hospital-1nex11-voiceEN.mp3', 'MiniGame4/HospitalTAK-nex111-image.jpg', 1),
('77ed821e-473b-44dc-bafe-52ef2af5d06e', 15, 'ก415', 'g415', 'School-8g415-voiceTH.mp3', 'School-8g415-voiceEN.mp3', 'School-8g415-image.jpg', 'เขียว', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-8g415-voiceTH.mp3', 'MiniGame4/School-8g415-voiceEN.mp3', 'MiniGame4/School-8g415-image.jpg', 1),
('7db89f43-3ca9-426d-af6b-c0075c2c7f58', 2, 'เนค21', 'nex21', 'Hospital-nex211-voiceTH.mp3', 'Hospital-nex211-voiceEN.mp3', 'Hospital-nex211-image.jpg', 'เหลือง', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-nex211-voiceTH.mp3', 'MiniGame4/Hospital-nex211-voiceEN.mp3', 'MiniGame4/Hospital-nex211-image.jpg', 1),
('87a80453-98ef-4571-a03c-5d77c20deb8d', 10, 'ก410', 'g410', 'School-g4105-voiceTH.mp3', 'School-g4105-voiceEN.mp3', 'School-g4105-image.jpg', 'แดง', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-g4105-voiceTH.mp3', 'MiniGame4/School-g4105-voiceEN.mp3', 'MiniGame4/School-g4105-image.jpg', 1),
('87d5143f-0409-4119-9cb2-823be2500d9e', 5, 'ก45', 'g45', 'School-3g45-voiceTH.mp3', 'School-3g45-voiceEN.mp3', 'School-3g45-image.jpg', 'น้ำเงิน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-3g45-voiceTH.mp3', 'MiniGame4/School-3g45-voiceEN.mp3', 'MiniGame4/School-3g45-image.jpg', 1),
('87e167ea-ee19-4bd0-8545-467ed159d0be', 13, 'ก413', 'g413', 'School-7g413-voiceTH.mp3', 'School-7g413-voiceEN.mp3', 'School-7g413-image.jpg', 'ส้ม', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-7g413-voiceTH.mp3', 'MiniGame4/School-7g413-voiceEN.mp3', 'MiniGame4/School-7g413-image.jpg', 1),
('8bfff138-6cee-441a-9d4d-102775b1e58e', 14, 'ก414', 'g414', 'School-g4147-voiceTH.mp3', 'School-g4147-voiceEN.mp3', 'School-g4147-image.jpg', 'ส้ม', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-g4147-voiceTH.mp3', 'MiniGame4/School-g4147-voiceEN.mp3', 'MiniGame4/School-g4147-image.jpg', 1),
('949b3243-63ed-4cea-9793-e78fb92b495d', 12, 'เนค26', 'nex26', 'Hospital-nex266-voiceTH.mp3', 'Hospital-nex266-voiceEN.mp3', 'Hospital-nex266-image.jpg', 'ขาว', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-nex266-voiceTH.mp3', 'MiniGame4/Hospital-nex266-voiceEN.mp3', 'MiniGame4/Hospital-nex266-image.jpg', 1),
('9d10f5cb-0528-4454-b0a6-cff01baaf8ab', 20, 'ก420', 'g420', 'School-g42010-voiceTH.mp3', 'School-g42010-voiceEN.mp3', 'School-g42010-image.jpg', 'ดำ', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-g42010-voiceTH.mp3', 'MiniGame4/School-g42010-voiceEN.mp3', 'MiniGame4/School-g42010-image.jpg', 1),
('9f2fba15-3255-4db8-8337-12f2d4e7b137', 8, 'ก48', 'g48', 'School-g484-voiceTH.mp3', 'School-g484-voiceEN.mp3', 'School-g484-image.jpg', 'ชมพู', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-g484-voiceTH.mp3', 'MiniGame4/School-g484-voiceEN.mp3', 'MiniGame4/School-g484-image.jpg', 1),
('a6cac88c-6236-44a2-902b-bc0d7606bbd5', 14, 'เนค27', 'nex27', 'Hospital-nex277-voiceTH.mp3', 'Hospital-nex277-voiceEN.mp3', 'Hospital-nex277-image.jpg', 'ส้ม', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-nex277-voiceTH.mp3', 'MiniGame4/Hospital-nex277-voiceEN.mp3', 'MiniGame4/Hospital-nex277-image.jpg', 1),
('ab9cf2b0-0f27-4fa5-a7f2-bae35f7fe7fc', 5, 'เนค3', 'nex13', 'Hospital-3nex13-voiceTH.mp3', 'Hospital-3nex13-voiceEN.mp3', 'Hospital-3nex13-image.jpg', 'น้ำเงิน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-3nex13-voiceTH.mp3', 'MiniGame4/Hospital-3nex13-voiceEN.mp3', 'MiniGame4/Hospital-3nex13-image.jpg', 1),
('b203cbb2-093f-4798-8c66-793952286706', 20, 'เนค210', 'nex210', 'Hospital-nex21010-voiceTH.mp3', 'Hospital-nex21010-voiceEN.mp3', 'Hospital-nex21010-image.jpg', 'ดำ', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:08', '2018-01-09 08:00:08', 'MiniGame4/Hospital-nex21010-voiceTH.mp3', 'MiniGame4/Hospital-nex21010-voiceEN.mp3', 'MiniGame4/Hospital-nex21010-image.jpg', 1),
('ba250ad8-2e55-4133-9d53-a7d2f4de6531', 4, 'ก44', 'g44', 'School-g442-voiceTH.mp3', 'School-g442-voiceEN.mp3', 'School-g442-image.jpg', 'ม่วง', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-g442-voiceTH.mp3', 'MiniGame4/School-g442-voiceEN.mp3', 'MiniGame4/School-g442-image.jpg', 1),
('bf1c8e50-c824-4400-841f-8a58789f1b4f', 10, 'เนค25', 'nex25', 'Hospital-nex255-voiceTH.mp3', 'Hospital-nex255-voiceEN.mp3', 'Hospital-nex255-image.jpg', 'แดง', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-nex255-voiceTH.mp3', 'MiniGame4/Hospital-nex255-voiceEN.mp3', 'MiniGame4/Hospital-nex255-image.jpg', 1),
('c69597af-1f78-42d3-b11d-821c5314b2ec', 4, 'เนค22', 'nex22', 'Hospital-nex222-voiceTH.mp3', 'Hospital-nex222-voiceEN.mp3', 'Hospital-nex222-image.jpg', 'ม่วง', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-nex222-voiceTH.mp3', 'MiniGame4/Hospital-nex222-voiceEN.mp3', 'MiniGame4/Hospital-nex222-image.jpg', 1),
('d0039f77-b737-4690-8ddc-ee02e3e7cd9c', 3, 'เนค2', 'nex12', 'Hospital-2nex12-voiceTH.mp3', 'Hospital-2nex12-voiceEN.mp3', 'Hospital-2nex12-image.jpg', 'ม่วง', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-2nex12-voiceTH.mp3', 'MiniGame4/Hospital-2nex12-voiceEN.mp3', 'MiniGame4/Hospital-2nex12-image.jpg', 1),
('d33e7fc7-9dab-429d-9b92-91ffe0e4f57f', 2, 'ก42', 'g42', 'School-g421-voiceTH.mp3', 'School-g421-voiceEN.mp3', 'School-g421-image.jpg', 'เหลือง', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-g421-voiceTH.mp3', 'MiniGame4/School-g421-voiceEN.mp3', 'MiniGame4/School-g421-image.jpg', 1),
('d3930dea-e5bf-4402-96e0-5522810e94e2', 9, 'เนค15', 'nex15', 'Hospital-5nex15-voiceTH.mp3', 'Hospital-5nex15-voiceEN.mp3', 'Hospital-5nex15-image.jpg', 'แดง', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:07', '2018-01-09 08:00:07', 'MiniGame4/Hospital-5nex15-voiceTH.mp3', 'MiniGame4/Hospital-5nex15-voiceEN.mp3', 'MiniGame4/Hospital-5nex15-image.jpg', 1),
('d93ca43d-4226-445a-b4c2-44bc69ce9d1c', 9, 'ก49', 'g49', 'School-5g49-voiceTH.mp3', 'School-5g49-voiceEN.mp3', 'School-5g49-image.jpg', 'แดง', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-5g49-voiceTH.mp3', 'MiniGame4/School-5g49-voiceEN.mp3', 'MiniGame4/School-5g49-image.jpg', 1),
('da7bdbc7-ac6c-4dd2-ad63-b2039cb39c09', 6, 'ก46', 'g46', 'School-g463-voiceTH.mp3', 'School-g463-voiceEN.mp3', 'School-g463-image.jpg', 'น้ำเงิน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-g463-voiceTH.mp3', 'MiniGame4/School-g463-voiceEN.mp3', 'MiniGame4/School-g463-image.jpg', 1),
('dfb06391-f711-49c8-9f45-3bc4a3934394', 3, 'ก43', 'g43', 'School-2g43-voiceTH.mp3', 'School-2g43-voiceEN.mp3', 'School-2g43-image.jpg', 'ม่วง', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-2g43-voiceTH.mp3', 'MiniGame4/School-2g43-voiceEN.mp3', 'MiniGame4/School-2g43-image.jpg', 1),
('e1bdce9c-69d0-4cf3-9e98-4ba846a255e5', 1, 'ก41', 'g41', 'School-1g41-voiceTH.mp3', 'School-1g41-voiceEN.mp3', 'School-1g41-image.jpg', 'เหลือง', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:23', '2018-03-30 07:40:23', 'MiniGame4/School-1g41-voiceTH.mp3', 'MiniGame4/School-1g41-voiceEN.mp3', 'MiniGame4/School-1g41-image.jpg', 1),
('e2441cc2-e9f8-477e-93b9-cfd6e9e065ba', 19, 'ก419', 'g419', 'School-10g419-voiceTH.mp3', 'School-10g419-voiceEN.mp3', 'School-10g419-image.jpg', 'ดำ', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-10g419-voiceTH.mp3', 'MiniGame4/School-10g419-voiceEN.mp3', 'MiniGame4/School-10g419-image.jpg', 1),
('eac43de2-657b-4a21-ad64-c2f1e9070122', 18, 'เนค29', 'nex29', 'Hospital-nex299-voiceTH.mp3', 'Hospital-nex299-voiceEN.mp3', 'Hospital-nex299-image.jpg', 'น้ำตาล', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:08', '2018-01-09 08:00:08', 'MiniGame4/Hospital-nex299-voiceTH.mp3', 'MiniGame4/Hospital-nex299-voiceEN.mp3', 'MiniGame4/Hospital-nex299-image.jpg', 1),
('f9ec2f72-65d4-4b29-ba0e-b6ec9290fe21', 17, 'ก417', 'g417', 'School-9g417-voiceTH.mp3', 'School-9g417-voiceEN.mp3', 'School-9g417-image.jpg', 'น้ำตาล', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-9g417-voiceTH.mp3', 'MiniGame4/School-9g417-voiceEN.mp3', 'MiniGame4/School-9g417-image.jpg', 1),
('fa482b6e-582c-444d-a40a-2efa24e1493b', 17, 'เนค19', 'nex19', 'Hospital-9nex19-voiceTH.mp3', 'Hospital-9nex19-voiceEN.mp3', 'Hospital-9nex19-image.jpg', 'น้ำตาล', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:08', '2018-01-09 08:00:08', 'MiniGame4/Hospital-9nex19-voiceTH.mp3', 'MiniGame4/Hospital-9nex19-voiceEN.mp3', 'MiniGame4/Hospital-9nex19-image.jpg', 1),
('fde8a061-8094-4819-af25-3d40a8e71e25', 15, 'เนค8', 'nex18', 'Hospital-8nex18-voiceTH.mp3', 'Hospital-8nex18-voiceEN.mp3', 'Hospital-8nex18-image.jpg', 'เขียว', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 08:00:08', '2018-01-09 08:00:08', 'MiniGame4/Hospital-8nex18-voiceTH.mp3', 'MiniGame4/Hospital-8nex18-voiceEN.mp3', 'MiniGame4/Hospital-8nex18-image.jpg', 1),
('ff609067-4f83-45b4-9375-6375f262ca06', 16, 'ก416', 'g416', 'School-g4168-voiceTH.mp3', 'School-g4168-voiceEN.mp3', 'School-g4168-image.jpg', 'เขียว', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:40:24', '2018-03-30 07:40:24', 'MiniGame4/School-g4168-voiceTH.mp3', 'MiniGame4/School-g4168-voiceEN.mp3', 'MiniGame4/School-g4168-image.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gamesone`
--

CREATE TABLE `gamesone` (
  `id` char(36) CHARACTER SET utf8 NOT NULL,
  `game1_number` int(1) NOT NULL,
  `game1_nameTH` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `game1_nameEN` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `game1_voiceTH_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game1_voiceEN_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game1_image_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game_id` char(36) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `game1_voiceTH_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game1_voiceEN_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game1_image_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game1_complete_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamesone`
--

INSERT INTO `gamesone` (`id`, `game1_number`, `game1_nameTH`, `game1_nameEN`, `game1_voiceTH_name`, `game1_voiceEN_name`, `game1_image_name`, `game_id`, `created`, `updated`, `game1_voiceTH_path`, `game1_voiceEN_path`, `game1_image_path`, `game1_complete_status`) VALUES
('2e3e9aa5-c061-435e-a3eb-310ec2d567d1', 7, 'มินิ7', 'mini7', 'School-7mini7-voiceTH.mp3', 'School-7mini7-voiceEN.mp3', 'School-7mini7-image.jpg', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:30:10', '2018-03-30 07:30:10', 'MiniGame1/School-7mini7-voiceTH.mp3', 'MiniGame1/School-7mini7-voiceEN.mp3', 'MiniGame1/School-7mini7-image.jpg', 1),
('3172c6cb-6967-4332-bd4a-e73568d6e1c8', 3, 'เนค3', 'nex3', 'Hospital-3nex3-voiceTH.mp3', 'Hospital-3nex3-voiceEN.mp3', 'HospitalTAK-nex33-image.jpg', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:53:03', '2018-01-09 07:53:03', 'MiniGame1/Hospital-nex33-voiceTH.mp3', 'MiniGame1/Hospital-nex33-voiceEN.mp3', 'MiniGame1/HospitalTAK-nex33-image.jpg', 1),
('39f0007c-02f9-4869-89bd-763a5f2e5367', 1, 'เนค1', 'nex1', 'HospitalTAK01-nex11-voiceTH.mp3', 'HospitalTAK-nex11-voiceEN.mp3', 'HospitalTAK-nex11-image.jpg', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:53:03', '2018-01-09 07:53:03', 'MiniGame1/HospitalTAK01-nex11-voiceTH.mp3', 'MiniGame1/HospitalTAK-nex11-voiceEN.mp3', 'MiniGame1/HospitalTAK-nex11-image.jpg', 1),
('452dde64-bb39-4f7a-bede-eb85417f4cb2', 5, 'เนค5', 'nex5', 'Hospital-5nex5-voiceTH.mp3', 'Hospital-5nex5-voiceEN.mp3', 'HospitalTAK01-nex55-image.jpg', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:53:03', '2018-01-09 07:53:03', 'MiniGame1/Hospital-nex55-voiceTH.mp3', 'MiniGame1/Hospital-nex55-voiceEN.mp3', 'MiniGame1/HospitalTAK01-nex55-image.jpg', 1),
('56c65f67-1216-4446-b89c-d7e22e695ff0', 8, 'มินิ8', 'mini8', 'School-8mini8-voiceTH.mp3', 'School-8mini8-voiceEN.mp3', 'School-8mini8-image.jpg', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:30:10', '2018-03-30 07:30:10', 'MiniGame1/School-8mini8-voiceTH.mp3', 'MiniGame1/School-8mini8-voiceEN.mp3', 'MiniGame1/School-8mini8-image.jpg', 1),
('5784dd76-5aea-43f5-b9c1-dbcc9d7b25aa', 8, 'เนค8', 'nex8', 'Hospital-8nex8-voiceTH.mp3', 'Hospital-8nex8-voiceEN.mp3', 'HospitalTAK01-nex88-image.jpg', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:53:04', '2018-01-09 07:53:04', 'MiniGame1/Hospital-nex88-voiceTH.mp3', 'MiniGame1/Hospital-nex88-voiceEN.mp3', 'MiniGame1/HospitalTAK01-nex88-image.jpg', 1),
('5e9a0e9f-41bd-45b4-bfee-5a95d22e2ca9', 6, 'เนค6', 'nex6', 'Hospital-6nex6-voiceTH.mp3', 'Hospital-6nex6-voiceEN.mp3', 'HospitalTAK-nex66-image.jpg', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:53:03', '2018-01-09 07:53:03', 'MiniGame1/Hospital-nex66-voiceTH.mp3', 'MiniGame1/Hospital-nex66-voiceEN.mp3', 'MiniGame1/HospitalTAK-nex66-image.jpg', 1),
('6e7acad5-6f92-4e97-9f79-f8ca8c515921', 4, 'เนค4', 'nex4', 'Hospital-4nex4-voiceTH.mp3', 'Hospital-4nex4-voiceEN.mp3', 'HospitalTAK-nex44-image.jpg', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:53:03', '2018-01-09 07:53:03', 'MiniGame1/Hospital-nex44-voiceTH.mp3', 'MiniGame1/Hospital-nex44-voiceEN.mp3', 'MiniGame1/HospitalTAK-nex44-image.jpg', 1),
('7dc33527-ed1c-4b4a-ad95-caa1aaf52545', 7, 'เนค7', 'nex7', 'Hospital-7nex7-voiceTH.mp3', 'Hospital-7nex7-voiceEN.mp3', 'HospitalTAK01-nex77-image.jpg', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:53:03', '2018-01-09 07:53:03', 'MiniGame1/Hospital-nex77-voiceTH.mp3', 'MiniGame1/Hospital-nex77-voiceEN.mp3', 'MiniGame1/HospitalTAK01-nex77-image.jpg', 1),
('898d0557-a04d-47a1-abde-06a9868bdb03', 5, 'มินิ5', 'mini5', 'School-5mini5-voiceTH.mp3', 'School-5mini5-voiceEN.mp3', 'School-5mini5-image.jpg', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:30:10', '2018-03-30 07:30:10', 'MiniGame1/School-5mini5-voiceTH.mp3', 'MiniGame1/School-5mini5-voiceEN.mp3', 'MiniGame1/School-5mini5-image.jpg', 1),
('8aae526e-f269-4167-85f4-e0343662f5a6', 6, 'มินิ6', 'mini6', 'School-6mini6-voiceTH.mp3', 'School-6mini6-voiceEN.mp3', 'School-6mini6-image.jpg', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:30:10', '2018-03-30 07:30:10', 'MiniGame1/School-6mini6-voiceTH.mp3', 'MiniGame1/School-6mini6-voiceEN.mp3', 'MiniGame1/School-6mini6-image.jpg', 1),
('8d49155a-f75d-4cba-b532-fb9618964f55', 1, 'มินิ1', 'mini1', 'School-1mini1-voiceTH.mp3', 'School-1mini1-voiceEN.mp3', 'School-1mini1-image.jpg', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:30:10', '2018-03-30 07:30:10', 'MiniGame1/School-1mini1-voiceTH.mp3', 'MiniGame1/School-1mini1-voiceEN.mp3', 'MiniGame1/School-1mini1-image.jpg', 1),
('9979ae7d-5212-4257-b8a1-b2e962436ccb', 3, 'มินิ3', 'mini3', 'School-3mini3-voiceTH.mp3', 'School-3mini3-voiceEN.mp3', 'School-3mini3-image.jpg', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:30:10', '2018-03-30 07:30:10', 'MiniGame1/School-3mini3-voiceTH.mp3', 'MiniGame1/School-3mini3-voiceEN.mp3', 'MiniGame1/School-3mini3-image.jpg', 1),
('9ddad983-667e-4ede-a6c4-55d4f40644fd', 9, 'เนค9', 'nex9', 'Hospital-9nex9-voiceTH.mp3', 'Hospital-9nex9-voiceEN.mp3', 'Hospital-9nex9-image.jpg', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:53:04', '2018-01-09 07:53:04', 'MiniGame1/Hospital-nex99-voiceTH.mp3', 'MiniGame1/Hospital-nex99-voiceEN.mp3', 'MiniGame1/Hospital-nex99-image.jpg', 1),
('a79ce14e-357c-49b9-b7c2-63793cf59f99', 2, 'มินิ2', 'mini2', 'School-2mini2-voiceTH.mp3', 'School-2mini2-voiceEN.mp3', 'School-2mini2-image.jpg', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:30:10', '2018-03-30 07:30:10', 'MiniGame1/School-2mini2-voiceTH.mp3', 'MiniGame1/School-2mini2-voiceEN.mp3', 'MiniGame1/School-2mini2-image.jpg', 1),
('ae97a123-defc-490a-bd09-1d4a43b988d9', 4, 'มินิ4', 'mini4', 'School-4mini4-voiceTH.mp3', 'School-4mini4-voiceEN.mp3', 'School-4mini4-image.jpg', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:30:10', '2018-03-30 07:30:10', 'MiniGame1/School-4mini4-voiceTH.mp3', 'MiniGame1/School-4mini4-voiceEN.mp3', 'MiniGame1/School-4mini4-image.jpg', 1),
('b971f3bd-adfc-48ae-8bd8-887df202804c', 2, 'เนค2', 'nex2', 'Hospital-2nex2-voiceTH.mp3', 'Hospital-2nex2-voiceEN.mp3', 'HospitalTAK-nex22-image.jpg', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:53:03', '2018-01-09 07:53:03', 'MiniGame1/Hospital-nex22-voiceTH.mp3', 'MiniGame1/Hospital-nex22-voiceEN.mp3', 'MiniGame1/HospitalTAK-nex22-image.jpg', 1),
('f70300b2-fdfd-4780-9ddb-022e64ffeb3d', 9, 'มินิ9', 'mini9', 'School-9mini9-voiceTH.mp3', 'School-9mini9-voiceEN.mp3', 'School-9mini9-image.jpg', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:30:10', '2018-03-30 07:30:10', 'MiniGame1/School-9mini9-voiceTH.mp3', 'MiniGame1/School-9mini9-voiceEN.mp3', 'MiniGame1/School-9mini9-image.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gamesthree`
--

CREATE TABLE `gamesthree` (
  `id` char(36) CHARACTER SET utf8 NOT NULL,
  `game3_number` int(1) NOT NULL,
  `game3_nameTH` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `game3_nameEN` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `game3_voiceTH_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game3_voiceEN_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game3_image_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game3_duration` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `game_id` char(36) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `game3_voiceTH_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game3_voiceEN_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game3_image_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game3_complete_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamesthree`
--

INSERT INTO `gamesthree` (`id`, `game3_number`, `game3_nameTH`, `game3_nameEN`, `game3_voiceTH_name`, `game3_voiceEN_name`, `game3_image_name`, `game3_duration`, `game_id`, `created`, `updated`, `game3_voiceTH_path`, `game3_voiceEN_path`, `game3_image_path`, `game3_complete_status`) VALUES
('098ae35d-94fc-421b-853d-e66b9a8f41ef', 4, 'ก34', 'g34', 'School-4g34-voiceTH.mp3', 'School-4g34-voiceEN.mp3', 'School-4g34-image.jpg', 'กลางวัน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:36:01', '2018-03-30 07:36:01', 'MiniGame3/School-4g34-voiceTH.mp3', 'MiniGame3/School-4g34-voiceEN.mp3', 'MiniGame3/School-4g34-image.jpg', 1),
('0f9d2057-313c-46c0-b68a-3cf7facec046', 4, 'เนค4', 'nex4', 'Hospital-4nex4-voiceTH.mp3', 'Hospital-4nex4-voiceEN.mp3', 'Hospital-4nex4-image.jpg', 'กลางคืน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:56:58', '2018-01-09 07:56:58', 'MiniGame3/Hospital-4nex4-voiceTH.mp3', 'MiniGame3/Hospital-4nex4-voiceEN.mp3', 'MiniGame3/Hospital-4nex4-image.jpg', 1),
('19d4fc26-4e76-4a0f-acd5-d1ec46f36a28', 2, 'ก32', 'g32', 'School-2g32-voiceTH.mp3', 'School-2g32-voiceEN.mp3', 'School-2g32-image.jpg', 'กลางวัน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:36:01', '2018-03-30 07:36:01', 'MiniGame3/School-2g32-voiceTH.mp3', 'MiniGame3/School-2g32-voiceEN.mp3', 'MiniGame3/School-2g32-image.jpg', 1),
('23ffb38e-8148-4329-a36a-00bfceb7ab99', 1, 'เนค1', 'nex1', 'Hospital-1nex1-voiceTH.mp3', 'Hospital-1nex1-voiceEN.mp3', 'HospitalTAK-nex11-image.jpg', 'กลางวัน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:56:58', '2018-01-09 07:56:58', 'MiniGame3/Hospital-1nex1-voiceTH.mp3', 'MiniGame3/Hospital-1nex1-voiceEN.mp3', 'MiniGame3/HospitalTAK-nex11-image.jpg', 1),
('318caa5b-e8bc-440c-a311-c25da7da1d3f', 6, 'เนค6', 'nex6', 'Hospital-6nex6-voiceTH.mp3', 'Hospital-6nex6-voiceEN.mp3', 'Hospital-6nex6-image.jpg', 'กลางคืน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:56:58', '2018-01-09 07:56:58', 'MiniGame3/Hospital-6nex6-voiceTH.mp3', 'MiniGame3/Hospital-6nex6-voiceEN.mp3', 'MiniGame3/Hospital-6nex6-image.jpg', 1),
('3cf2a4d3-229c-4dbf-aa6a-575a87a2165f', 6, 'ก36', 'g36', 'School-6g36-voiceTH.mp3', 'School-6g36-voiceEN.mp3', 'School-6g36-image.jpg', 'กลางคืน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:36:01', '2018-03-30 07:36:01', 'MiniGame3/School-6g36-voiceTH.mp3', 'MiniGame3/School-6g36-voiceEN.mp3', 'MiniGame3/School-6g36-image.jpg', 1),
('53e8198e-2e29-4357-a308-36613d3e42f1', 8, 'ก38', 'g38', 'School-8g38-voiceTH.mp3', 'School-8g38-voiceEN.mp3', 'School-8g38-image.jpg', 'กลางคืน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:36:01', '2018-03-30 07:36:01', 'MiniGame3/School-8g38-voiceTH.mp3', 'MiniGame3/School-8g38-voiceEN.mp3', 'MiniGame3/School-8g38-image.jpg', 1),
('547a2b5a-7a73-417e-8a1f-f7ae82537596', 3, 'เนค3', 'nex3', 'Hospital-3nex3-voiceTH.mp3', 'Hospital-3nex3-voiceEN.mp3', 'Hospital-3nex3-image.jpg', 'กลางวัน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:56:58', '2018-01-09 07:56:58', 'MiniGame3/Hospital-3nex3-voiceTH.mp3', 'MiniGame3/Hospital-3nex3-voiceEN.mp3', 'MiniGame3/Hospital-3nex3-image.jpg', 1),
('6a8842ee-f92b-403b-b65d-2a4ce235a663', 2, 'เนค2', 'nex2', 'Hospital-2nex2-voiceTH.mp3', 'Hospital-2nex2-voiceEN.mp3', 'Hospital-2nex2-image.jpg', 'กลางคืน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:56:58', '2018-01-09 07:56:58', 'MiniGame3/Hospital-2nex2-voiceTH.mp3', 'MiniGame3/Hospital-2nex2-voiceEN.mp3', 'MiniGame3/Hospital-2nex2-image.jpg', 1),
('6c2ac406-a788-49a6-9596-8c47d13a4a29', 5, 'เนค5', 'nex5', 'Hospital-5nex5-voiceTH.mp3', 'Hospital-5nex5-voiceEN.mp3', 'Hospital-5nex5-image.jpg', 'กลางวัน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:56:58', '2018-01-09 07:56:58', 'MiniGame3/Hospital-5nex5-voiceTH.mp3', 'MiniGame3/Hospital-5nex5-voiceEN.mp3', 'MiniGame3/Hospital-5nex5-image.jpg', 1),
('76d22008-6ec9-4645-be25-38e1f95fc0a8', 9, 'ก39', 'g39', 'School-9g39-voiceTH.mp3', 'School-9g39-voiceEN.mp3', 'School-9g39-image.jpg', 'กลางคืน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:36:01', '2018-03-30 07:36:01', 'MiniGame3/School-9g39-voiceTH.mp3', 'MiniGame3/School-9g39-voiceEN.mp3', 'MiniGame3/School-9g39-image.jpg', 1),
('7e6d8d83-16c4-4462-bfb9-2fe67278b31e', 8, 'เนค8', 'nex8', 'Hospital-8nex8-voiceTH.mp3', 'Hospital-8nex8-voiceEN.mp3', 'Hospital-8nex8-image.jpg', 'กลางคืน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:56:58', '2018-01-09 07:56:58', 'MiniGame3/Hospital-8nex8-voiceTH.mp3', 'MiniGame3/Hospital-8nex8-voiceEN.mp3', 'MiniGame3/Hospital-8nex8-image.jpg', 1),
('b2ef78d7-9617-4331-8add-f6e1ec9950e2', 5, 'ก35', 'g35', 'School-5g35-voiceTH.mp3', 'School-5g35-voiceEN.mp3', 'School-5g35-image.jpg', 'กลางคืน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:36:01', '2018-03-30 07:36:01', 'MiniGame3/School-5g35-voiceTH.mp3', 'MiniGame3/School-5g35-voiceEN.mp3', 'MiniGame3/School-5g35-image.jpg', 1),
('be953391-811c-4005-9c30-2b6c3583257a', 7, 'ก37', 'g37', 'School-7g37-voiceTH.mp3', 'School-7g37-voiceEN.mp3', 'School-7g37-image.jpg', 'กลางคืน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:36:01', '2018-03-30 07:36:01', 'MiniGame3/School-7g37-voiceTH.mp3', 'MiniGame3/School-7g37-voiceEN.mp3', 'MiniGame3/School-7g37-image.jpg', 1),
('ca03a4f3-4d10-4b71-93a6-9642c854bfa6', 3, 'ก33', 'g33', 'School-3g33-voiceTH.mp3', 'School-3g33-voiceEN.mp3', 'School-3g33-image.jpg', 'กลางวัน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:36:01', '2018-03-30 07:36:01', 'MiniGame3/School-3g33-voiceTH.mp3', 'MiniGame3/School-3g33-voiceEN.mp3', 'MiniGame3/School-3g33-image.jpg', 1),
('d115dfd8-9546-4291-9cef-2b0b72c9db14', 7, 'เนค7', 'nex7', 'Hospital-7nex7-voiceTH.mp3', 'Hospital-7nex7-voiceEN.mp3', 'Hospital-7nex7-image.jpg', 'กลางวัน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:56:58', '2018-01-09 07:56:58', 'MiniGame3/Hospital-7nex7-voiceTH.mp3', 'MiniGame3/Hospital-7nex7-voiceEN.mp3', 'MiniGame3/Hospital-7nex7-image.jpg', 1),
('e0e8e8a9-d35d-49a6-bbca-5e327062aa21', 9, 'เนค9', 'nex9', 'Hospital-9nex9-voiceTH.mp3', 'Hospital-9nex9-voiceEN.mp3', 'Hospital-9nex9-image.jpg', 'กลางวัน', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:56:58', '2018-01-09 07:56:58', 'MiniGame3/Hospital-9nex9-voiceTH.mp3', 'MiniGame3/Hospital-9nex9-voiceEN.mp3', 'MiniGame3/Hospital-9nex9-image.jpg', 1),
('f10079ca-20ab-4454-a05d-6b297ffa361a', 1, 'ก31', 'g31', 'School-1g31-voiceTH.mp3', 'School-1g31-voiceEN.mp3', 'School-1g31-image.jpg', 'กลางวัน', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:36:01', '2018-03-30 07:36:01', 'MiniGame3/School-1g31-voiceTH.mp3', 'MiniGame3/School-1g31-voiceEN.mp3', 'MiniGame3/School-1g31-image.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gamestwo`
--

CREATE TABLE `gamestwo` (
  `id` char(36) CHARACTER SET utf8 NOT NULL,
  `game2_number` int(1) NOT NULL,
  `game2_nameTH` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `game2_nameEN` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `game2_voiceTH_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game2_voiceEN_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game2_image_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game2_size` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `game_id` char(36) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `game2_voiceTH_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game2_voiceEN_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game2_image_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `game2_complete_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamestwo`
--

INSERT INTO `gamestwo` (`id`, `game2_number`, `game2_nameTH`, `game2_nameEN`, `game2_voiceTH_name`, `game2_voiceEN_name`, `game2_image_name`, `game2_size`, `game_id`, `created`, `updated`, `game2_voiceTH_path`, `game2_voiceEN_path`, `game2_image_path`, `game2_complete_status`) VALUES
('01ef9016-605f-45f9-9a95-7cf202c3904b', 5, 'มินิ3', 'mini3', 'School-3mini3-voiceTH.mp3', 'School-3mini3-voiceEN.mp3', 'School-3mini3-image.jpg', 'l', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-3mini3-voiceTH.mp3', 'MiniGame2/School-3mini3-voiceEN.mp3', 'MiniGame2/School-3mini3-image.jpg', 1),
('07ed3a22-a47a-41de-b6c9-5be7ce4a8915', 8, 'ล4', 'sm4', 'School-sm44-voiceTH.mp3', 'School-sm44-voiceEN.mp3', 'School-sm44-image.jpg', 's', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-sm44-voiceTH.mp3', 'MiniGame2/School-sm44-voiceEN.mp3', 'MiniGame2/School-sm44-image.jpg', 1),
('085a4613-b37a-4e15-a6f1-95136624fbce', 18, 'ล9', 'sm9', 'School-sm99-voiceTH.mp3', 'School-sm99-voiceEN.mp3', 'School-sm99-image.jpg', 's', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-sm99-voiceTH.mp3', 'MiniGame2/School-sm99-voiceEN.mp3', 'MiniGame2/School-sm99-image.jpg', 1),
('0c5d40f4-382c-49a7-b091-0ca0be6272e0', 13, 'เนค17', 'nex17', 'Hospital-7nex17-voiceTH.mp3', 'Hospital-7nex17-voiceEN.mp3', 'Hospital-7nex17-image.jpg', 'l', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-7nex17-voiceTH.mp3', 'MiniGame2/Hospital-7nex17-voiceEN.mp3', 'MiniGame2/Hospital-7nex17-image.jpg', 1),
('134cec92-9234-45f7-86a5-0364074d5b30', 1, 'มินิ1', 'mini1', 'School-1mini1-voiceTH.mp3', 'School-1mini1-voiceEN.mp3', 'School-1mini1-image.jpg', 'l', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-1mini1-voiceTH.mp3', 'MiniGame2/School-1mini1-voiceEN.mp3', 'MiniGame2/School-1mini1-image.jpg', 1),
('1c2615fa-6ed0-484c-bdbd-d4ec3c6f71eb', 6, 'เนค23', 'nex23', 'Hospital-nex233-voiceTH.mp3', 'Hospital-nex233-voiceEN.mp3', 'Hospital-nex233-image.jpg', 's', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-nex233-voiceTH.mp3', 'MiniGame2/Hospital-nex233-voiceEN.mp3', 'MiniGame2/Hospital-nex233-image.jpg', 1),
('1c615e8a-4a3c-4ba2-b068-bbf2d19d7007', 17, 'มินิ9', 'mini9', 'School-9mini9-voiceTH.mp3', 'School-9mini9-voiceEN.mp3', 'School-9mini9-image.jpg', 'l', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-9mini9-voiceTH.mp3', 'MiniGame2/School-9mini9-voiceEN.mp3', 'MiniGame2/School-9mini9-image.jpg', 1),
('2cabc84a-bd08-4ba1-808a-3ae07920d1a3', 7, 'เนค14', 'nex14', 'Hospital-4nex14-voiceTH.mp3', 'Hospital-4nex14-voiceEN.mp3', 'Hospital-4nex14-image.jpg', 'l', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-4nex14-voiceTH.mp3', 'MiniGame2/Hospital-4nex14-voiceEN.mp3', 'MiniGame2/Hospital-4nex14-image.jpg', 1),
('2f667288-1d6e-4218-bb4c-916a89d4f14d', 11, 'มินิ6', 'mini6', 'School-6mini6-voiceTH.mp3', 'School-6mini6-voiceEN.mp3', 'School-6mini6-image.jpg', 'l', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-6mini6-voiceTH.mp3', 'MiniGame2/School-6mini6-voiceEN.mp3', 'MiniGame2/School-6mini6-image.jpg', 1),
('3b3c037d-7713-4dbf-b669-f224748120db', 10, 'เนค25', 'nex25', 'Hospital-nex255-voiceTH.mp3', 'Hospital-nex255-voiceEN.mp3', 'Hospital-nex255-image.jpg', 's', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-nex255-voiceTH.mp3', 'MiniGame2/Hospital-nex255-voiceEN.mp3', 'MiniGame2/Hospital-nex255-image.jpg', 1),
('3f9b3ea0-a3c9-48c5-8f3f-67f5e40dae10', 7, 'มินิ4', 'mini4', 'School-4mini4-voiceTH.mp3', 'School-4mini4-voiceEN.mp3', 'School-4mini4-image.jpg', 'l', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-4mini4-voiceTH.mp3', 'MiniGame2/School-4mini4-voiceEN.mp3', 'MiniGame2/School-4mini4-image.jpg', 1),
('52204cfa-1b85-47c3-a568-98d857477acb', 15, 'เนค18', 'nex18', 'Hospital-8nex18-voiceTH.mp3', 'Hospital-8nex18-voiceEN.mp3', 'Hospital-8nex18-image.jpg', 'l', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-8nex18-voiceTH.mp3', 'MiniGame2/Hospital-8nex18-voiceEN.mp3', 'MiniGame2/Hospital-8nex18-image.jpg', 1),
('6ea18159-373b-4585-8986-eef035fe185d', 3, 'มินิ2', 'mini2', 'School-2mini2-voiceTH.mp3', 'School-2mini2-voiceEN.mp3', 'School-2mini2-image.jpg', 'l', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-2mini2-voiceTH.mp3', 'MiniGame2/School-2mini2-voiceEN.mp3', 'MiniGame2/School-2mini2-image.jpg', 1),
('6f2c0048-4d7f-4075-b2d6-d44eb7035eb1', 16, 'เนค28', 'nex28', 'Hospital-nex288-voiceTH.mp3', 'Hospital-nex288-voiceEN.mp3', 'Hospital-nex288-image.jpg', 's', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-nex288-voiceTH.mp3', 'MiniGame2/Hospital-nex288-voiceEN.mp3', 'MiniGame2/Hospital-nex288-image.jpg', 1),
('897e4e74-fa4f-40ae-89b3-6565ee68b559', 11, 'เนค16', 'nex16', 'Hospital-6nex16-voiceTH.mp3', 'Hospital-6nex16-voiceEN.mp3', 'Hospital-6nex16-image.jpg', 'l', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-6nex16-voiceTH.mp3', 'MiniGame2/Hospital-6nex16-voiceEN.mp3', 'MiniGame2/Hospital-6nex16-image.jpg', 1),
('8b23c60c-caea-4ad6-8a3f-50c8928f18fe', 13, 'มินิ7', 'mini7', 'School-7mini7-voiceTH.mp3', 'School-7mini7-voiceEN.mp3', 'School-7mini7-image.jpg', 'l', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-7mini7-voiceTH.mp3', 'MiniGame2/School-7mini7-voiceEN.mp3', 'MiniGame2/School-7mini7-image.jpg', 1),
('8bd7a912-22e8-4cd4-b3e6-5d21ba09b73c', 4, 'เนค22', 'nex22', 'Hospital-nex222-voiceTH.mp3', 'Hospital-nex222-voiceEN.mp3', 'Hospital-nex222-image.jpg', 's', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-nex222-voiceTH.mp3', 'MiniGame2/Hospital-nex222-voiceEN.mp3', 'MiniGame2/Hospital-nex222-image.jpg', 1),
('9108398e-b0e4-49e9-9613-ff3dd3b5d8de', 12, 'ล6', 'sm6', 'School-sm66-voiceTH.mp3', 'School-sm66-voiceEN.mp3', 'School-sm66-image.jpg', 's', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-sm66-voiceTH.mp3', 'MiniGame2/School-sm66-voiceEN.mp3', 'MiniGame2/School-sm66-image.jpg', 1),
('951e5a6c-295e-4a16-80ec-f6918ede6a10', 2, 'เนค21', 'nex21', 'Hospital-nex211-voiceTH.mp3', 'HospitalTAK-nex211-voiceEN.mp3', 'HospitalTAK-nex211-image.jpg', 's', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-nex211-voiceTH.mp3', 'http://localhost/Dropbox/kidsociety/uploadfile/HospitalTAK/MiniGame2/HospitalTAK-nex211-voiceEN.mp3', 'http://localhost/Dropbox/kidsociety/uploadfile/HospitalTAK/MiniGame2/HospitalTAK-nex211-image.jpg', 1),
('9601d80e-9391-4f05-827d-21707cd5f358', 5, 'เนค13', 'nex13', 'Hospital-3nex13-voiceTH.mp3', 'Hospital-3nex13-voiceEN.mp3', 'Hospital-3nex13-image.jpg', 'l', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-3nex13-voiceTH.mp3', 'MiniGame2/Hospital-3nex13-voiceEN.mp3', 'MiniGame2/Hospital-3nex13-image.jpg', 1),
('9633f6fb-32ea-46fa-aba4-e23a69b3bd54', 9, 'มินิ5', 'mini5', 'School-5mini5-voiceTH.mp3', 'School-5mini5-voiceEN.mp3', 'School-5mini5-image.jpg', 'l', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-5mini5-voiceTH.mp3', 'MiniGame2/School-5mini5-voiceEN.mp3', 'MiniGame2/School-5mini5-image.jpg', 1),
('a0eaa5c0-7655-4368-9761-101e4e2beedd', 2, 'ล1', 'sm1', 'School-sm11-voiceTH.mp3', 'School-sm11-voiceEN.mp3', 'School-sm11-image.jpg', 's', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-sm11-voiceTH.mp3', 'MiniGame2/School-sm11-voiceEN.mp3', 'MiniGame2/School-sm11-image.jpg', 1),
('a6f4ebb2-d712-46f0-a9db-fc044e0c24c0', 18, 'เนค29', 'nex29', 'Hospital-nex299-voiceTH.mp3', 'Hospital-nex299-voiceEN.mp3', 'Hospital-nex299-image.jpg', 's', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-nex299-voiceTH.mp3', 'MiniGame2/Hospital-nex299-voiceEN.mp3', 'MiniGame2/Hospital-nex299-image.jpg', 1),
('c47e5a8d-31b5-4311-915f-12a04dd2b3a7', 14, 'ล7', 'sm7', 'School-sm77-voiceTH.mp3', 'School-sm77-voiceEN.mp3', 'School-sm77-image.jpg', 's', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-sm77-voiceTH.mp3', 'MiniGame2/School-sm77-voiceEN.mp3', 'MiniGame2/School-sm77-image.jpg', 1),
('c53a8b4b-9d6a-434e-87d6-b4ff88860100', 12, 'เนค26', 'nex26', 'Hospital-nex266-voiceTH.mp3', 'Hospital-nex266-voiceEN.mp3', 'Hospital-nex266-image.jpg', 's', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-nex266-voiceTH.mp3', 'MiniGame2/Hospital-nex266-voiceEN.mp3', 'MiniGame2/Hospital-nex266-image.jpg', 1),
('c90a2dcd-436e-47c4-891e-0ed675c733fa', 14, 'เนค27', 'nex27', 'Hospital-nex277-voiceTH.mp3', 'Hospital-nex277-voiceEN.mp3', 'Hospital-nex277-image.jpg', 's', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-nex277-voiceTH.mp3', 'MiniGame2/Hospital-nex277-voiceEN.mp3', 'MiniGame2/Hospital-nex277-image.jpg', 1),
('d0875e20-977b-4042-b3f2-8f6c1ec6d405', 16, 'ล8', 'sm8', 'School-sm88-voiceTH.mp3', 'School-sm88-voiceEN.mp3', 'School-sm88-image.jpg', 's', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-sm88-voiceTH.mp3', 'MiniGame2/School-sm88-voiceEN.mp3', 'MiniGame2/School-sm88-image.jpg', 1),
('d33338eb-956a-4b46-bc58-1f8fed7b649c', 8, 'เนค24', 'nex24', 'Hospital-nex244-voiceTH.mp3', 'Hospital-nex244-voiceEN.mp3', 'Hospital-nex244-image.jpg', 's', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-nex244-voiceTH.mp3', 'MiniGame2/Hospital-nex244-voiceEN.mp3', 'MiniGame2/Hospital-nex244-image.jpg', 1),
('d74387e6-9aae-45a5-8d9e-23ad7fbd9859', 6, 'ล3', 'sm3', 'School-sm33-voiceTH.mp3', 'School-sm33-voiceEN.mp3', 'School-sm33-image.jpg', 's', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-sm33-voiceTH.mp3', 'MiniGame2/School-sm33-voiceEN.mp3', 'MiniGame2/School-sm33-image.jpg', 1),
('da45bec0-fff4-4ce1-9bd8-8945ae078700', 15, 'มินิ8', 'mini8', 'School-8mini8-voiceTH.mp3', 'School-8mini8-voiceEN.mp3', 'School-8mini8-image.jpg', 'l', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-8mini8-voiceTH.mp3', 'MiniGame2/School-8mini8-voiceEN.mp3', 'MiniGame2/School-8mini8-image.jpg', 1),
('dd08f38b-7734-4754-a0f6-1ac640c67cd7', 3, 'เนค12', 'nex12', 'Hospital-2nex12-voiceTH.mp3', 'Hospital-2nex12-voiceEN.mp3', 'Hospital-2nex12-image.jpg', 'l', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-2nex12-voiceTH.mp3', 'MiniGame2/Hospital-2nex12-voiceEN.mp3', 'MiniGame2/Hospital-2nex12-image.jpg', 1),
('e5583f82-dbc7-4651-b9d3-871496bd09f6', 10, 'ล5', 'sm5', 'School-sm55-voiceTH.mp3', 'School-sm55-voiceEN.mp3', 'School-sm55-image.jpg', 's', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-sm55-voiceTH.mp3', 'MiniGame2/School-sm55-voiceEN.mp3', 'MiniGame2/School-sm55-image.jpg', 1),
('ea128d2c-a90f-4e58-b62d-102def3d81d6', 4, 'ล2', 'sm2', 'School-sm22-voiceTH.mp3', 'School-sm22-voiceEN.mp3', 'School-sm22-image.jpg', 's', '0159b259-7cf8-4e39-9c84-2871e6af328b', '2018-03-30 07:33:58', '2018-03-30 07:33:58', 'MiniGame2/School-sm22-voiceTH.mp3', 'MiniGame2/School-sm22-voiceEN.mp3', 'MiniGame2/School-sm22-image.jpg', 1),
('ec906786-9439-43a5-bbb6-e695655e3212', 9, 'เนค15', 'nex15', 'Hospital-5nex15-voiceTH.mp3', 'Hospital-5nex15-voiceEN.mp3', 'Hospital-5nex15-image.jpg', 'l', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-5nex15-voiceTH.mp3', 'MiniGame2/Hospital-5nex15-voiceEN.mp3', 'MiniGame2/Hospital-5nex15-image.jpg', 1),
('ef058c94-0dbe-4ad0-a465-cf19e33d870e', 17, 'เนค19', 'nex19', 'Hospital-9nex19-voiceTH.mp3', 'Hospital-9nex19-voiceEN.mp3', 'Hospital-9nex19-image.jpg', 'l', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/Hospital-9nex19-voiceTH.mp3', 'MiniGame2/Hospital-9nex19-voiceEN.mp3', 'MiniGame2/Hospital-9nex19-image.jpg', 1),
('ff18a383-3ed5-41fa-91cf-5e1fb96f9b90', 1, 'เนค11', 'nex11', 'HospitalTAK-nex111-voiceTH.mp3', 'Hospital-1nex11-voiceEN.mp3', 'HospitalTAK-nex111-image.jpg', 'l', '9f56cd2a-f6d5-4e54-ad18-608a44299521', '2018-01-09 07:55:28', '2018-01-09 07:55:28', 'MiniGame2/HospitalTAK-nex111-voiceTH.mp3', 'MiniGame2/Hospital-1nex11-voiceEN.mp3', 'MiniGame2/HospitalTAK-nex111-image.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` char(36) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `game_id` char(36) DEFAULT NULL,
  `game_name` varchar(50) DEFAULT NULL,
  `score_g1` int(2) DEFAULT NULL,
  `score_g2` int(2) DEFAULT NULL,
  `score_g3` int(2) DEFAULT NULL,
  `score_g4` int(2) DEFAULT NULL,
  `total_score` int(2) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `username`, `name`, `game_id`, `game_name`, `score_g1`, `score_g2`, `score_g3`, `score_g4`, `total_score`, `created`, `updated`) VALUES
('123456789123456789123456789123456789', 'fernpresso', 'น้องเฟิร์น', '9f56cd2a-f6d5-4e54-ad18-608a44299521', 'โรงพยาบาล', 8, 10, 10, 7, 35, '0000-00-00 00:00:00', NULL),
('123654789654123654789654123654789654', 'first', 'น้องกาย', '0159b259-7cf8-4e39-9c84-2871e6af328b', 'โรงเรียน', 11, 11, 12, 13, 14, '2018-04-27 00:00:00', '2018-04-27 00:00:00'),
('987654321987654321987654321987654321', 'test', 'น้องอาร์ม', '9f56cd2a-f6d5-4e54-ad18-608a44299521', 'โรงพยาบาล', 10, 15, 15, 10, 50, '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecodes`
--
ALTER TABLE `activecodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamesfour`
--
ALTER TABLE `gamesfour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamesone`
--
ALTER TABLE `gamesone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamesthree`
--
ALTER TABLE `gamesthree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamestwo`
--
ALTER TABLE `gamestwo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
