-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2026 at 01:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snrm9427_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categori`
--

CREATE TABLE `categori` (
  `categori_id` varchar(6) NOT NULL,
  `categori_nama` varchar(50) NOT NULL,
  `categori_status` varchar(50) NOT NULL,
  `categori_model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categori`
--

INSERT INTO `categori` (`categori_id`, `categori_nama`, `categori_status`, `categori_model`) VALUES
('C1001', 'Women Wear', 'active', 'Kemeja'),
('C1002', 'Women Wear', 'active', 'Kaos'),
('C1003', 'Women Wear', 'active', 'Dresses'),
('C1004', 'Women Wear', 'active', 'Jaket'),
('C1005', 'Bags & Purses', 'active', 'Bags'),
('C1006', 'Bags & Purses', 'active', 'Purses'),
('C1007', 'Eyewear', 'active', 'Cat Eyewear'),
('C1008', 'Eyewear', 'active', 'Vintage'),
('C1009', 'Footwear', 'active', 'Sepatu'),
('C1010', 'Footwear', 'active', 'Highheel'),
('C1011', 'Footwear', 'active', 'Sandal');

-- --------------------------------------------------------

--
-- Table structure for table `orderku`
--

CREATE TABLE `orderku` (
  `order_id` varchar(15) NOT NULL,
  `order_tgl` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `pembayaran` varchar(30) DEFAULT NULL,
  `bank` varchar(30) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orderku`
--

