-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 04:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gassa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Tablets & Drops'),
(2, 'Topical Medicines'),
(3, 'View Injections'),
(7, 'Devices And Equipments');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `na_orders`
--

CREATE TABLE `na_orders` (
  `id` int(11) NOT NULL,
  `id_card_image_path` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `prescription_image_path` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `na_orders`
--

INSERT INTO `na_orders` (`id`, `id_card_image_path`, `full_name`, `email`, `contact_number`, `prescription_image_path`, `status`) VALUES
(3, 'C:\\xampp\\htdocs\\GASAA pharmacy\\order_presc_img\\idcardimgourteam.jpeg', 'Mohamed Riyaz Mohamed Athiff Riyaz', 'athiffriyazcool318@gmail.com', '0776315366', 'C:\\xampp\\htdocs\\GASAA pharmacy\\order_identity_img\\prescriptionimg9 (1).png', 'order completed'),
(4, 'C:\\xampp\\htdocs\\GASAA pharmacy\\order_presc_img\\idcardimgourteam.jpeg', 'Mohamed Riyaz Mohamed Athiff Riyaz', 'athiffriyazcool318@gmail.com', '0776315366', 'C:\\xampp\\htdocs\\GASAA pharmacy\\order_identity_img\\prescriptionimg1 (1).png', 'order completed'),
(5, 'C:\\xampp\\htdocs\\GASAA pharmacy\\order_presc_img\\idcardimgWhatsApp Image 2023-12-07 at 18.26.17_8aac3b6f.jpg', 'Anuja Ellepola', 'anuja.ellepola@gmail.com', '0767327371', 'C:\\xampp\\htdocs\\GASAA pharmacy\\order_identity_img\\prescriptionimgWhatsApp Image 2023-12-07 at 18.27.42_420fcd84.jpg', 'order completed'),
(6, 'C:\\xampp\\htdocs\\GASAA pharmacy\\order_presc_img\\idcardimgIMG_8898.jpg', 'Anuja Ellepola', 'anujaellepola@gmail.com', '0767327371', 'C:\\xampp\\htdocs\\GASAA pharmacy\\order_identity_img\\prescriptionimgPic1.jpg', 'order completed'),
(7, 'C:\\xampp\\htdocs\\GASAA pharmacy\\order_presc_img\\idcardimgMy new number.png', 'Anuja Ellepola', 'anuja.ellepola@gmail.com', '0767327371', 'C:\\xampp\\htdocs\\GASAA pharmacy\\order_identity_img\\prescriptionimgMy new number.png', 'order completed');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `iv` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `email`, `address`, `card_number`, `expiry_date`, `cvv`, `order_date`, `iv`, `status`) VALUES
(35, 'Mohamed Riyaz Mohamed Athiff Riyaz', 'athiffriyazcool318@gmail.com', '38,Vidyala place,matale', '123456789', '09/2024', 'e1E', '2024-01-01 13:39:58', NULL, 'hidden'),
(43, 'Mohamed Riyaz Mohamed Athiff Riyaz', 'athiffriyazcool318@gmail.com', '38,Vidyala place,matale', '123456789', '09/22', '8hS', '2024-02-19 04:39:37', '???F?&??LO???\ZD?', 'hidden'),
(44, 'Mohamed Riyaz Mohamed Athiff Riyaz', 'athiffriyazcool318@gmail.com', '38,Vidyala place,matale', '123456789', '09/25', 'pS+', '2024-02-19 04:41:10', 'O|??9e??f_???b', 'hidden'),
(45, 'Mohamed Riyaz Mohamed Athiff Riyaz', 'athiffriyazcool318@gmail.com', '38,Vidyala place,matale', '123456789', '09/25', '7Mx', '2024-02-19 04:47:07', 'G4j??Տ?+?P???W?', 'hidden'),
(46, 'Athiff Riyaz', 'athiffriyazcool318@gmail.com', '23,Vidyala place,matale', '123456789', '09/25', 'vRm', '2024-02-19 04:48:29', '8G@i\ZB?U?֪?۬?', 'hidden'),
(47, 'Mohamed Riyaz Mohamed Athiff Riyaz', 'athiffriyazcool318@gmail.com', '38,Vidyala place,matale', '123456789', '11/25', '/kX', '2024-02-19 04:50:31', '?	?????ʺk????\"', 'hidden'),
(48, 'Mohamed Riyaz Mohamed Athiff Riyaz', 'athiffriyazcool318@gmail.com', '38,Vidyala place,matale', '123456789', '12/25', 'iUm', '2024-02-21 04:05:14', 'b?w??1\nCMm?<Lx', 'hidden'),
(49, 'Anuja', 'admin@gmail.com', 'aaaaa', '123456', '12/2026', 'JMp', '2024-02-21 18:09:59', '??e?????36?J??}?', 'hidden'),
(50, 'Anuja', 'anujaellepola@gmail.com', 'kandy', '12345678', '12/2026', '95X', '2024-02-21 18:11:00', ';FK\\1?/0???eݐ', 'hidden'),
(51, 'Anuja', 'admin@gmail.com', 'aaaaa', '12345', '02/2026', 'Auu', '2024-02-23 05:32:01', '???q?ug|\Z;?', 'hidden'),
(52, 'Anuja', 'user@gmail.com', 'aaaaa', '123444', '02/2026', '3SF', '2024-02-23 05:32:44', 'i???O?7?\r???', 'hidden'),
(53, 'Kumara', 'kumara@gmail.com', '1233', '123445666', '12/2024', 'wES', '2024-03-14 15:07:19', 'e?cU{j;䐜:(?i?', 'hidden');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_name`, `quantity`, `price`) VALUES
(12, 35, 'Rabies Vaccine', 1, 650.00),
(13, 43, 'Clenbuterol Hydrochloride Tablets', 2, 3900.00),
(14, 44, 'Clenbuterol Hydrochloride Tablets', 8, 3900.00),
(15, 45, 'Mifepristone Misoprostol Abortion Tablet', 1, 800.00),
(16, 46, 'Uric Acid Tablets', 1, 1100.00),
(17, 47, 'Uric Acid Tablets', 1, 1100.00),
(18, 48, 'Thyroxine Sodium Tablets And Capsules', 2, 3200.00),
(19, 49, 'Mifepristone Misoprostol Abortion Tablet', 1, 800.00),
(20, 50, 'Mifepristone Misoprostol Abortion Tablet', 1, 800.00),
(21, 51, 'Clenbuterol Hydrochloride Tablets', 10, 3900.00),
(22, 52, 'Mifepristone Misoprostol Abortion Tablet', 98, 800.00),
(23, 53, 'Mifepristone Misoprostol Abortion Tablet', 1, 800.00),
(24, 53, 'Clenbuterol Hydrochloride Tablets', 10, 3900.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `uploaded_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_image`, `price`, `category_id`, `uploaded_date`) VALUES
(1, 'Mifepristone Misoprostol Abortion Tablet', 'Mifepristone Blocks A Natural Substance (Progesterone) That Is Needed For Your Pregnancy To Continue.', './uploads/td1.png', 800, 1, '2023-12-19'),
(2, 'Clenbuterol Hydrochloride Tablets', 'Clenbuterol Is A Potent, Long-Lasting Bronchodilator That Is Prescribed For Human Use Outside Of The United States.', './uploads/td2.jpg', 3900, 1, '2023-12-19'),
(3, 'Thyroxine Sodium Tablets And Capsules', 'Thyroxoin Sodium 25mcg Tablet Is A Medicine Used To Treat An Underactive Thyroid Gland (Hypothyroidism).', './uploads/td3.png', 3200, 1, '2023-12-19'),
(4, 'Amoxicillin Drugs', 'Amoxicillin Is An Antibiotic Medication Belonging To The Aminopenicillin Class Of The Penicillin Family. The Drug Is Used To Treat Bacterial Infections, Such As Strep Throat, Pneumonia.', './uploads/td4.png', 4500, 1, '2023-12-19'),
(5, 'Uric Acid Tablets', 'Allopurinol Is In A Class Of Medications Called Xanthine Oxidase Inhibitors. It Works By Reducing The Production Of Uric Acid In The Body.', './uploads/td5.png', 1100, 1, '2023-12-19'),
(6, 'DHEA Tablet', 'Overview. Dehydroepiandrosterone (DHEA) Is A Hormone That Is Turned Into Male And Female Sex Hormones In The Body.', './uploads/td6.png', 650, 1, '2023-12-19'),
(7, 'Sertraline Tablets', 'Sertraline Is A Type Of Antidepressant Known As A Selective Serotonin Reuptake Inhibitor (SSRI).', './uploads/td7.png', 800, 1, '2023-12-19'),
(8, 'Paracetamol Tablets', 'Paracetamol Is Used For That Can Help Treat Pain And Reduce A High Temperature (Fever).', './uploads/td8.png', 1000, 1, '2023-12-19'),
(9, 'Aciclovir TIS 50mg', 'Aciclovir TIS 50mg Cream, A Potent Antiviral For Topical Use, Effectively Treats Herpes Simplex Infections. Available At Your Pharmacy For Targeted Relief And Prompt Healing. Try Today!', './uploads/TM1.jpg', 1300, 2, '2023-12-19'),
(10, 'Stubborn Acne Cream', 'Potent Stubborn Acne Cream: Our Pharmacy-Exclusive Formula Targets Persistent Acne, With Dermatologist-Approved Ingredients For Blemish-Free Skin.', './uploads/TM2.jpg', 6150, 2, '2023-12-19'),
(11, 'Dial Complete HandWash', 'Dial Complete HandWash For Pharmacies: Trusted Germ Protection, Kills 99.9% Of Bacteria, Gentle On Skin, Essential For Health-Conscious Customers.', './uploads/TM3.png', 11833, 2, '2023-12-19'),
(12, 'Detol Sanitizer', 'Detol Sanitizer, A Trusted Choice For Pharmacies, Ensures Effective Hand Hygiene. Its Advanced Formula Kills 99.9% Of Germs, Providing A Reliable Solution For Health-Conscious Customers.', './uploads/TM4.jpg', 520, 2, '2023-12-19'),
(13, 'Janet Bleaching Cream', 'Janet Bleaching Cream: A Trusted Pharmacy Solution For Radiant Skin, Effectively Lightening Dark Spots And Hyperpigmentation With Dermatologist-Recommended Ingredients.', './uploads/TM5.png', 1850, 2, '2023-12-19'),
(14, 'Vasline Body Cream', 'Vaseline Cream Is A Versatile Pharmacy Staple, Offering Effective Skin Hydration And Protection. Its Petroleum Jelly Base Soothes Dryness, Heals Cracked Skin, And Promotes Overall Skin Health.', './uploads/TM6.png', 2175, 2, '2023-12-19'),
(15, 'Voltarol Gel', 'Voltarol Gel Is A Topical Non-Prescription Medication Available At Pharmacies. It Contains Diclofenac, Providing Targeted Relief From Pain And Inflammation Associated With Conditions Like Arthritis.', './uploads/TM7.jpg', 680, 2, '2023-12-19'),
(16, 'Salonpas Spray', 'Salonpas Spray, Available At Your Local Pharmacy, Offers Fast-Acting Relief For Muscle And Joint Pain. Convenient And Easy To Apply, It Provides Targeted Relief For Aches And Pains.', './uploads/TM8.jpg', 2140, 2, '2023-12-19'),
(17, 'Detol Soap', 'Dettol Soap Is A Renowned Antibacterial Cleansing Bar, Trusted For Germ Protection. Its Powerful Formula Ensures A Refreshing And Hygienic Experience.', './uploads/TM9.jpg', 170, 2, '2023-12-19'),
(18, 'Fems', 'Sanitary Pads Are Absorbent Hygiene Products For Menstrual Flow Management, Providing Comfort, Protection, And Discretion For Women During Their Menstrual Cycles.', './uploads/TM10.jpeg', 210, 2, '2023-12-19'),
(19, 'Iodex Balm', 'Iodex Balm Is A Topical Analgesic Known For Its Soothing Relief From Muscular Pain And Stiffness. Its Unique Formula Combines Essential Oils For Fast-Acting Pain Relief.', './uploads/TM11.jpg', 120, 2, '2023-12-19'),
(20, 'Herpes Zoster (Shingles) Vaccine', 'CDC Recommends Two Doses Of Recombinant Zoster Vaccine (RZV, Shingrix) To Prevent Shingles And Related Complications In Adults 50 Years And Older. Shingrix Is Also Recommended For Adults 19 Years And Older Who Have Weakened Immune Systems Because Of Disease Or Therapy.', './uploads/i1.png', 15000, 3, '2023-12-19'),
(21, 'Typhoid Fever Vaccine', 'Typhoid Vaccine. There Are Two Vaccines To Prevent Typhoid Fever. One Is An Inactivated (Killed) Vaccine And The Other Is A Live, Attenuated (Weakened) Vaccine. Your Health Care Provider Can Help You Decide Which Type Of Typhoid Vaccine Is Best For You.', './uploads/i2.png', 3900, 3, '2023-12-19'),
(22, 'Influenza Vaccine', 'These Are Vaccines That Protect Against The Four Influenza Viruses That Research Indicates Will Be Most Common During The Upcoming Season. Most Flu Vaccines Are “Flu Shots” Given With A Needle, Usually In The Arm, But There Also Is A Nasal Spray Flu Vaccine.', './uploads/i3.png', 4500, 3, '2023-12-19'),
(23, 'Yellow Fever Vaccine', 'Yellow Fever Vaccine Is A Vaccine That Protects Against Yellow Fever. Yellow Fever Is A Viral Infection That Occurs In Africa And South America. Most People Begin To Develop Immunity Within Ten Days Of Vaccination And 99% Are Protected Within One Month, And This Appears To Be Lifelong', './uploads/i5.png', 1100, 3, '2023-12-19'),
(24, 'Rabies Vaccine', 'The Rabies Vaccine Is A Vaccine Used To Prevent Rabies. There Are Several Rabies Vaccines Available That Are Both Safe And Effective. Vaccinations Must Be Administered Prior To Rabies Virus Exposure Or Within The Latent Period After Exposure To Prevent The Disease.', './uploads/i6.png', 650, 3, '2023-12-19'),
(25, 'Pneumococcal Disease Vaccine', 'Pneumococcal Vaccines Are Vaccines Against The Bacterium Streptococcus Pneumoniae. Their Use Can Prevent Some Cases Of Pneumonia, Meningitis, And Sepsis.', './uploads/i7.png', 800, 3, '2023-12-19'),
(36, 'Varicella Vaccine', 'Varicella Vaccine, Also Known As Chickenpox Vaccine, Is A Vaccine That Protects Against Chickenpox. One Dose Of Vaccine Prevents 95% Of Moderate Disease And 100% Of Severe Disease.', './uploads/i8.png', 1000, 3, '2023-12-19'),
(37, 'Kinesiology Tape', 'Kinesiology Tape Is A Flexible Adhesive Strip Used In Sports And Rehabilitation To Support Muscles And Joints, Reduce Pain, And Enhance Performance Through Targeted Application And Tension.', './uploads/DE1.jpg', 2500, 7, '2023-12-20'),
(38, 'Wheelchair', 'A Wheelchair Is A Mobility Device Designed For Individuals With Limited Mobility. It Consists Of A Seat Mounted On Wheels, Enabling Users To Move Independently.', './uploads/DE2.jpg', 25990, 7, '2023-12-20'),
(39, 'OppO Neck Collar', 'A Neck Collar Is A Supportive Device Worn Around The Neck To Stabilize And Protect The Cervical Spine. It Aids In Healing Injuries And Provides Neck Support.', './uploads/DE3.jpg', 1330, 7, '2023-12-20'),
(40, 'Bo Hui Infrared Thermometer', 'Handheld, Infrared Thermometer Gun Measures Surface Temperature With Precision, Offering Non-Contact Readings For Quick And Accurate Temperature Assessment.', './uploads/DE5.jpg', 6000, 7, '2023-12-20'),
(41, 'Stethoscope', 'Innovative Medical Device Blending Stethoscope And Digital Technology, Enhancing Auscultation With Real-Time Data Analysis And Connectivity, Revolutionizing Patient Care And Diagnostic Precision.', './uploads/DE6.jpg', 9360, 7, '2023-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `product_size_variation`
--

CREATE TABLE `product_size_variation` (
  `variation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_size_variation`
--

INSERT INTO `product_size_variation` (`variation_id`, `product_id`, `size_id`, `quantity_in_stock`) VALUES
(12, 1, 0, 129),
(13, 2, 0, 120),
(14, 3, 0, 120),
(15, 4, 0, 234),
(16, 5, 0, 350),
(17, 6, 0, 455),
(18, 7, 0, 522),
(19, 8, 0, 125),
(20, 9, 0, 223),
(21, 10, 0, 356),
(22, 11, 0, 123),
(23, 12, 0, 435),
(24, 13, 0, 345),
(25, 14, 0, 300),
(26, 15, 0, 100),
(27, 16, 0, 333),
(28, 17, 0, 340),
(29, 18, 0, 234),
(30, 19, 0, 420),
(31, 20, 0, 100),
(32, 21, 0, 111),
(33, 22, 0, 222),
(34, 23, 0, 333),
(35, 24, 0, 321),
(36, 25, 0, 235),
(37, 36, 0, 123),
(38, 37, 0, 100),
(39, 38, 0, 10),
(40, 39, 0, 30),
(41, 40, 0, 40),
(42, 41, 0, 20),
(43, 44, 0, 100),
(44, 45, 0, 130),
(45, 46, 0, 123);

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `session_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`, `reset_token`) VALUES
(10, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL),
(25, 'staff', 'staff@gmail.com', '1253208465b1efa876f982d8a9e73eef', 'staff', NULL),
(26, 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `uc_cart` (`user_id`,`variation_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `na_orders`
--
ALTER TABLE `na_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_size_variation`
--
ALTER TABLE `product_size_variation`
  ADD PRIMARY KEY (`variation_id`),
  ADD UNIQUE KEY `uc_ps` (`product_id`,`size_id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `na_orders`
--
ALTER TABLE `na_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_size_variation`
--
ALTER TABLE `product_size_variation`
  MODIFY `variation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_form` (`id`),
  ADD CONSTRAINT `user_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
