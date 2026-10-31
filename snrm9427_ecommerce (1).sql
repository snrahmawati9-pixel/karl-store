-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2019 at 11:18 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderku`
--

INSERT INTO `orderku` (`order_id`, `order_tgl`, `email`, `order_status`) VALUES
('O1001', '2018-12-28', 'wali.syahputro@gmail.com', 'pending'),
('O1002', '2018-12-28', 'wali.syahputro@gmail.com', 'pending'),
('O1003', '2018-12-28', 'kodriyati@gmail.com', 'pending'),
('O1004', '2018-12-29', 'wali.syahputro@gmail.com', 'pending');

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
  `orderdetail_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_id`, `order_id`, `product_id`, `order_detail_qty`, `product_nama`, `orderdetail_harga`) VALUES
(1, 'O1001', 'P18121005', 2, '', 150000),
(2, 'O1002', 'P18121010', 4, '', 199000),
(3, 'O1003', 'P18121004', 1, 'Zalia Drawstring Wrap Dress', 150000),
(4, 'O1003', 'P18121009', 1, 'Women Kemeja FLannel Kotak Lengan Panjang', 199000),
(5, 'O1004', 'P18121002', 2, 'Kaos Metal', 100000);

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
  `product_gambar` varchar(15) NOT NULL,
  `product_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `categori_id`, `categori_nama`, `product_nama`, `product_keterangan`, `product_harga`, `product_stok`, `product_gambar`, `product_status`) VALUES