INSERT INTO `orderku` (`order_id`, `order_tgl`, `email`, `order_status`, `pembayaran`, `bank`, `ongkir`) VALUES
('O1014', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Direct Bank Transfer', 'Bank Mandiri', 10000),
('O1015', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Direct Bank Transfer', 'BCA', 0),
('O1016', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Direct Bank Transfer', 'BNI', 0),
('O1017', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Direct Bank Transfer', 'BNI', 10000),
('O1018', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Cash on Delivery', '', 10000),
('O1019', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Direct Bank Transfer', 'BCA', 10000),
('O1020', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Direct Bank Transfer', 'BRI', 0),
('O1021', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Direct Bank Transfer', 'BNI', 10000),
('O1022', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Direct Bank Transfer', 'BRI', 0),
('O1023', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Direct Bank Transfer', 'BCA', 0),
('O1024', '2026-11-13', 'kodriyati@gmail.com', 'pending', 'Direct Bank Transfer', 'BCA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderdetail_id` int(11) NOT NULL,
  `order_id` varchar(15) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `order_detail_qty` int(11) NOT NULL,
  `product_nama` varchar(50) NOT NULL,
  `orderdetail_harga` int(10) NOT NULL,
  `ukuran` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_id`, `order_id`, `product_id`, `order_detail_qty`, `product_nama`, `orderdetail_harga`, `ukuran`) VALUES
(7, 'O1014', 'P18121002', 1, 'Kaos Metal', 100000, 'S'),
(8, 'O1015', 'P18121003', 1, 'dresses orange pesta', 200000, 'S'),
(9, 'O1016', 'P18121001', 1, 'Kemeja Putih', 150000, 'L'),
(10, 'O1017', 'P18121004', 1, 'Zalia Drawstring Wrap Dress', 150000, 'S'),
(11, 'O1018', 'P18121001', 1, 'Kemeja Putih', 150000, 'S'),
(12, 'O1019', 'P18121016', 1, 'Berrybenka Label Jessie Tied Midi Dress Cream', 229000, 'S'),
(13, 'O1019', 'P18121016', 1, 'Berrybenka Label Jessie Tied Midi Dress Cream', 229000, 'L'),
(14, 'O1020', 'P18121003', 1, 'dresses orange pesta', 200000, 'S'),
(15, 'O1021', 'P18121001', 1, 'Kemeja Putih', 150000, 'S'),
(16, 'O1022', 'P18121007', 1, 'Kodz Lapel Collar Long Sleeve Button Down Shirt', 250000, 'S'),
(17, 'O1022', 'P18121007', 1, 'Kodz Lapel Collar Long Sleeve Button Down Shirt', 250000, 'L'),
(18, 'O1023', 'P18121003', 1, 'dresses orange pesta', 200000, 'S'),
(19, 'O1024', 'P18121002', 1, 'Kaos Metal', 100000, 'S'),
(20, 'O1024', 'P18121037', 1, 'Derby Heels', 599000, '36');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `pengiriman_id` int(11) NOT NULL,
  `pengiriman_nama` varchar(50) DEFAULT NULL,
  `pengiriman_harga` int(11) DEFAULT NULL,
  `pengiriman_status` varchar(15) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`pengiriman_id`, `pengiriman_nama`, `pengiriman_harga`, `pengiriman_status`) VALUES
(1, 'Next day delivery', 20000, 'active'),
(2, 'Standard delivery', 10000, 'active'),
(3, 'Personal Pickup', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(16) NOT NULL,
  `categori_id` varchar(6) NOT NULL,
  `categori_nama` varchar(50) NOT NULL,
  `product_nama` varchar(50) NOT NULL,
  `product_keterangan` text NOT NULL,
  `product_harga` int(10) NOT NULL,
  `product_stok` int(3) NOT NULL,
  `product_ukuran` varchar(100) DEFAULT NULL,
  `product_gambar` varchar(15) NOT NULL,
  `product_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `categori_id`, `categori_nama`, `product_nama`, `product_keterangan`, `product_harga`, `product_stok`, `product_ukuran`, `product_gambar`, `product_status`) VALUES
('P18121001', 'C1001', 'Women Wear', 'Kemeja Putih', 'bahan catoon ', 150000, 27, 'S,M,L,XL', 'P18121001.jpg', 'active'),
('P18121002', 'C1002', 'Women Wear', 'Kaos Metal', 'bahan catooon super', 100000, 26, 'S,M,L,XL', 'P18121002.jpg', 'active'),
('P18121003', 'C1003', 'Women Wear', 'dresses orange pesta', 'bahan ', 200000, 27, 'S,M,L,XL', 'P18121003.jpg', 'active'),
('P18121004', 'C1003', 'Women Wear', 'Zalia Drawstring Wrap Dress', '- Wrap maxi dress bermotif bunga dengan detail ruffle\r\n- Warna navy\r\n- Kerah V\r\n- Unlined', 150000, 38, 'S,M,L,XL', 'P18121004.jpg', 'active'),
('P18121005', 'C1001', 'Women Wear', 'Kemeja Blazer', '-bahan rayon catoon\r\n-bahan super adem', 150000, 25, 'S,M,L,XL', 'P18121005.jpg', 'active'),
('P18121007', 'C1001', 'Women Wear', 'Kodz Lapel Collar Long Sleeve Button Down Shirt', '- Lace panelled sleeve shirt\r\n- Collared neckline\r\n- Unlined\r\n- Regular fit\r\n- Front button fastening\r\n- Polyester', 250000, 23, 'S,M,L,XL', 'P18121007.jpg', 'active'),
('P18121008', 'C1001', 'Women Wear', 'Kodz Relaxed Collar Long Sleeve Blouse', '-Long sleeved blouse\r\n- Collar neckline\r\n- Regular fit\r\n- Polyester', 150000, 40, 'S,M,L,XL', 'P18121008.jpg', 'active'),
('P18121009', 'C1001', 'Women Wear', 'Women Kemeja FLannel Kotak Lengan Panjang', '- Kain tebal dengan desain pakaian kerja â€”weâ€™ve menghasilkan kemeja flanel yang ultimate.\r\n-Terbuat dari 100% katun yang nyaman dan lembut', 199000, 34, 'S,M,L,XL', 'P18121009.jpg', 'active'),
('P18121010', 'C1001', 'Women Wear', 'Women Blus Rayon Kerah Terbuka Lengan Panjang', '- Proses tahan kusut untuk perawatan yang mudah\r\n- Lembut, ringan, halus dan terasa nyaman di kulit\r\n', 199000, 36, 'S,M,L,XL', 'P18121010.jpg', 'active'),
('P18121011', 'C1001', 'Women Wear', 'Logo Jeans Long Chambray Shirt', '- Kemeja denim warna solid\r\n- Warna biru\r\n- Detail kerah\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan', 170000, 15, 'S,M,L,XL', 'P18121011.jpg', 'active'),
('P18121012', 'C1002', 'Women Wear', 'Women T-SHIRT Katun Mercerized Lengan Frech', '-Baju kaus dengan kemilau bahan yang mengkilap dan bernuansa rapi.\r\n-Terbuat dari katun mercerized.', 99000, 40, 'S,M,L,XL', 'P18121012.jpg', 'active'),
('P18121013', 'C1002', 'Women Wear', 'Mango Michael Jackson T-Shirt', '- Michael Jackson graphic print short sleeve T-shirt\r\n- Sizing runs one size larger\r\n- Crew neckline\r\n- Unlined\r\n', 150000, 30, 'S,M,L,XL', 'P18121013.jpg', 'active'),
('P18121014', 'C1002', 'Women Wear', 'Mango Embroidered Cotton T-shirt', '-Short sleeved tee with embroidered details\r\n- Sizing runs one size larger\r\n- Crew neckline\r\n- Unlined\r\n- Regular fit\r\n- Cotton blend', 200000, 20, 'S,M,L,XL', 'P18121014.jpg', 'active'),
('P18121015', 'C1003', 'Women Wear', 'Pomelo Rochelle Tie Waist Shirt Dress', 'Shirt dress katun dengan aksen v neckline bermotif stripe yang terkesan klasik ini diaksentuasi dengan bahan yang dapat dijadikan pita di pinggang', 250000, 25, 'S,M,L,XL', 'P18121015.jpg', 'active'),
('P18121016', 'C1003', 'Women Wear', 'Berrybenka Label Jessie Tied Midi Dress Cream', 'Midi dress lengan pendek yang memiliki detail tied up pada bagian depan. Padankan dengan mules dan sling bag.', 229000, 38, 'S,M,L,XL', 'P18121016.jpg', 'active'),
('P18121017', 'C1003', 'Women Wear', 'TRISET Ladies Long Sleeve W/O Collar', '- Mini dress desain layer dengan detail motif paisley\r\n- Multiwarna\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit', 300000, 35, 'S,M,L,XL', 'P18121017.jpg', 'active'),
('P18121018', 'C1003', 'Women Wear', 'Pomelo Longsleeve Boho Maxi Dress - Red', '- Poliester\r\n- Desain motif floral\r\n- Berbentuk longgar\r\n- Karet pinggang elastis', 350000, 30, 'S,M,L,XL', 'P18121018.jpg', 'active'),
('P18121019', 'C1007', 'Eyewear', 'Quay Australia Boss Sunglasses', '- Solid tone tinted cateye sunglasses\r\n- Metal frame\r\n- Dark tinted lens\r\n- Non-moulded silicon nose pads\r\n- Slim arms with curved tips for better fit\r\n- Comes with soft case', 300000, 15, NULL, 'P18121019.jpg', 'active'),
('P18121020', 'C1005', 'Bags & Purses', 'EN-JI by Palomino Faranisa', '- Backpack teksur kulit desain kasual\r\n- Warna hitam\r\n- Material PU leather\r\n- 1 kantong depan beresleting\r\n- 2 kantong slot samping\r\n- 1 kantong belakang beresleting', 200000, 20, NULL, 'P18121020.jpg', 'active'),
('P18121021', 'C1005', 'Bags & Purses', 'Anello Anello Backpack', '- Backpack kasual dengan framed compartment\r\n- Warna hitam\r\n- Material poliester\r\n- 1 Kantong depan dengan resleting\r\n- 1 Kantong belakang dengan resleting', 450000, 30, NULL, 'P18121021.jpg', 'active'),
('P18121022', 'C1005', 'Bags & Purses', ' Ox Red-Royal Blue Kanken Classic Backpack', '- Backpack\r\n- Sintetis\r\n- Fabric strap\r\n- Warna merah\r\n- Adjustable shoulder strap\r\n- Twin top carry handle dengan snap button ', 200000, 40, NULL, 'P18121022.jpg', 'active'),
('P18121023', 'C1005', 'Bags & Purses', 'Zipper Detail Backpack', '-Colour: Pewter\r\n-Furry panel detail\r\n-Zipper closure\r\n-Top handle\r\n-Adjustable straps', 450000, 15, NULL, 'P18121023.jpg', 'active'),
('P18121024', 'C1005', 'Bags & Purses', 'Micro Stud Drawstring Backpack', '-Colour: Black\r\n-Micro stud details\r\n-Drawstring closure\r\n-Comes with adjustable straps', 550000, 10, NULL, 'P18121024.jpg', 'active'),
('P18121025', 'C1006', 'Bags & Purses', 'Chain Detail Front Flap Bag ', '-Colour: Prune\r\n-Textured front flap\r\n-Chain detail\r\n-Magnetic closure\r\n-Comes with long strap', 450000, 12, NULL, 'P18121025.jpg', 'active'),
('P18121026', 'C1006', 'Bags & Purses', 'Circular Push Lock Crossbody Bag ', '-Colour: Yellow\r\n-Crossbody style\r\n-Circular buckle detail\r\n-Push-lock closure\r\n-Comes with adjustable strap (detachable)', 700000, 15, NULL, 'P18121026.jpg', 'active'),
('P18121027', 'C1006', 'Bags & Purses', 'Chain Handle See Through Bag', '-Colour: White\r\n-Stone embellished push-lock detail\r\n-Chain handle\r\n-Comes with adjustable strap (detachable)', 650000, 20, NULL, 'P18121027.jpg', 'active'),
('P18121028', 'C1006', 'Bags & Purses', 'Snow Globe Effect Clutch', '-Colour: Black\r\n-Glitter snow globe effect\r\n-Magnetic closure\r\n-Comes with long chain (detachable)\r\n-Material Description:	Acrylic', 500000, 20, NULL, 'P18121028.jpg', 'active'),
('P18121030', 'C1007', 'Eyewear', 'Quay Australia RUMOURS Sunglasses', '- Sunnies detail gold tone\r\n- Warna coklat\r\n- Material tritan copolyester frame\r\n- Material polycarbonate lenses\r\n- Moulded nose pads\r\n- Slim arms dengan curved tips', 350000, 15, NULL, 'P18121030.jpg', 'active'),
('P18121031', 'C1008', 'Eyewear', 'Geometric Round Frame Shades', '-Colour: Purple\r\n-Round frames\r\n-Tinted lenses\r\n-Geometrical wire frame design\r\n-Nose pads for added comfort\r\n-Material Description:	Metal', 500000, 10, NULL, 'P18121031.jpg', 'active'),
('P18121032', 'C1008', 'Eyewear', 'Half Frame Round Shades', '-Colour: Cream\r\n-Round half wire frame design\r\n-Nose pads for added comfort\r\n-Material Description:	Metal', 600000, 10, NULL, 'P18121032.jpg', 'active'),
('P18121033', 'C1008', 'Eyewear', 'Semi-Precious Stone Shades', 'Silver round shades featuring tinted lenses and a semi-precious stone on each temple tip. Due to the unique nature of semi-precious stones, actual product may vary.\r\n-Material Description:	Metal', 550000, 15, NULL, 'P18121033.jpg', 'active'),
('P18121035', 'C1009', 'Footwear', 'Nike W Air Max 97 Se Shoes', '- Lifestyle sneakers dengan aksen gold tone \r\n- Warna abu-abu\r\n- Leather, tekstil, dan sintetis upper\r\n- Insole tekstil\r\n- Foam sockliner dengan Max Air cushioning\r\n- Rubber outsole untuk durabilit', 2000000, 10, '36,37,38,39,40,41', 'P18121035.jpg', 'active'),
('P18121036', 'C1009', 'Footwear', 'Vans Ua Sk8-Hi', '- High top sneakers nuansa monokrom\r\n- Warna putih\r\n- Material kanvas\r\n- Insole sintetis\r\n- Rubber outsole\r\n- Tali depan', 800000, 25, '36,37,38,39,40,41', 'P18121036.jpg', 'active'),
('P18121037', 'C1010', 'Footwear', 'Derby Heels', 'Seamless add class. Elevate your look by pairing these with a pair of dress shorts.\r\n\r\n-Colour: Cognac\r\n-Square toe\r\n-Block heel\r\n-Laced up closure', 599000, 24, '36,37,38,39,40,41', 'P18121037.jpg', 'active'),
('P18121038', 'C1010', 'Footwear', 'Ankle Strap Platform Sandals', 'Wear these with floaty dresses to balance out the chunkiness.\r\n\r\n-Colour: Lilac\r\n-Floral print\r\n-Slight platform\r\n-Sculptural block heel\r\n-Thin ankle straps\r\n-Lazy buckle closure\r\n-Material Description:	Fabric', 700000, 25, '36,37,38,39,40,41', 'P18121038.jpg', 'active'),
('P18121039', 'C1010', 'Footwear', 'Velvet Flocking Pointed Pumps', 'Wear these with anything from casual denims to flowy dresses.\r\n\r\n-Colour: Purple\r\n-Pointed toe\r\n-Star print velvet flocking\r\n-Mesh panelling\r\n-Stiletto heel\r\n-Material Description:	Fabric', 799000, 15, '36,37,38,39,40,41', 'P18121039.jpg', 'active'),
('P18121040', 'C1011', 'Footwear', 'Buckle Detail Sandals', 'Match with distressed denims for a casual weekend look.\r\n\r\n-Colour: Red\r\n-Buckle details\r\n-Ankle strap\r\n-Metal buckle closure', 799000, 20, '36,37,38,39,40,41', 'P18121040.jpg', 'active'),
('P18121041', 'C1011', 'Footwear', 'Embellished T-Bar Sandals', 'Wear these with flowy printed dresses for vacation-ready vibes.\r\n\r\n-Colour: Nude\r\n-Metal accented wood studs\r\n-T-Bar straps\r\n-Metal buckle closure', 150000, 10, '36,37,38,39,40,41', 'P18121041.jpg', 'active'),
('P26111001', 'C1002', 'Women Wear', 'Kaos Putih', 'T-shirt dengan bahan utama terbuat dari katun. Kerah bulat dan lengan pendek. Detail tulisan kontras. Keliman bawah lurus.', 150000, 4, 'S,M,L,XL', 'P26111001.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `password` varchar(10) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `type` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `nama`, `password`, `telepon`, `alamat`, `session_id`, `type`, `status`) VALUES
('annisa@gmail.com', 'annisa', '12345', '085342761123', 'purwokerto', '', 'administrator', 'active'),
('fany@gmail.com', 'Fannn', '12345', '08127890990', 'Jakarta Utara', 'pqi84p7si4eqfan1gjn48vlohu', 'member', 'active'),
('kodriyati@gmail.com', 'Kodriyati', 'kod12345', '085764324567', 'desa sidamulih, kecamatan rawalo, Purwokerto', 'dkm9vsplpsbuevn36a81jor85q', 'member', 'active'),
('rsitinur55@yahoo.co.id', 'rahmawati', 'rahma123', '085764324567', 'jakarta pusat', 'dkm9vsplpsbuevn36a81jor85q', 'administrator', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categori`
--
ALTER TABLE `categori`
  ADD PRIMARY KEY (`categori_id`);

--
-- Indexes for table `orderku`
--
ALTER TABLE `orderku`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderdetail_id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`pengiriman_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`,`categori_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `pengiriman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
