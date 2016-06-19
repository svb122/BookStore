-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2016 at 02:21 PM
-- Server version: 5.7.12-0ubuntu1
-- PHP Version: 7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) UNSIGNED NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `name` varchar(255) NOT NULL,
  `publishing` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `countpages` int(11) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `bookdescribe` text NOT NULL,
  `imgsrc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `ISBN`, `name`, `publishing`, `year`, `countpages`, `authors`, `category`, `bookdescribe`, `imgsrc`) VALUES
(1, '1421414141241', 'Book 1', 'wfwegeg4g4', 2015, 223, 'Author 1', '1', 'egwe ew gwe oihg eug ig iag agwgqygfqgfe', 'uploads/CAKHFjkvKyqav-mBR9rTaf9ZkEAbYkd8.jpg'),
(2, '1215125151522', 'Book 2', 'ettq3taae', 2015, 224, 'vrsbrebrbrbr', '2', 'wgw gw ', 'uploads/eIP4tgLKs2v2WqZxERguKG4lJ1hTKsop.jpg'),
(3, '1242415313531', 'Book 3', 'wwfqwfwfw', 2015, 223, 'swfwfeeegeg  ', '3', 'wgwgrgwrgr', 'uploads/eV2S9-9Z-CCUuSkCdMczNn7qKGC3l0zC.jpg'),
(4, '1415351555535', 'Book 4', 'qf333', 2014, 221, 'fbrbrbe', '3', 'gggwgwg', 'uploads/8RUuE6jrWCvpdSntIak6pY6yyu0WxNWH.jpg'),
(5, '1241241441444', 'Book 5', 'wq3q33r', 2016, 222, 'frbrre', '2', 'wgwgrwgg', 'uploads/nJH1YKZxMB5oDUBYBt7MNGQQz7XeXzuc.jpg'),
(6, '1244121212421', 'Book 6', 'ewt323523', 2016, 224, 'qrqwrwrwrq', '1', 'qrrq rqr qr', 'uploads/GzFyV1XNaBUAGbOIMDYAUmP_ne4fNHXz.jpg'),
(7, '1241424142412', 'Book 7', 'feqfefqe', 2015, 244, 'egweggwgwe', '1', 'wegewewgw eg wgw geg weg ', 'uploads/OQe2QxEGUFjbw49EgynQSMeY84KP9uQg.jpg'),
(8, '1242414141411', 'Book 8', 'efqefeqfefe', 2015, 245, 'efefa', '2', 'eefef qefe th tsrjrtjj eer rgew g er he reh ehh whw h w heh qh zhrshrhehe eh reh shreh dzhdhh hdh', 'uploads/vSXyNcEsKHITzilEcCvqFXsqf7mFR_ie.jpg'),
(9, '1314115135135', 'Book 9', 'wfwegeg4g4', 2014, 256, 'wgw g ', '3', 'w geg wg w gh hs', 'uploads/8OMLQ-v17idZlLvnwtj8SFQ7gn8M4t2r.jpg'),
(10, '1241212142414', 'Book 10', 'ef efewf', 2014, 221, 'ee ee ', '3', 'e we gwe gwg 4 gwg g', 'uploads/UK_bgp6jHY4Si4c2MI37qnTveNjnwvz8.jpg'),
(11, '1142424142142', 'Book 11', 'qwq1412422', 2015, 442, 'eqw', '2', 'qwrqq we tewg', 'uploads/JZwVt5jeXr3nJ98Pcg05PDdfc0Dvlc7V.jpg'),
(12, '1112122242124', 'Book 12', 'eqwqww', 2061, 221, 'eeew', '3', 'ewgweeg eg weeg ewg ', 'uploads/CPfPIyZAvRYc9pV5_ayKB4H43jINF5hs.jpg'),
(13, '1232122132214', 'Book 13', 'ffq', 21015, 443, 'dfefef', '3', 'wef w eew ew we geg we g', 'uploads/2Twr7eRMAqn_m1xU6RR32F_GUu_4RMg2.jpg'),
(14, '1324441421214', 'Book 14', 'efefeee', 2015, 443, 'ffdefweew g ew   wggwg', '1', 'sg grgsgsgr gsg ', 'uploads/oAMmjkKdHwyc6wnDVSVhZi2zEqUdZ8Dq.jpg'),
(15, '1221211223132', 'Book 15', 'ettq3taae', 2015, 442, 'frbrre', '2', 'wef efefef e  wewefe eefw  gw swgsgew', 'uploads/yPbP3DrSmYZ24DOPaaqhbx36CIx4Gyjj.jpg'),
(16, '1241242142142', 'Book 16', 'qddwqfqwf qwf qw', 2015, 524, 'e t t32 23t t  t t2', '2', '2 t23t 32t t 23 t zgh  rh hw heh', 'uploads/aokkoGGxHGFsAdbAmyRoMj_F78znjmjp.jpg'),
(17, '124124241242', 'Book 17', 'eeewgw gwegewgw', 2015, 224, 'rg gwg g', '3', 'we gewg wg tgeg gege  ths ', 'uploads/NMMLtvNGMQnAus05cNCnvTcnoVvKKVoO.jpg'),
(18, '1212412412412', 'Book 18', 'ee  qe qe', 2015, 524, 'ewf ewwee', '2', 'qw fe w ewg wg w g4wg 4wg w gw', 'uploads/C6V5Am-zv2CskyVBszARM3rQwXWlXs6C.jpg'),
(19, '1241214241421', 'Book 19', 'eqeeef', 2015, 543, 'wwq fw qfwf', '1', 'wq fqf e ef qq f qw fw fqqf  wgeggwe', 'uploads/Gdrdp7CX0b72Ek5CNeE1rLXzTO1DNIN-.jpg'),
(20, '1214214121241', 'Book 20', 'ew ge gwe gewg weg', 2015, 534, 'e we s', '1', ' ewet w w twtggr r   ss 4ss s', 'uploads/D09d6GsRmJi5qYarjY-XpOZbRed7Opce.jpg'),
(21, '1242424242244', 'Book 21', 'fqqegqeeq', 2015, 211, 'e eih ueh gwewg ', '1', 'egwg gthjn', 'uploads/bkIssM7jH_0YDpQeimhVXBIjbxN3jaXN.jpg'),
(22, '1213241141141', 'Book 22', 'bfbgndndn', 2015, 211, 'egrbgrbrb', '3', 'enxhn rh hshs r hsh rh r hsrh', 'uploads/sjEzVkxAoCD_ykDmwu3Mb7Se_iNr3plU.jpg'),
(23, '1124241414142', 'Book 23', 'eveweewe', 2015, 241, 'fbenet et ', '2', 'wg wrg rh rh wrhwerej e sjs jrre rjj ', 'uploads/a6uJiygj9oIjjfGq9Bj0gx6uRzXmCkja.jpg'),
(24, '1241241414142', 'Book 24', 'dgnd jd j', 2015, 282, 'rg rgr grge', '2', 'w rgr  h  uuk k k kkkk kk ', 'uploads/8DNDIVY2XJXHxc-mhyLL6eKQnV0Hs0jc.jpg'),
(25, '1214241124124', 'book 25', 'sddgs s  r', 2015, 211, 'dv httrjrj t', '2', ' gwwee g ehd h dj jkk kkkkk  kk kk!', 'uploads/txC2XtOdKbg-WvRSKZIth0gsnoVJgEn2.jpg'),
(26, '1224411444133', 'Book 26', 'egr thfjfrtjtr jtj', 2014, 254, 'gfrfjtfjt f', '1', ' egeh tj tj rt kkkk', 'uploads/UPbgeKS21zy7T2sTt0rTCjMbSJ9vKwkr.jpg'),
(27, '1242414214214', 'Book 27', 'rherehrhe', 2016, 255, 'htd ftjgkyg', '2', 'w rh e ht j jtejtej tj ', 'uploads/RWbRut57KDfcSJe2jF11uUXmfTQ3B86o.jpg'),
(28, '1242414115151', 'Book 28', 'she tej etj', 2014, 234, 'rgrghyj yj', '3', 'eg wg w wr r hwrhrhr h ', 'uploads/yBlz7xcS2yfeU6yXCrWLUohqtDGHP9eP.jpg'),
(29, '1212414141414', 'Book 29', 'frhr hrherh', 2016, 241, 'rgw e hre hreh', '2', 'e wgr h erh t  tj kkk', 'uploads/60N-RjyaZnkLPIqlYYVK3_OBJ1gliIEo.jpg'),
(30, '1212414531315', 'Book 30', 'fdh d d e', 2014, 284, 'rfte t te ', '3', ' gwwrh rh rhwr hhwrh wh  hw', 'uploads/vKbz635pYXghGQF7dbMSJdmPTXmrWJBB.jpg'),
(31, '2111214424121', 'Book 31', 'ggwwrwgw wg  ', 2015, 284, 'rgrg rrg', '2', ' rrhreh rtjr yjt y yk kk kkkk!', 'uploads/-tsxi6Lj_gESZaf8AHAbVRMl5RIh436L.jpg'),
(32, '2121221241412', 'Book 32', 'wsfqwf w fwq', 2015, 482, 'sgrhrhe', '2', 'wrgw wrywr rw rw  hhrrw  kkkk', 'uploads/rW0JWqkrMZOsNRzFub6ijUe9KA4IYONV.jpg'),
(33, '1142414141411', 'Book 33', '12412412421414241', 2015, 484, 'rrrhwhh', '1', 'frbr t t t kkkkkk', 'uploads/AHex9_8_FpGRiG1imfyDB4aMa90ffAP5.jpg'),
(34, '1212414212135', 'Book 34', 'ege gegw', 2014, 483, 'fe eg ewge ', '3', ' eqg e g kkk!', 'uploads/djc2brCxal-0jft1pZ_iMnv7XWpo9-9O.jpg'),
(35, '1241242142414', 'Book 35', 'rhrh er h', 2014, 489, 'h reh hrh ehhr', '3', 'ew gewg we we gkkk ', 'uploads/j3gjHlsiLNWfHCXqOdYE4tel1hDyQ8h_.jpg'),
(36, '2141331331131', 'Book 36', 'degwr wr ', 2015, 483, 'eegkewng wjng qwg  geew  gge ', '1', 'e gwe w we we kkk!k', 'uploads/DB68-Kr1KArBFMbKH76uVguWGbkayspq.jpg'),
(37, '1214141111111', 'Book 37', 'h trtrt rtj ', 2015, 532, 'efqe e eg ', '1', 'wq  q tq  kkkk', 'uploads/wMM9sgJYAkZEkxb9Mpune001lFyq_97r.jpg'),
(38, '1211413535355', 'Book 38', ' jtj rjt jt t ', 2016, 582, 'hggjfj tj j', '2', ' egweg w g w  w e w  e ', 'uploads/2ynMShLyt1uUdabQERRnbwh7fmGvUoH4.jpg'),
(39, '1241214235434', 'Book 39', ' g gwg  w', 2016, 411, 'wegr erh r he', '2', ' ffwewf w rt rt tr jtrtr tjrt  jr j', 'uploads/Xe3pMa5XA8LbP2L3L8QPLKABDFv-yDji.jpg'),
(40, '1214421441124', 'Book 40', 'trjtjrt j', 2014, 211, 'egw gw w', '2', 'wq eq e geq qeg e ewweh w  h', 'uploads/T1Q66mI8T2BjIwwGQ9pf3hHzecJvLLBa.jpg'),
(41, '1212421142414', 'Book 41', 'wawf owq fuqwqw  ', 2016, 582, 'tj r rhh  ', '1', 'wfwq f q fq fqw q wfw fw', 'uploads/24ipoSaBNGaptFywYygDPeDT7fYTLcAq.jpg'),
(42, '1241214414211', 'Book 42', 'egew gwg', 2016, 642, 'fr rerhh', '3', 'efqef eq egqe gege  g', 'uploads/kVLPcDnY5HYHgq226cSjniYtmBAqvGYY.jpg'),
(43, '1212414315151', 'Book 43', 'rrhwr rhw whr', 2015, 844, 'eveg e geeg g', '2', 'qe qeg e ge ge e gee', 'uploads/qkYJ902ULuc6HUyU4--__2xT2CeeG4lH.jpg'),
(44, '1242415242144', 'book 44', 'deg g ge gegwg', 2015, 211, 'brw rr', '2', 'eg wg e ge eg eg g wgw g', 'uploads/YZ1KSzlK2uyw8wte9G6eNqdPJ_5SHQ3o.jpg'),
(45, '1241214241424', 'Book 45', 'rrh e h erhreh rh', 2015, 842, 'geh e heh', '3', 'wrg w gwrgww gwgwgesge', 'uploads/RZjb4JbsEZH0_zJaqyqfe7J6yNkO6igw.jpg'),
(46, '1232411413515', 'Book 46', 'egwegr wh', 2016, 842, 'n teet e e eh', '2', 'eqgg eg ew h w hwew eh', 'uploads/ckkDJ3TTBnP-5jPwxF7JgfKPXDk-692Q.jpg'),
(47, '1214351531551', 'Book 47', 'fnd dd h', 2016, 211, 'h e ewshhr hr ', '1', 'rh rwh   er e hr kkk!', 'uploads/l_-V4LnWgBD9OymIIV3y-WqA39MSkGWr.jpg'),
(48, '1241535525115', 'Book 48', '3aaa  q q  g  hdd ', 2015, 821, 'f  j  tj tj dx drhrdj kkk', '1', 'wgw e wrh  tytj ttj yktuktk yy', 'uploads/EzHIg8KuPBSj3f51_uEWc3wfmGUy2zbn.jpg'),
(49, '1351351355511', 'Book 49', 'hhmhmhmf', 2016, 898, ' hth te hetth ', '1', 'e erh er d j kkk!', 'uploads/DJCpJV4T1QSQNhnKCefGS6Pmw0fDqJOc.jpg'),
(50, '3241242142143', 'Book 50', 'rgsegg ge', 2014, 894, 'rfrbrhre', '2', 'ewe e gewg we ew w ewege ge', 'uploads/dj9pQTC5Bonc8ef6nFQrNLFZsIt06eiP.jpg'),
(51, '2414141422222', 'Book 51', 'rge h hh', 2014, 899, 'rr rw hw ', '3', 'ewgw gewg wr rre j y utkt u k', 'uploads/gVW6UYOb0kahqhTiXOYNYkmMd8cZuRfN.jpg'),
(52, '2142414131311', 'Book 52', 'rhe hreh erh er herh kty ky k', 2014, 882, 'gewe w', '2', 'e egeg eg eg  wtytyj ty', 'uploads/YEwdn9py4hyHjlA85-XDUJrtoIPkkR87.jpg'),
(53, '4131335151351', 'Book 53', 'ff  hre ', 2014, 2111, 'gw rgr grr ', '3', ' ee e gwe eg weg e geg ge ', 'uploads/UaCDsy1mN_GSFNZKILEgZ1dmwu3SfsQ9.jpg'),
(54, '3214124413414', 'Book 54', 'g gw egeg', 2016, 365, 'hrh reh ', '1', ' rhrh wrh r hre hre kkk', 'uploads/5eAoMRSgHg7d-S1z1PwnAZiZLfZaerhN.jpg'),
(55, '3423222242312', 'Book 55', 'grgwrg ww ', 2015, 394, 'gwrg ', '2', 'qf fqe qe qe err eh  hre hr kkkk', 'uploads/3-oXMykv3HL77kA964SSamVURgVJMH3X.jpg'),
(56, '3313133311111', 'book 56', 'egew gwe w', 2015, 211, 'efefewewf', '2', 'r q3 34t 4  4 4t 4t 4 4t3', 'uploads/eOtfUWdHXXAKk14AuXtS2C86fLZRZMBU.jpg'),
(57, '2121421214141', 'Book 57', 'r    waefe e we efewfewef', 2015, 494, 'efwef', '2', 'ewfewf e  e  w efew e gr grggww', 'uploads/ZdCbwJbY4sB6jBICpNwLnvCqgNZiuh__.jpg'),
(58, '3421489546461', 'Book 58', 'e ge geg we g', 2015, 211, 'tht theh', '2', 'g wg ew gweg ew geg we gege', 'uploads/AnCJH25JaTYl5muCVB_fU-uDeSwJzl5j.jpg'),
(59, '2414431431439', 'Book 59', 'tjrt jtj rj jjj', 2015, 211, 'tt rttr', '3', 'e geg w geeg eg wegge  egwge ', 'uploads/kgiIbMw_HTLbzKV1x-EkcSYSGOEz_I9a.jpg'),
(60, '2132121221241', 'Book 60', 'nheth ee e  j jrej', 2015, 211, 'h eh e e ', '3', 'eeg g e w w  wgwr ryy yt kkk', 'uploads/Y_Bv6VQ0WcvfBEXJc1OwOng4FJOIf8VY.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Category 1'),
(2, 'Category 2'),
(3, 'Category 3');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `addres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `roleId`) VALUES
(1, 'admin', '$2y$13$s2S.ZI5tEccKDaJYl8uFV.TAm4b8LxjKx1iMSXwlixLR4gf9BQdrO', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