('P18121001', 'C1001', 'Women Wear', 'Kemeja Putih', 'bahan catoon ', 150000, 30, 'P18121001.jpg', 'active'),
('P18121002', 'C1002', 'Women Wear', 'Kaos Metal', 'bahan catooon super', 100000, 28, 'P18121002.jpg', 'active'),
('P18121003', 'C1003', 'Women Wear', 'dresses orange pesta', 'bahan ', 200000, 30, 'P18121003.jpg', 'active'),
('P18121004', 'C1003', 'Women Wear', 'Zalia Drawstring Wrap Dress', '- Wrap maxi dress bermotif bunga dengan detail ruffle\r\n- Warna navy\r\n- Kerah V\r\n- Unlined', 150000, 39, 'P18121004.jpg', 'active'),
('P18121005', 'C1001', 'Women Wear', 'Kemeja Blazer', '-bahan rayon catoon\r\n-bahan super adem', 150000, 28, 'P18121005.jpg', 'active'),
('P18121007', 'C1001', 'Women Wear', 'Kodz Lapel Collar Long Sleeve Button Down Shirt', '- Lace panelled sleeve shirt\r\n- Collared neckline\r\n- Unlined\r\n- Regular fit\r\n- Front button fastening\r\n- Polyester', 250000, 25, 'P18121007.jpg', 'active'),
('P18121008', 'C1001', 'Women Wear', 'Kodz Relaxed Collar Long Sleeve Blouse', '-Long sleeved blouse\r\n- Collar neckline\r\n- Regular fit\r\n- Polyester', 150000, 40, 'P18121008.jpg', 'active'),
('P18121009', 'C1001', 'Women Wear', 'Women Kemeja FLannel Kotak Lengan Panjang', '- Kain tebal dengan desain pakaian kerja â€”weâ€™ve menghasilkan kemeja flanel yang ultimate.\r\n-Terbuat dari 100% katun yang nyaman dan lembut', 199000, 34, 'P18121009.jpg', 'active'),
('P18121010', 'C1001', 'Women Wear', 'Women Blus Rayon Kerah Terbuka Lengan Panjang', '- Proses tahan kusut untuk perawatan yang mudah\r\n- Lembut, ringan, halus dan terasa nyaman di kulit\r\n', 199000, 36, 'P18121010.jpg', 'active'),
('P18121011', 'C1001', 'Women Wear', 'Logo Jeans Long Chambray Shirt', '- Kemeja denim warna solid\r\n- Warna biru\r\n- Detail kerah\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan', 170000, 15, 'P18121011.jpg', 'active'),
('P18121012', 'C1002', 'Women Wear', 'Women T-SHIRT Katun Mercerized Lengan Frech', '-Baju kaus dengan kemilau bahan yang mengkilap dan bernuansa rapi.\r\n-Terbuat dari katun mercerized.', 99000, 40, 'P18121012.jpg', 'active'),
('P18121013', 'C1002', 'Women Wear', 'Mango Michael Jackson T-Shirt', '- Michael Jackson graphic print short sleeve T-shirt\r\n- Sizing runs one size larger\r\n- Crew neckline\r\n- Unlined\r\n', 150000, 30, 'P18121013.jpg', 'active'),
('P18121014', 'C1002', 'Women Wear', 'Mango Embroidered Cotton T-shirt', '-Short sleeved tee with embroidered details\r\n- Sizing runs one size larger\r\n- Crew neckline\r\n- Unlined\r\n- Regular fit\r\n- Cotton blend', 200000, 20, 'P18121014.jpg', 'active'),
('P18121015', 'C1003', 'Women Wear', 'Pomelo Rochelle Tie Waist Shirt Dress', 'Shirt dress katun dengan aksen v neckline bermotif stripe yang terkesan klasik ini diaksentuasi dengan bahan yang dapat dijadikan pita di pinggang', 250000, 25, 'P18121015.jpg', 'active'),
('P18121016', 'C1003', 'Women Wear', 'Berrybenka Label Jessie Tied Midi Dress Cream', 'Midi dress lengan pendek yang memiliki detail tied up pada bagian depan. Padankan dengan mules dan sling bag.', 229000, 40, 'P18121016.jpg', 'active'),
('P18121017', 'C1003', 'Women Wear', 'TRISET Ladies Long Sleeve W/O Collar', '- Mini dress desain layer dengan detail motif paisley\r\n- Multiwarna\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit', 300000, 35, 'P18121017.jpg', 'active'),
('P18121018', 'C1003', 'Women Wear', 'Pomelo Longsleeve Boho Maxi Dress - Red', '- Poliester\r\n- Desain motif floral\r\n- Berbentuk longgar\r\n- Karet pinggang elastis', 350000, 30, 'P18121018.jpg', 'active'),
('P18121019', 'C1007', 'Eyewear', 'Quay Australia Boss Sunglasses', '- Solid tone tinted cateye sunglasses\r\n- Metal frame\r\n- Dark tinted lens\r\n- Non-moulded silicon nose pads\r\n- Slim arms with curved tips for better fit\r\n- Comes with soft case', 300000, 15, 'P18121019.jpg', 'active'),
('P18121020', 'C1005', 'Bags & Purses', 'EN-JI by Palomino Faranisa', '- Backpack teksur kulit desain kasual\r\n- Warna hitam\r\n- Material PU leather\r\n- 1 kantong depan beresleting\r\n- 2 kantong slot samping\r\n- 1 kantong belakang beresleting', 200000, 20, 'P18121020.jpg', 'active'),
('P18121021', 'C1005', 'Bags & Purses', 'Anello Anello Backpack', '- Backpack kasual dengan framed compartment\r\n- Warna hitam\r\n- Material poliester\r\n- 1 Kantong depan dengan resleting\r\n- 1 Kantong belakang dengan resleting', 450000, 30, 'P18121021.jpg', 'active'),
('P18121022', 'C1005', 'Bags & Purses', ' Ox Red-Royal Blue Kanken Classic Backpack', '- Backpack\r\n- Sintetis\r\n- Fabric strap\r\n- Warna merah\r\n- Adjustable shoulder strap\r\n- Twin top carry handle dengan snap button ', 200000, 40, 'P18121022.jpg', 'active'),
('P18121023', 'C1005', 'Bags & Purses', 'Zipper Detail Backpack', '-Colour: Pewter\r\n-Furry panel detail\r\n-Zipper closure\r\n-Top handle\r\n-Adjustable straps', 450000, 15, 'P18121023.jpg', 'active'),
('P18121024', 'C1005', 'Bags & Purses', 'Micro Stud Drawstring Backpack', '-Colour: Black\r\n-Micro stud details\r\n-Drawstring closure\r\n-Comes with adjustable straps', 550000, 10, 'P18121024.jpg', 'active'),
('P18121025', 'C1006', 'Bags & Purses', 'Chain Detail Front Flap Bag ', '-Colour: Prune\r\n-Textured front flap\r\n-Chain detail\r\n-Magnetic closure\r\n-Comes with long strap', 450000, 12, 'P18121025.jpg', 'active'),
('P18121026', 'C1006', 'Bags & Purses', 'Circular Push Lock Crossbody Bag ', '-Colour: Yellow\r\n-Crossbody style\r\n-Circular buckle detail\r\n-Push-lock closure\r\n-Comes with adjustable strap (detachable)', 700000, 15, 'P18121026.jpg', 'active'),
('P18121027', 'C1006', 'Bags & Purses', 'Chain Handle See Through Bag', '-Colour: White\r\n-Stone embellished push-lock detail\r\n-Chain handle\r\n-Comes with adjustable strap (detachable)', 650000, 20, 'P18121027.jpg', 'active'),
('P18121028', 'C1006', 'Bags & Purses', 'Snow Globe Effect Clutch', '-Colour: Black\r\n-Glitter snow globe effect\r\n-Magnetic closure\r\n-Comes with long chain (detachable)\r\n-Material Description:	Acrylic', 500000, 20, 'P18121028.jpg', 'active'),
('P18121029', 'C1007', 'Eyewear', 'Oversized Lens Sunglasses', '-Colour: Tortoise shell\r\n-Oversized acetate butterfly frame\r\n-Tinted lenses\r\n-Material Description:	Acetate', 350000, 15, 'P18121029.jpg', 'active'),
('P18121030', 'C1007', 'Eyewear', 'Quay Australia RUMOURS Sunglasses', '- Sunnies detail gold tone\r\n- Warna coklat\r\n- Material tritan copolyester frame\r\n- Material polycarbonate lenses\r\n- Moulded nose pads\r\n- Slim arms dengan curved tips', 350000, 15, 'P18121030.jpg', 'active'),
('P18121031', 'C1008', 'Eyewear', 'Geometric Round Frame Shades', '-Colour: Purple\r\n-Round frames\r\n-Tinted lenses\r\n-Geometrical wire frame design\r\n-Nose pads for added comfort\r\n-Material Description:	Metal', 500000, 10, 'P18121031.jpg', 'active'),
('P18121032', 'C1008', 'Eyewear', 'Half Frame Round Shades', '-Colour: Cream\r\n-Round half wire frame design\r\n-Nose pads for added comfort\r\n-Material Description:	Metal', 600000, 10, 'P18121032.jpg', 'active'),
('P18121033', 'C1008', 'Eyewear', 'Semi-Precious Stone Shades', 'Silver round shades featuring tinted lenses and a semi-precious stone on each temple tip. Due to the unique nature of semi-precious stones, actual product may vary.\r\n-Material Description:	Metal', 550000, 15, 'P18121033.jpg', 'active'),
('P18121034', 'C1009', 'Footwear', 'Vans Ua Old Skool', '- Sneakers dengan suede finish dan detachable velcro lining\r\n- Warna putih\r\n- Upper suede\r\n- Insole tekstil\r\n- Rubber outsole', 1000000, 20, 'P18121034.jpg', 'active'),
('P18121035', 'C1009', 'Footwear', 'Nike W Air Max 97 Se Shoes', '- Lifestyle sneakers dengan aksen gold tone \r\n- Warna abu-abu\r\n- Leather, tekstil, dan sintetis upper\r\n- Insole tekstil\r\n- Foam sockliner dengan Max Air cushioning\r\n- Rubber outsole untuk durabilit', 2000000, 10, 'P18121035.jpg', 'active'),
('P18121036', 'C1009', 'Footwear', 'Vans Ua Sk8-Hi', '- High top sneakers nuansa monokrom\r\n- Warna putih\r\n- Material kanvas\r\n- Insole sintetis\r\n- Rubber outsole\r\n- Tali depan', 800000, 25, 'P18121036.jpg', 'active'),
('P18121037', 'C1010', 'Footwear', 'Derby Heels', 'Seamless add class. Elevate your look by pairing these with a pair of dress shorts.\r\n\r\n-Colour: Cognac\r\n-Square toe\r\n-Block heel\r\n-Laced up closure', 599000, 25, 'P18121037.jpg', 'active'),
('P18121038', 'C1010', 'Footwear', 'Ankle Strap Platform Sandals', 'Wear these with floaty dresses to balance out the chunkiness.\r\n\r\n-Colour: Lilac\r\n-Floral print\r\n-Slight platform\r\n-Sculptural block heel\r\n-Thin ankle straps\r\n-Lazy buckle closure\r\n-Material Description:	Fabric', 700000, 25, 'P18121038.jpg', 'active'),
('P18121039', 'C1010', 'Footwear', 'Velvet Flocking Pointed Pumps', 'Wear these with anything from casual denims to flowy dresses.\r\n\r\n-Colour: Purple\r\n-Pointed toe\r\n-Star print velvet flocking\r\n-Mesh panelling\r\n-Stiletto heel\r\n-Material Description:	Fabric', 799000, 15, 'P18121039.jpg', 'active'),
('P18121040', 'C1011', 'Footwear', 'Buckle Detail Sandals', 'Match with distressed denims for a casual weekend look.\r\n\r\n-Colour: Red\r\n-Buckle details\r\n-Ankle strap\r\n-Metal buckle closure', 799000, 20, 'P18121040.jpg', 'active'),
('P18121041', 'C1011', 'Footwear', 'Embellished T-Bar Sandals', 'Wear these with flowy printed dresses for vacation-ready vibes.\r\n\r\n-Colour: Nude\r\n-Metal accented wood studs\r\n-T-Bar straps\r\n-Metal buckle closure', 500000, 30, 'P18121041.jpg', 'active');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `nama`, `password`, `telepon`, `alamat`, `session_id`, `type`, `status`) VALUES
('annisa@gmail.com', 'annisa', '12345', '085342761123', 'purwokerto', '', 'administrator', 'active'),
('kodriyati@gmail.com', 'Kodriyati', '13579', '085764324567', 'desa sidamulih, kecamatan rawalo, Purwokerto', 'o9omn6smrf8ru4a7j2uaslrejm', 'member', 'active'),
('rsitinur55@yahoo.co.id', 'rahma', 'rahma12345', '085764324567', 'jakarta pusat', 'o9omn6smrf8ru4a7j2uaslrejm', 'administrator', 'active'),
('wali.syahputro@gmail.com', 'wali', '050796', '085671345234', 'jakarta selatan', 'h43440hjdn8ojd20kilkp4get1', 'member', 'active');

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
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
