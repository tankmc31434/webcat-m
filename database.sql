-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for webpet
CREATE DATABASE IF NOT EXISTS `webpet` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `webpet`;

-- Dumping structure for table webpet.annouce
CREATE TABLE IF NOT EXISTS `annouce` (
  `annouce_id` int(11) NOT NULL AUTO_INCREMENT,
  `annouce_subject` varchar(100) NOT NULL,
  `annouce_title` varchar(150) NOT NULL,
  `annouce_pic` varchar(150) NOT NULL,
  `annouce_status` varchar(50) NOT NULL,
  `annouce_credate` date NOT NULL,
  `annouce_lastdate` date NOT NULL,
  `annouce_file` text NOT NULL,
  `annouce_creby` int(11) NOT NULL,
  PRIMARY KEY (`annouce_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table webpet.annouce: ~0 rows (approximately)
INSERT INTO `annouce` (`annouce_id`, `annouce_subject`, `annouce_title`, `annouce_pic`, `annouce_status`, `annouce_credate`, `annouce_lastdate`, `annouce_file`, `annouce_creby`) VALUES
	(13, 'โรงพยาบาลสัตว์ "พอว์ บัดดี้" เปิดศูนย์อุบัติเหตุฉุกเฉิน 24 ชม.', 'โรงพยาบาลสัตว์ "พอว์ บัดดี้" เปิดศูนย์อุบัติเหตุ – ฉุกเฉิน รับกระแส "เจ้าเท้าปุย" คือหนึ่งในสมาชิกของครอบครัว ชูจุดเด่นดูแลรักษาสัตว์ในทุกช่วงวัยตลอด ', 'announce-1098914501-4uf6KbKYkRQQ1iKKv8oZ (1).png', 'Enable', '2024-01-28', '2024-01-28', '6488-6488.html', 0);

-- Dumping structure for table webpet.clinic
CREATE TABLE IF NOT EXISTS `clinic` (
  `clinic_id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_subject` varchar(250) NOT NULL,
  `clinic_address` varchar(250) NOT NULL,
  `clinic_province` int(4) NOT NULL,
  `clinic_tel` varchar(50) NOT NULL,
  `clinic_facebook` varchar(250) NOT NULL,
  `clinic_map` varchar(250) NOT NULL,
  `clinic_pic` varchar(150) NOT NULL,
  `clinic_status` varchar(50) NOT NULL,
  `clinic_credate` date NOT NULL,
  `clinic_lastdate` date NOT NULL,
  `clinic_opentime` varchar(50) NOT NULL,
  `clinic_creby` int(11) NOT NULL,
  PRIMARY KEY (`clinic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table webpet.clinic: ~11 rows (approximately)
INSERT INTO `clinic` (`clinic_id`, `clinic_subject`, `clinic_address`, `clinic_province`, `clinic_tel`, `clinic_facebook`, `clinic_map`, `clinic_pic`, `clinic_status`, `clinic_credate`, `clinic_lastdate`, `clinic_opentime`, `clinic_creby`) VALUES
	(19, 'โรงพยาบาลสัตว์เชียงราย Chiang Rai Pet Hospital', 'ตรงข้ามปั๊ม ปตท.เด่นห้า อ.เมือง จ.เชียงราย เทศบาลนครเชียงราย, จังหวัดเชียงราย 57000', 13, '053717119', '', 'https://goo.gl/maps/LdDFNtYwK9GbnZ2EA', 'clinic-1797339490-7610943222204400479_n.png', 'Enable', '2024-01-28', '2024-01-28', '09.00 น. - 24.00 น.', 0),
	(20, 'โรงพยาบาลสัตว์แอทโมส', '539 ซอย สังคมสงเคราะห์ 11 Saphansong, Wang Thonglang, Bangkok 10310', 1, '062-524-2429', 'https://www.facebook.com/utmostpet', 'https://maps.app.goo.gl/xJy4FBdSJvMbbhBt7?g_st=il', 'clinic-1111532938-4220227713944342400_n.png', 'Enable', '2024-01-28', '2024-01-28', '09.00 น. - 21.00 น.', 0),
	(21, 'โรงพยาบาลสัตว์กาดต์บ้านใหม่', '74/4 ม.4 ต.ริมกก อ.เมือง จ.เชียงราย, Chiang Rai, Thailand, Chiang Rai', 13, '088-1220099', ' https://web.facebook.com/profile.php?id=100063773764609', 'https://maps.app.goo.gl/NWQcDkgmgCndVdtD', 'clinic-1178471242-Rectangle 1.png', 'Enable', '2024-02-11', '2024-02-11', '09.00-20.00 น.', 0),
	(22, 'ท่าสุดสัตวแพทย์ รักษาสัตว์เชียงราย', '115 หมู่ที่3 ถ.พหลโยธิน ต.ท่าสุด อ.เมือง จ.เชียงราย, Chang Rai, Thailand, Chiang Rai', 13, '053787200', 'https://web.facebook.com/thasudvet/?_rdc=1&_rdr', '', 'clinic-1706922137-Rectangle 1 (1).png', 'Enable', '2024-02-11', '2024-02-11', '09.00-18.00 น.', 0),
	(23, 'นิวโฮมสัตวแพทย์', 'สี่แยกป่าตึง หรือ สี่แยกโรงเรียนนานาชาติเชียงราย ถ้ามาจากในเมือง ทางสถานีตำรวจภูธรเชียงราย ลงสะพานพญามังราย อยู่สี่แยกไฟแดงที่ 2 ถัดจากสี่แยกตลาดบ้านใหม่', 13, '0991314382', 'https://web.facebook.com/janvet64', 'https://goo.gl/maps/bu59vHJUwvAUwPoU8', 'clinic-661877403-Rectangle 1 (2).png', 'Enable', '2024-02-11', '2024-02-11', '9.00 - 20.00 น. หยุดทุกวันอาทิตย์', 0),
	(24, 'คลินิกรักษาสัตว์เพ็ทโฮม', ' เลขที่ 177/3 ตำบล บ้านดู่ อำเภอเมืองเชียงราย เชียงราย 57100', 13, '0841758884', 'https://web.facebook.com/pages/%E0%B8%84%E0%B8%A5%E0%B8%B4%E0%B8%99%E0%B8%B4%E0%B8%81%E0%B8%A3%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%B2%E0%B8%AA%E0%B8%B1%E0%B8%95%E0%B8%A7%E0%B9%8C%E0%B9%80%E0%B8%9E%E0%B9%87%E0%B8%97%E0%B9%82%E0%B8%AE%E0%B8%A1-%E0%B9%80%E', '', 'clinic-2092351291-Rectangle 1 (3).png', 'Enable', '2024-02-11', '2024-02-11', '9.00 - 20.00 น.', 0),
	(25, 'โฮมตูบและเหมียวสัตวแพทย์', '7 ม.6 ตำบลสันทราย, Amphoe Chiang Rai, Thailand, Chiang Ra', 13, '091 858 3824', 'https://web.facebook.com/HOMETUB/?_rdc=1&_rdr', '', 'clinic-697136014-Rectangle 1 (4).png', 'Enable', '2024-02-11', '2024-02-11', '08:30 - 20:30 น. ', 0),
	(26, 'โรงพยาบาลสัตว์เลี้ยงหมออานนท์', '370/4 หมู่15 ถนนสันโค้งหลวง ต.รอบเวียง อ.เมือง, Chiang Rai, Thailand, Chiang Rai', 13, '084 611 8545', 'https://web.facebook.com/arnonpethospital?_rdc=1&_rdr', '', 'clinic-1277598509-Rectangle 1 (5).png', 'Enable', '2024-02-11', '2024-02-11', '08:00 - 22:00 น. ', 0),
	(27, 'โรงพยาบาลสัตว์สหมิตร', '109/5 Moo.19, Sahamit Road, Chiang Rai, Thailand, Chiang Rai', 13, '053 716 840', 'https://web.facebook.com/SahamitrAnimalHospital/', '', 'clinic-311235894-Rectangle 1 (6).png', 'Enable', '2024-02-11', '2024-02-11', 'เปิดตลอดเวลา', 0),
	(28, 'เชียงรายรักษาสัตว์', ' 5/2 ม.8 ต.ป่าก่อดำ อ.แม่ลาว (หน้า สนง.เทศบาล ตำบลป่าก่อดำ/ติดกับ เฮง ลิสซิ่ง), Chiang Rai, Thailand, Chiang Rai', 13, '099 383 5791', 'https://web.facebook.com/chiangrairaksasatmaelao', '', 'clinic-1746574509-Rectangle 7.png', 'Enable', '2024-02-11', '2024-02-11', '08:00 - 19:00 น', 0),
	(29, 'เฮือนฮักษาสัตว์(เจียงฮาย)', ' 50/42 หมู่9 ถนนพ่อขุน ตำบลรอบเวียง , Chiang Rai, Thailand, Chiang Rai', 13, '096 786 8614', 'https://web.facebook.com/HuanhugsasatCR/?_rdc=1&_rdr', '', 'clinic-133826453-Rectangle 1 (7).png', 'Enable', '2024-02-11', '2024-02-11', '08:30 - 19:00 น. ', 0),
	(30, 'คลินิกรักษาสัตว์หมอแพรช์', '223 Moo.8 Ban du , , Chiang Rai, Thailand, Chiang Rai', 13, '093 046 4644', 'https://web.facebook.com/KhlinikRaksaSatwHmxPhaerChDrPraeAnimalClinic/?_rdc=1&_rdr', '', 'clinic-120747900-Rectangle 1 (8).png', 'Enable', '2024-02-11', '2024-02-11', '08:00 - 19:00 น', 0);

-- Dumping structure for table webpet.disease
CREATE TABLE IF NOT EXISTS `disease` (
  `disease_id` int(11) NOT NULL AUTO_INCREMENT,
  `disease_subject` varchar(100) NOT NULL,
  `disease_title` varchar(100) NOT NULL,
  `disease_kind` varchar(150) NOT NULL,
  `disease_status` varchar(50) NOT NULL,
  `disease_symptom` text NOT NULL,
  `disease_credate` date NOT NULL,
  `disease_lastdate` date NOT NULL,
  `disease_file` text NOT NULL,
  `disease_creby` int(11) NOT NULL,
  `disease_pic` varchar(150) NOT NULL,
  PRIMARY KEY (`disease_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table webpet.disease: ~6 rows (approximately)
INSERT INTO `disease` (`disease_id`, `disease_subject`, `disease_title`, `disease_kind`, `disease_status`, `disease_symptom`, `disease_credate`, `disease_lastdate`, `disease_file`, `disease_creby`, `disease_pic`) VALUES
	(19, 'โรคไข้หัดสุนัขหรือดิสเทมเปอร์ (Canine Distemper)', 'พบมากในสุนัขแรกเกิดถึงอายุ 2 - 3 เดือน เกิดจากเชื้อไวรัส Paramyxoviridae', 'สุนัข', 'Enable', 'a:6:{i:0;s:2:"12";i:1;s:2:"11";i:2;s:2:"10";i:3;s:1:"9";i:4;s:1:"8";i:5;s:1:"7";}', '2024-01-28', '2024-02-11', '-.html', 0, 'disease-944755622-thewonderalice-aVTME6WDKqw-unsplash-scaled.jpg'),
	(20, 'โรคลำไส้อักเสบติดต่อจากเชื้อไวรัส (Canine viral Enteritis)', 'พบมากในสุนัขอายุ 2 - 6 เดือน', 'สุนัข', 'Enable', 'a:5:{i:0;s:2:"14";i:1;s:2:"13";i:2;s:2:"10";i:3;s:1:"9";i:4;s:1:"8";}', '2024-01-28', '2024-02-11', '-.html', 0, 'disease-464152340-โรคลำไส้อักเสบในสุนัข.jpg'),
	(21, 'โรคตับอักเสบติดต่อ (Infectious Hepatitis)', 'พบในสุนัขทุกวัย พบบ่อยในสุนัขอายุไม่เกิน 1 ปี', 'สุนัข', 'Enable', 'a:8:{i:0;s:2:"18";i:1;s:2:"17";i:2;s:2:"16";i:3;s:2:"15";i:4;s:2:"14";i:5;s:2:"10";i:6;s:1:"9";i:7;s:1:"8";}', '2024-01-28', '2024-02-11', '-.html', 0, 'disease-301246299-images.jpg'),
	(22, 'เลปโตสไปโรซิส (Leptospirosis)', 'พบในสุนัขทุกวัย และสามารถติดต่อถึงคนได้', 'สุนัข', 'Enable', 'a:7:{i:0;s:2:"24";i:1;s:2:"23";i:2;s:2:"20";i:3;s:2:"19";i:4;s:2:"10";i:5;s:1:"9";i:6;s:1:"8";}', '2024-01-28', '2024-02-11', '-.html', 0, 'disease-1515117138-Main-Image-1.png'),
	(23, 'โรคหัดแมว', 'เกิดจากเชื้อไวรัสกลุ่มพาร์โวไวรัส (feline parvovirus) ซึ่งมีผลต่อระบบทางเดินอาหารของน้องแมว แต่ว่าไม', 'แมว', 'Enable', 'a:6:{i:0;s:2:"30";i:1;s:2:"29";i:2;s:2:"28";i:3;s:2:"27";i:4;s:2:"26";i:5;s:2:"25";}', '2024-01-28', '2024-02-11', '-.html', 0, 'disease-637806054-close-up-doctor-wearing-gloves-1-825x550.jpg'),
	(24, 'โรคหวัดแมว', 'โรคหวัดแมวสามารถเกิดได้จากเชื้อไวรัสหลากหลายชนิด แต่ส่วนใหญ่โรคนี้มักเกิดจาก ไวรัสสำคัญ 2 ชนิด คือ ไ', 'แมว', 'Enable', 'a:6:{i:0;s:2:"35";i:1;s:2:"34";i:2;s:2:"33";i:3;s:2:"32";i:4;s:2:"26";i:5;s:2:"25";}', '2024-01-28', '2024-02-11', '-.html', 0, 'disease-1011019236-1232340-img.ue9jsf.1rtwd.jpg'),
	(25, 'โรคมะเร็งเม็ดเลือดในแมว', 'โรคมะเร็งเม็ดเลือดในแมวเกิดจาก “เรโทรไวรัส (Retrovirus)" ซึ่งอยู่ในกลุ่มเชื้อไวรัสแบบเดียวกับ “เอชไอ', 'แมว', 'Enable', 'a:4:{i:0;s:2:"40";i:1;s:2:"39";i:2;s:2:"37";i:3;s:2:"36";}', '2024-01-28', '2024-02-11', '-.html', 0, 'disease-381556104-1380540714-img0820jpg-o.jpg');

-- Dumping structure for table webpet.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `logs_action` varchar(50) NOT NULL,
  `logs_sessid` varchar(150) NOT NULL,
  `logs_ip` varchar(50) NOT NULL,
  `logs_time` date NOT NULL,
  `logs_type` varchar(50) NOT NULL,
  `logs_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table webpet.logs: ~190 rows (approximately)
INSERT INTO `logs` (`logs_action`, `logs_sessid`, `logs_ip`, `logs_time`, `logs_type`, `logs_url`) VALUES
	('Insert Clinic', 'jtf3os44v3ik6irpeecgdib0m2', '::1', '2023-12-25', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Update Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/update.php'),
	('Update Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/update.php'),
	('Update Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/update.php'),
	('Update Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/update.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Delete Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Update Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/update.php'),
	('Insert Clinic', 'cqv48b135lihvlpgjlcdmugek8', '::1', '2024-01-10', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Member', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/member/insert.php'),
	('Update Clinic', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/member/update.php'),
	('Update Clinic', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/member/update.php'),
	('Insert Member', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/member/insert.php'),
	('Delete Clinic', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/member/delete.php'),
	('Delete Member', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/member/delete.php'),
	('Insert Member', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/member/insert.php'),
	('Update Member', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/member/update.php'),
	('Delete Clinic', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Insert Clinic', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Update Clinic', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/update.php'),
	('Insert Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Delete Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Delete Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Delete Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Insert Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Update Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/update.php'),
	('Update Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/update.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/track/insert.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/track/insert.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/track/insert.php'),
	('Update Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/track/update.php'),
	('Update Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/announce/update.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/track/insert.php'),
	('Delete Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/track/delete.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Update Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/race/update.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Update Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/symptom/update.php'),
	('Update Symptom', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/symptom/update.php'),
	('Delete Symptom', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/symptom/delete.php'),
	('Insert Symptom', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-11', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Disease', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Update Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Annouce', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/track/insert.php'),
	('Insert Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/track/insert.php'),
	('Delete Tracking', 'r759tu3ga5dvpd4m3cimimd9mv', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/track/delete.php'),
	('Insert Annouce', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Annouce', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Annouce', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-12', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Insert Tracking', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/track/insert.php'),
	('Update Tracking', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/track/update.php'),
	('Update Tracking', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/track/update.php'),
	('Insert Tracking', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/track/insert.php'),
	('Insert Clinic', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert race', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Insert Disease', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Disease', 'g11gsth78bjnsadm7e63dul17p', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Clinic', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/insert-clinic.php'),
	('Insert Clinic', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/insert-clinic.php'),
	('Delete Clinic', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Insert Annouce', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/insert-announce.php'),
	('Insert Annouce', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/insert-announce.php'),
	('Insert Annouce', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/insert-announce.php'),
	('Insert Annouce', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/insert-announce.php'),
	('Insert Tracking', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/insert-help.php'),
	('Delete Annouce', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Delete Annouce', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Delete Annouce', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Delete Annouce', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Insert Tracking', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/insert-help.php'),
	('Delete Tracking', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/track/delete.php'),
	('Insert Member', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/member/insert.php'),
	('Insert member', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/register-member.php'),
	('Insert member', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/register-member.php'),
	('Insert Tracking', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/insert-help.php'),
	('Insert Tracking', 'gkouj5si2ssbf9ujtttvkr7q4m', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/insert-help.php'),
	('Update Disease', '5iamdm4s4khl0sk0sfrdvrkvhd', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Symptom', '5iamdm4s4khl0sk0sfrdvrkvhd', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/symptom/update.php'),
	('Update Disease', '5iamdm4s4khl0sk0sfrdvrkvhd', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Insert Disease', '5iamdm4s4khl0sk0sfrdvrkvhd', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Disease', '5iamdm4s4khl0sk0sfrdvrkvhd', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Update Disease', '5iamdm4s4khl0sk0sfrdvrkvhd', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', '5iamdm4s4khl0sk0sfrdvrkvhd', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', '5iamdm4s4khl0sk0sfrdvrkvhd', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', '5iamdm4s4khl0sk0sfrdvrkvhd', '::1', '2024-01-13', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', 'hkiu3t53f97tqq847bbct2vrpb', '::1', '2024-01-27', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', 'hkiu3t53f97tqq847bbct2vrpb', '::1', '2024-01-27', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', 'hkiu3t53f97tqq847bbct2vrpb', '::1', '2024-01-27', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', 'hkiu3t53f97tqq847bbct2vrpb', '::1', '2024-01-27', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Delete Member', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/member/delete.php'),
	('Delete Member', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/member/delete.php'),
	('Delete Member', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/member/delete.php'),
	('Insert Member', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/member/insert.php'),
	('Update Member', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/member/update.php'),
	('Delete Annouce', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Delete Annouce', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Delete Annouce', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Delete Annouce', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/announce/delete.php'),
	('Insert Annouce', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/announce/insert.php'),
	('Delete race', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/race/delete.php'),
	('Delete race', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/race/delete.php'),
	('Insert race', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Update race', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/race/update.php'),
	('Insert race', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Insert race', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Insert race', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Delete Clinic', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Delete Clinic', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/clinic/delete.php'),
	('Insert Clinic', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Delete Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/delete.php'),
	('Delete Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/delete.php'),
	('Delete Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/delete.php'),
	('Delete Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/delete.php'),
	('Delete Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/delete.php'),
	('Delete Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/delete.php'),
	('Delete Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/delete.php'),
	('Delete Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/delete.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Symptom', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/symptom/insert.php'),
	('Insert Disease', 'i6h853mbtbrb46puh4gat7e1nu', '::1', '2024-01-28', 'Access Menu', 'http://localhost/webcat/admin/disease/insert.php'),
	('Insert Clinic', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert Clinic', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/clinic/insert.php'),
	('Insert race', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Insert race', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Insert race', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Insert race', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Insert race', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Insert race', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/race/insert.php'),
	('Update Disease', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Disease', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/disease/update.php'),
	('Update Tracking', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/track/update.php'),
	('Update Tracking', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/track/update.php'),
	('Update Tracking', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/track/update.php'),
	('Delete Tracking', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/track/delete.php'),
	('Update Tracking', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/track/update.php'),
	('Update Tracking', '922mausl4oiojevmtbdge2ec79', '::1', '2024-02-11', 'Access Menu', 'http://localhost/webcat/admin/track/update.php');

-- Dumping structure for table webpet.member
CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_username` varchar(50) NOT NULL,
  `member_password` varchar(50) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `member_fname` varchar(50) NOT NULL,
  `member_lname` varchar(50) NOT NULL,
  `member_pic` varchar(150) NOT NULL,
  `member_status` varchar(50) NOT NULL,
  `member_credate` date NOT NULL,
  `member_lastdate` date NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table webpet.member: ~1 rows (approximately)
INSERT INTO `member` (`member_id`, `member_username`, `member_password`, `member_email`, `member_fname`, `member_lname`, `member_pic`, `member_status`, `member_credate`, `member_lastdate`) VALUES
	(6, 'admin', 'M3E0p2yyrUD%3Q', 'test@hotmail.com', 'admin', 'test', 'member-1127422429-bgform.png', 'Enable', '2024-01-28', '2024-01-28');

-- Dumping structure for table webpet.province
CREATE TABLE IF NOT EXISTS `province` (
  `province_id` varchar(10) DEFAULT NULL,
  `province_name` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table webpet.province: ~78 rows (approximately)
INSERT INTO `province` (`province_id`, `province_name`) VALUES
	('01', 'กรุงเทพมหานคร'),
	('02', 'กระบี่'),
	('03', 'กาญจนบุรี'),
	('04', 'กาฬสินธุ์'),
	('05', 'กำแพงเพชร'),
	('06', 'ขอนแก่น'),
	('07', 'จันทบุรี'),
	('08', 'ฉะเชิงเทรา'),
	('09', 'ชลบุรี'),
	('10', 'ชัยนาท'),
	('11', 'ชัยภูมิ'),
	('12', 'ชุมพร'),
	('13', 'เชียงราย'),
	('14', 'เชียงใหม่'),
	('15', 'ตรัง'),
	('16', 'ตราด'),
	('17', 'ตาก'),
	('18', 'นครนายก'),
	('19', 'นครปฐม'),
	('20', 'นครพนม'),
	('21', 'นครราชสีมา'),
	('22', 'นครศรีธรรมราช'),
	('23', 'นครสวรรค์'),
	('24', 'นนทบุรี'),
	('25', 'นราธิวาส'),
	('26', 'น่าน'),
	('27', 'บึงกาฬ'),
	('28', 'บุรีรัมย์'),
	('29', 'ปทุมธานี'),
	('30', 'ประจวบคีรีขันธ์'),
	('31', 'ปราจีนบุรี'),
	('32', 'ปัตตานี'),
	('33', 'พระนครศรีอยุธยา'),
	('34', 'พะเยา'),
	('35', 'พังงา'),
	('36', 'พัทลุง'),
	('37', 'พิจิตร'),
	('38', 'พิษณุโลก'),
	('39', 'เพชรบุรี'),
	('40', 'เพชรบูรณ์'),
	('41', 'แพร่'),
	('42', 'ภูเก็ต'),
	('43', 'มหาสารคาม'),
	('44', 'มุกดาหาร'),
	('45', 'แม่ฮ่องสอน'),
	('46', 'ยโสธร'),
	('47', 'ยะลา'),
	('48', 'ร้อยเอ็ด'),
	('49', 'ระนอง'),
	('50', 'ระยอง'),
	('51', 'ราชบุรี'),
	('52', 'ลพบุรี'),
	('53', 'ลำปาง'),
	('54', 'ลำพูน'),
	('55', 'เลย'),
	('56', 'ศรีสะเกษ'),
	('57', 'สกลนคร'),
	('58', 'สงขลา'),
	('59', 'สตูล'),
	('60', 'สมุทรปราการ'),
	('61', 'สมุทรสงคราม'),
	('62', 'สมุทรสาคร'),
	('63', 'สระแก้ว'),
	('64', 'สระบุรี'),
	('65', 'สิงห์บุรี'),
	('66', 'สุโขทัย'),
	('67', 'สุพรรณบุรี'),
	('68', 'สุราษฎร์ธานี'),
	('69', 'สุรินทร์'),
	('70', 'หนองคาย'),
	('71', 'หนองบัวลำภู'),
	('72', 'อ่างทอง'),
	('73', 'อำนาจเจริญ'),
	('74', 'อุดรธานี'),
	('75', 'อุตรดิตถ์'),
	('76', 'อุทัยธานี'),
	('77', 'อุบลราชธานี');

-- Dumping structure for table webpet.race
CREATE TABLE IF NOT EXISTS `race` (
  `race_id` int(11) NOT NULL AUTO_INCREMENT,
  `race_subject` varchar(100) NOT NULL,
  `race_title` varchar(250) NOT NULL,
  `race_kind` varchar(150) NOT NULL,
  `race_credate` date NOT NULL,
  `race_lastdate` date NOT NULL,
  `race_file` text NOT NULL,
  `race_pic` varchar(150) NOT NULL,
  `race_status` varchar(50) NOT NULL,
  PRIMARY KEY (`race_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table webpet.race: ~10 rows (approximately)
INSERT INTO `race` (`race_id`, `race_subject`, `race_title`, `race_kind`, `race_credate`, `race_lastdate`, `race_file`, `race_pic`, `race_status`) VALUES
	(11, 'ชิวาวา (CHIHUAHUA)', 'รู้จักชิวาวา (CHIHUAHUA) สุนัขตัวจิ๋ว และวิธีดีๆ ในการดูแลสุขภาพ ทำความรู้จักชิวาวา (Chihuahua) ถ้าให้นึกถึงสายพันธุ์สุนัขที่ได้รับความนิยมอย่างมาก', 'สุนัข', '2024-01-28', '2024-01-28', '-.html', 'race-769266487-BREED Hero Desktop_0139_chihuahua_smooth.png', 'Enable'),
	(12, 'ชิสุห์ (Shih Tzu)', 'มารู้จักและดูแลสุขภาพชิสุห์ (Shih Tzu) กันเถอะ', 'สุนัข', '2024-01-28', '2024-01-28', '4495-4495.html', 'race-276223089-shih_tzu.png', 'Enable'),
	(13, 'บริติช ช็อตแฮร์ (British Shorthair)', 'ทำความรู้จักบริติช ช็อตแฮร์ (British Shorthair) ว่ากันว่า British shorthair เป็นหนึ่งในสายพันธุ์แมวที่เก่าแก่ที่สุดของประเทศอังกฤษ', 'แมว', '2024-01-28', '2024-01-28', '6212-6212.html', 'race-362570655-British_shorthair.png', 'Enable'),
	(14, 'รัสเซียนบลู', 'รัสเซียนบลูเป็นแมวขนาดกลางถึงใหญ่ มีรูปร่างเพรียวบาง งามสง่า และขาเรียวยาว มองผ่าน ๆ เหมือนเดินเขย่งปลายเท้าตลอดเวลา', 'แมว', '2024-01-28', '2024-01-28', '2906-2906.html', 'race-1250568435-Russian_blue.png', 'Enable'),
	(15, 'โกลเด้น รีทริฟเวอร์ (Golden Retriever)', 'สำหรับคนรักสุนัขทั้งหลายคงไม่มีใครไม่รู้จัก โกลเด้น รีทริฟเวอร์ (Golden Retriever) ด้วยขนาดตัวที่พอเหมาะ สายตาที่อ่อนโยน เป็นมิตร ร่าเริง ขนสีทองอร่าม และหางเป็นแพคล้ายขนนกที่แกว่งไปมาตลอดเวลา บทความนี้จะพามาทำความรู้จักกับสุนัขพันธุ์โกลเด้น รีทริฟเว', 'สุนัข', '2024-02-11', '2024-02-11', '5868-5868.html', 'race-1068655621-BREED Hero Desktop_0105_golden_retriever (1).jpg', 'Enable'),
	(16, 'โดเบอร์แมน (Doberman)', 'โดเบอร์แมน พินสเชอร์ เป็นสุนัขที่มีพลัง กระตือรือล้น และต้องการการออกกำลังกายในปริมาณมาก หากไม่ได้รับการออกกำลังกาย เขามีแนวโน้มที่จะรบกวนหรืออาจจะก้าวร้าวได้ การฝึกให้เชื่อฟังและการเข้าสังคมอย่างระมัดระวังเป็นสิ่งที่จำเป็น', 'สุนัข', '2024-02-11', '2024-02-11', '5050-5050.html', 'race-1771947536-img_DogBreed-Doberman.jpg', 'Enable'),
	(17, 'มอลทีส (Maltese)', 'มอลทีสจัดอยู่ในกลุ่มสุนัขพันธุ์ทอยที่ชอบให้กอดและอุ้มนั่งตักเป็นที่สุด! มอลทีสเป็นสุนัขน่ารักน่าเอ็นดู เรียกว่าเป็นสายพันธุ์ที่เหมาะสำหรับครอบครัวและเจ้าของมือใหม่ ด้วยขนาดตัวที่เล็ก ไม่ต้องการพื้นที่มากมาย จึงเหมาะจะเลี้ยงในอพาร์ทเมนท์ ขนของสุนัขพัน', 'สุนัข', '2024-02-11', '2024-02-11', '8635-8635.html', 'race-776173084-large_491f81c2-a286-4d2a-b736-b00d44ebde92.jpg', 'Enable'),
	(18, 'แมววิเชียรมาศ (Siamese cat)', 'เชื่อว่าเหล่าบรรดาทาสแมวทั้งหลายคงไม่มีใครไม่รู้จักน้องแมวพันธุ์วิเชียรมาศ หรือ แมวสยาม (Siamese cat) ที่เป็นดั่งตัวแทนสายพันธุ์แมวแห่งประเทศไทย ที่นอกจากจะมีเอกลักษณ์จากลวดลายและสีขนบนตัวอันงดงามแล้ว ยังมีลักษณะนิสัยที่เป็นมิตร ขี้อ้อน จนสามารถคว้าใ', 'แมว', '2024-02-11', '2024-02-11', '4965-4965.html', 'race-1849072625-CAT BREED Hero Desktop_0008_Siamese.jpg', 'Enable'),
	(19, 'สฟิงซ์', 'จุดเด่นของแมวสฟิงซ์คือเป็นแมว “ไร้ขน” แม้ดูภายนอกจะเหมือนแมวไร้ขน แต่อันที่จริงแล้วสฟิงซ์มีขนนุ่มละเอียดปกคลุมทั่วรางกาย ให้สัมผัสเหมือนเปลือกลูกพีช แมวพันธุ์นี้ไม่มีหนวดและขนตา หัวมีรูปทรงคล้ายกับหัวของแมวเดวอน เร็กซ์ ดวงตาลึกกลมคล้ายเลมอน รูปร่างขอ', 'แมว', '2024-02-11', '2024-02-11', '4062-4062.html', 'race-333938142-CAT BREED Hero Desktop_0003_Sphynx.jpg', 'Enable'),
	(20, 'บอมเบย์', '   แมวพันธุ์บอมเบย์เป็นแมวที่กระตือรือล้น อยากรู้อยากเห็นและชอบมองดูโลกรอบตัวเขา และต้องการเวลาที่จะอยู่กับเจ้าของ', 'แมว', '2024-02-11', '2024-02-11', '4379-4379.html', 'race-356561102-1024px-Bombay_Katze_Ebene_of_Blue_Sinfonie.jpg', 'Enable');

-- Dumping structure for table webpet.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_username` varchar(50) NOT NULL,
  `staff_password` varchar(50) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table webpet.staff: ~0 rows (approximately)
INSERT INTO `staff` (`staff_id`, `staff_username`, `staff_password`) VALUES
	(1, 'admin', 'p@ss');

-- Dumping structure for table webpet.symptom
CREATE TABLE IF NOT EXISTS `symptom` (
  `symptom_id` int(11) NOT NULL AUTO_INCREMENT,
  `symptom_subject` varchar(250) NOT NULL,
  `symptom_kind` varchar(50) NOT NULL,
  `symptom_status` varchar(50) NOT NULL,
  `symptom_credate` date NOT NULL,
  `symptom_lastdate` date NOT NULL,
  PRIMARY KEY (`symptom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table webpet.symptom: ~34 rows (approximately)
INSERT INTO `symptom` (`symptom_id`, `symptom_subject`, `symptom_kind`, `symptom_status`, `symptom_credate`, `symptom_lastdate`) VALUES
	(6, 'หายใจลำบาก', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(7, 'ปอดบวม', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(8, 'เบื่ออาหาร', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(9, 'ซึม', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(10, 'มีไข้', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(11, 'มีน้ำมูกสีเขียว', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(12, 'มีขี้ตาสีเขียว', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(13, 'อุจจาระเหลว', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(14, 'ท้องร่วงอย่างรุนแรง', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(15, 'เยื่อเมือกต่างๆซีด', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(16, 'มีจุดเลือดออกตามตัว', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(17, 'ต่อมน้ำเหลืองบวม', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(18, 'ต่อมทอนซิลขยายใหญ่', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(19, 'หายใจขัด', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(20, 'ตัวสั่น', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(21, 'เกร็ง', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(22, 'กระหายน้ำ', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(23, 'ไม่ยอมลุกเดินไปไหน', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(24, 'อาเจียน', 'สุนัข', 'Enable', '2024-01-28', '2024-01-28'),
	(25, 'มีไข้สูง', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(26, 'เบื่ออาหาร', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(27, 'มีกลิ่นปาก', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(28, 'อาเจียน', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(29, 'ท้องเสีย', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(30, 'น้ำลายเหนียว', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(31, 'แท้ง', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(32, 'มีน้ำมูก', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(33, 'เยื่อตาและเยื่อจมูกอักเสบ', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(34, 'ซึม', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(35, 'จาม', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(36, 'ร่างกายสุดโทรม', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(37, 'ป่วยง่าย', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(38, 'มีอาการโลหิตจาง', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(39, 'เม็ดเลือดขาวลดลง', 'แมว', 'Enable', '2024-01-28', '2024-01-28'),
	(40, 'เกล็ดเลือดผิดปกติ', 'แมว', 'Enable', '2024-01-28', '2024-01-28');

-- Dumping structure for table webpet.symptoms_disease
CREATE TABLE IF NOT EXISTS `symptoms_disease` (
  `symptom_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `kind` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table webpet.symptoms_disease: ~42 rows (approximately)
INSERT INTO `symptoms_disease` (`symptom_id`, `disease_id`, `kind`) VALUES
	(12, 19, 'สุนัข'),
	(11, 19, 'สุนัข'),
	(10, 19, 'สุนัข'),
	(9, 19, 'สุนัข'),
	(8, 19, 'สุนัข'),
	(7, 19, 'สุนัข'),
	(14, 20, 'สุนัข'),
	(13, 20, 'สุนัข'),
	(10, 20, 'สุนัข'),
	(9, 20, 'สุนัข'),
	(8, 20, 'สุนัข'),
	(18, 21, 'สุนัข'),
	(17, 21, 'สุนัข'),
	(16, 21, 'สุนัข'),
	(15, 21, 'สุนัข'),
	(14, 21, 'สุนัข'),
	(10, 21, 'สุนัข'),
	(9, 21, 'สุนัข'),
	(8, 21, 'สุนัข'),
	(24, 22, 'สุนัข'),
	(23, 22, 'สุนัข'),
	(20, 22, 'สุนัข'),
	(19, 22, 'สุนัข'),
	(10, 22, 'สุนัข'),
	(9, 22, 'สุนัข'),
	(8, 22, 'สุนัข'),
	(30, 23, 'แมว'),
	(29, 23, 'แมว'),
	(28, 23, 'แมว'),
	(27, 23, 'แมว'),
	(26, 23, 'แมว'),
	(25, 23, 'แมว'),
	(35, 24, 'แมว'),
	(34, 24, 'แมว'),
	(33, 24, 'แมว'),
	(32, 24, 'แมว'),
	(26, 24, 'แมว'),
	(25, 24, 'แมว'),
	(40, 25, 'แมว'),
	(39, 25, 'แมว'),
	(37, 25, 'แมว'),
	(36, 25, 'แมว');

-- Dumping structure for table webpet.track
CREATE TABLE IF NOT EXISTS `track` (
  `track_id` int(11) NOT NULL AUTO_INCREMENT,
  `track_subject` varchar(100) NOT NULL,
  `track_kind` varchar(150) NOT NULL,
  `track_title` varchar(150) NOT NULL,
  `track_sex` varchar(50) NOT NULL,
  `track_gene` varchar(50) NOT NULL,
  `track_area` varchar(150) NOT NULL,
  `track_spot` varchar(150) NOT NULL,
  `track_pic` varchar(150) NOT NULL,
  `track_status` varchar(50) NOT NULL,
  `track_credate` date NOT NULL,
  `track_lastdate` date NOT NULL,
  `track_file` text NOT NULL,
  `track_creby` int(11) NOT NULL,
  PRIMARY KEY (`track_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table webpet.track: ~5 rows (approximately)
INSERT INTO `track` (`track_id`, `track_subject`, `track_kind`, `track_title`, `track_sex`, `track_gene`, `track_area`, `track_spot`, `track_pic`, `track_status`, `track_credate`, `track_lastdate`, `track_file`, `track_creby`) VALUES
	(10, 'สุนัขน่ารัก หายตัวไป', 'สุนัข', '', 'sex', 'gene', 'gene', 'spot', 'track-419691635-143320_4911078e0f61bc38be5a2c969c276568.jpg.jpg', 'Success', '2024-01-13', '2024-02-11', '-.html', 0),
	(11, 'สุนัชหาย ช่วยตามหาด้วย', 'สุนัข', '', 'ชาย', 'ชิวาวา', 'สวนสาธารณะ ในมหาวิทยาลัย........', 'ใส่ปลอกคอลายจุด หลากสี', 'track-1379726205-5d47bf7a4576c.jpeg', 'Approve', '2024-01-13', '2024-02-11', '-.html', 0),
	(12, 'asdasd', 'สุนัข', '', '', '', '', '', '', 'Denine', '2024-01-13', '2024-01-13', '', 0),
	(15, 'ด่วน ช่วยตามหาสุนัข', 'สุนัข', '', 's', 's', 's', '', 'track-379017001-การว่ายน้ำช่วยให้สุนัขมีความสุขในการใช้ชีวิตประจำวันได้มากขึ้น.jpeg', 'Success', '2024-01-13', '2024-02-11', 'track-379017001-การว่ายน้ำช่วยให้สุนัขมีความสุขในการใช้ชีวิตประจำวันได้มากขึ้น.jpeg', 5);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
