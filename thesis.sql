-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 10:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) DEFAULT NULL,
  `mayor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mayor_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mayor_message` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `history` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `mayor`, `mayor_image`, `mayor_message`, `history`) VALUES
(1, 'Nelia B. Angeles', '/thesis/images/places/973e4ac60db98c31d393ec3ff87b096f.jpg', 'The Municipal Government and the people of Gen. E. Aguinaldo welcome you to our peaceful town, the home of warm and friendly Bailenos.\r\n\r\nAs you take the virtual tour around our 14 barangays, let this site help you with everything you need to know about our town.\r\n\r\nIt is our profound pleasure to serve you and we look forward to having you as our guest.', 'The municipality of General  E. Aguinaldo has a unique history distinct from those other towns of Cavite. Originally a small village commonly known as &quot;Baritan&quot;, this town has a series of names before it acquired its present recognition as a municipality. \r\n\r\nBailen was once under the jurisdiction of the town of Maragondon; it was then called Baritan then Batas or Batasan, which is derived from the Tagalog word bagtas (meaning path). Legend has it that one day, some Spanish priests, together with Spanish officers, visited the place for unknown reasons. They met a small old man whose appearance and actuation caught the attention of the priests and the officers. Amazed at the sight of the old man, the soldiers joked at each other and then laughed altogether in sarcasm. This annoyed the old man who applied his hypnotic spell making the soldier dance among themselves. He left them dancing and found them still dancing the next morning.  \r\n\r\nAware about the hypnotic power of the old man, the soldiers asked for forgiveness and it was only thereafter that they were able to rest from dancing. This incident was told by a Spanish officer to the Spanish governor who was so amazed that he called the place as &quot;Bailen&quot; coined from the Spanish verb &quot;Bailar which mean dance.  \r\n\r\nOn January 2 1858, the inhabitants, led by Pedro Lirio, filed a petition supported by complete and convincing justifications to the then Spanish Governor General Norzagaray for the separation of the barrio from its mother municipality and the creation of an independent one. \r\n\r\nOn August 2, 1858, the petitition was approved and Batasan was renamed Bailen. Unfortunately, however, due to the reorganization of the towns of Cavite in 1903, the municipalityof Bailen was reverted into a barrio and this time it was under the town of Alfonso. Led by Bartolome Angay and Agapito, the town people met for the conversion of Bailen back into a municipality and finally, in 1915 during the term of Governor Antero Soriano, Bailen regained its former status as a municipality. \r\n\r\nOn January 1, 1964, a municipal resolution changing the name Bailen to General Emilio Aguinaldo was approved by then Municipal Mayor Rafael Dalusag. It was favorably endorsed later by the Provincial Board of Cavite to Congress. On June 19, 1965, Republic Act No. 4346 was finally enacted changing Bailen to Gen. E. Aguinaldo in honor of the revolutionary leader and the first President of the Philippine Republic who is also a native of the province. It is bounded by Maragondon on the northeast, Alfonso on south and southeast, Magallanes on the west. It can be access through the Aguinaldo highway passing through Tagaytay City , turning right to Luksuhin Roadbefore reaching Sierra Grande. This road lead to Alfonso , turn left before reaching Alfonso town plaza then right after about two kilometers. Another adventurous way to reach the town is through Pala-pala road leading to Trece Martirez City , then to the Indang town proper passing through winding road and bridges leading to Alfonso. The nearest way though (if only the road is pave) is through the Naic Maragondon road passing through Bocal 4, then Mabato and the fresh river of Tarapitse. Tabora Lejos - a barrio, will be the entry point using this less travel road.');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `C_ID` int(255) NOT NULL,
  `C_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`C_ID`, `C_NAME`) VALUES
(1, 'goods'),
(2, 'infra'),
(5, 'food');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `C_ID` int(255) NOT NULL,
  `C_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_EMAIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_CONTENT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_DATE` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`C_ID`, `C_NAME`, `C_EMAIL`, `C_CONTENT`, `C_DATE`) VALUES
(1, 'jerico bencito', 'bencitojerico@gmail.com', 'nice ', '2020-06-14 08:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `E_ID` int(255) NOT NULL,
  `E_NAME_FIRST` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `E_NAME_LAST` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `E_DESIGNATION` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `E_CONTACT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `O_ID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`E_ID`, `E_NAME_FIRST`, `E_NAME_LAST`, `E_DESIGNATION`, `E_CONTACT`, `O_ID`) VALUES
(9, 'jerico', 'bencito', 'chairperson', '09177046612', 1),
(10, 'rey', 'bichayda', 'asdasd', '09159841234', 2),
(11, 'Test', 'test', 'test officer', '9177046615', 4);

-- --------------------------------------------------------

--
-- Table structure for table `festivities`
--

CREATE TABLE `festivities` (
  `F_ID` int(255) NOT NULL,
  `F_TITLE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `F_MONTH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `F_DATE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `F_DESCRIPTION` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `F_IMG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `F_STATUS` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `festivities`
--

INSERT INTO `festivities` (`F_ID`, `F_TITLE`, `F_MONTH`, `F_DATE`, `F_DESCRIPTION`, `F_IMG`, `F_STATUS`) VALUES
(11, 'Mutya ng Bailen', 'OCTOBER', '27', 'A pageant or a beauty pageant is a competition in which young women are judged to decide which one is the most beautiful.', '/thesis/images/festivities/69a7e3a3c631254c5a0a54cbbeef3478.jpg', 1),
(12, 'Araw ng Kalayaan', 'JUNE', '12', 'The annual June 12 observance of Philippine&rsquo;s Independence Day came into effect after past President Diosdado Macapagal signed the Republic Act No. 4166 regarding this matter on August 4, 1964.  This Act legalized the holiday, which is based on the ', '/thesis/images/festivities/67b6016ee4150239c71dc0a7d25b2e83.jpg', 1),
(13, 'Paskong Bailen', 'DECEMBER', '25', 'Christmas (or Feast of the Nativity) is an annual festival commemorating the birth of Jesus Christ, observed primarily on December 25 as a religious and cultural celebration among billions of people around the world.', '/thesis/images/festivities/f38b4c432a245bfe0c32ef08496d8504.jpg', 1),
(14, 'Bailar', 'FEBRUARY', '8', 'Halinat Sumayaw Dine sa Bailen', '/thesis/images/festivities/4408be0e28acb63991cb3d9493a4cc33.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `LN_ID` int(255) NOT NULL,
  `LN_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `LN_TITLE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LN_DESCRIPTION` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LN_IMG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`LN_ID`, `LN_DATE`, `LN_TITLE`, `LN_DESCRIPTION`, `LN_IMG`) VALUES
(4, '2020-06-02 12:49:07', 'MUNICIPAL HALL', 'asdasd', '/thesis/images/latest_news/572c48f400dd6540244a3bebef6edc72.jpg'),
(5, '2020-06-02 12:49:19', 'new', 'asdasd', '/thesis/images/latest_news/aad43442d19089009668c90afbec6f72.jpg'),
(7, '2020-06-10 16:58:19', 'ASDADSASD', 'ASDASDADSASDADSASD', '/thesis/images/latest_news/9dfa6bfbff87076bf9db2243c879c2fe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `L_ID` int(255) NOT NULL,
  `L_FULLNAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `L_EMAIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `L_PASSWORD` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `L_LOGIN_DATE` datetime DEFAULT current_timestamp(),
  `L_LAST_LOGIN` datetime DEFAULT NULL,
  `L_PERMISSIONS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`L_ID`, `L_FULLNAME`, `L_EMAIL`, `L_PASSWORD`, `L_LOGIN_DATE`, `L_LAST_LOGIN`, `L_PERMISSIONS`) VALUES
(1, 'admin admin', 'admin@gmail.com', 'adminadmin', '2020-06-08 15:29:10', '2020-06-15 10:30:25', 'admin'),
(5, 'reynaldo bichayda', 'reybichayda@gmail.com', 'pogiako', '2020-06-09 20:07:43', '2020-06-13 19:50:22', 'tourism'),
(11, 'test test', 'test@gmail.com', 'testtest', '2020-06-13 03:41:50', '2020-06-12 21:42:06', 'ordinance');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `P_ID` int(255) NOT NULL,
  `P_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`P_ID`, `P_Name`) VALUES
(2, 'Tourism'),
(3, 'Procurement'),
(4, 'Services'),
(5, 'About'),
(6, 'Contact');

-- --------------------------------------------------------

--
-- Table structure for table `method`
--

CREATE TABLE `method` (
  `M_ID` int(255) NOT NULL,
  `M_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `method`
--

INSERT INTO `method` (`M_ID`, `M_NAME`) VALUES
(1, 'SMALL VALUE PROCUREMENT'),
(2, 'PUBLIC BIDDING');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `O_ID` int(255) NOT NULL,
  `O_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`O_ID`, `O_NAME`) VALUES
(1, 'SANGGUNIANG BAYAN'),
(2, 'MUNICIPAL MAYOR'),
(4, 'AGRICULTURE'),
(5, 'Office of the Mayor - Secretary '),
(6, 'HRM Office   '),
(7, 'Treasury Office '),
(8, 'Budget Office   '),
(9, 'Accounting Office '),
(10, 'Assessor Office '),
(11, 'Civil Registry Office'),
(12, 'MSWD Office'),
(13, 'Municipal Health Office'),
(14, 'Engineering Office'),
(15, 'MPDC  '),
(16, 'Office of the Building Official'),
(17, 'Gen. E. Aguinaldo Public Market'),
(18, 'Gen. E. Aguinaldo Public Cemetery'),
(19, 'Bids &amp; Awards Committee');

-- --------------------------------------------------------

--
-- Table structure for table `ordinance`
--

CREATE TABLE `ordinance` (
  `id` int(255) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pdf_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordinance`
--

INSERT INTO `ordinance` (`id`, `author`, `title`, `pdf_file`) VALUES
(6, 'jerico 1', 'asdasda', '/thesis/uploads/pdf/Family-Code-of-Philippines_Philippines.pdf'),
(8, 'test', 'teste', '/thesis/uploads/pdf/annual budget.pdf'),
(9, 'test1', 'test1', '/thesis/uploads/pdf/NUR-1210-PEDIA-HANDOUTS-2020.pdf'),
(10, 'test3', 'test3', '/thesis/uploads/pdf/SK Operations Manual.pdf'),
(16, 'jerico', 'titli', '/thesis/uploads/pdf/NUR-1210-MATERNAL-HANDOUTS-2020.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `PL_ID` int(255) NOT NULL,
  `PL_TITLE` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PL_DESCRIPTION` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `PL_IMG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PL_STATUS` int(255) NOT NULL DEFAULT 1,
  `PLOC_ID` int(225) DEFAULT NULL,
  `embed` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`PL_ID`, `PL_TITLE`, `PL_DESCRIPTION`, `PL_IMG`, `PL_STATUS`, `PLOC_ID`, `embed`) VALUES
(5, 'Municipal Hall', 'Gen. Emilio Aguinaldo formerly called Bailen is an upland town about 400 meters above sea level. It is one of the most isolated of Cavite&rsquo;s 21 municipalities and 3 cities. It is bounded on the south and southeast of Alfonso; on the west by  municipality of Magallanes and on the north and northeast by the town of Maragondon.  It lies 86 kilometers southwest of Manila and accessible to and from towns of the province, as well as from Manila through Gen. E. Aguinaldo-Alfonso-Tagaytay road and the Gen. E. Aguinaldo-Alfonso-Indang road. The Maragondon-Aguinaldo road is an alternative route going to Magallanes and northern part of the province .\r\n', '/thesis/images/places/d57a7131058cac5d7ae4209afe342f53.jpg', 1, 5, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7736.757454876821!2d120.80539892539107!3d14.17258224158028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5279dae35d9e27ba!2sGeneral%20Emilio%20Aguinaldo%20Municipal%20Hall!5e0!3m2!1sen!2sph!4v1592196288850!5m2!1sen!2sph\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(6, 'Talong Mataas', 'With a height of just about two meters, Talong Mataas (&quot;high waterfalls&quot;) might disappoint travelers expecting a grand waterfalls. Getting there takes about 20 minutes of trekking and slogging through dense vegetation. The falls cascades to a small catch basin and flows into a gentle stream, only about ankle-deep in most parts during good weather. There are no pools large enough to swim in but visitors can go river trekking and hiking around the area.', '/thesis/images/places/7c92060c8f5a118b7398d654fc855bd8.jpg', 1, 1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1934.110481985537!2d120.79271660845876!3d14.181832389240265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd8544edd49ced%3A0xf7cddd1056ea3889!2sMaranatha%20River%20Park!5e0!3m2!1sen!2sph!4v1592196399357!5m2!1sen!2sph\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(42, 'Malibiclibic Falls', 'The most popular destination in Bailen, Malibiclibic Falls is distinctive for its rock formations. The waterfall itself is only about two meters high, but rock formations surrounding it stand at around 10 meters. Coming from the rivers of Alfonso, Bailen&#039;s neighboring town, the water drops to a large pool about 20 meters deep before flowing to Malibiclibic River. Tourists may swim in the pool but are strongly advised to stay in the shallow portions. There&#039;s a strong undertow as the water gets deeper. The river, about a meter deep in some parts, also has a powerful current. Getting to Malibiclibic Falls entails 30 minutes of trekking and clambering on moss-covered boulders. The nearby Putikan River, a 20-minute trek from Malibiclibic, has much calmer waters and is great for boating and kayaking (bring your own gear). It also supports an abundant population of freshwater fish like carp and tilapia.', '/thesis/images/places/9bc22bac0a592cd2970b087f2f869bb1.jpg', 1, 11, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3867.6664455690616!2d120.77610581469204!3d14.21429869004947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd843d1ef9fd71%3A0x9446f9b17f930f97!2smalibic-libic%20falls!5e0!3m2!1sen!2sph!4v1592196144551!5m2!1sen!2sph\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(43, 'Tala River', 'Tala River got its name from a pair of giant boulders situated in the middle of the river. The boulders are also known as &quot;Paliguang Aso&quot; (bath for dogs) among the locals, although dogs are rarely spotted bathing there. Fed by tributaries in Alfonso and Bailen, the river was once a hydroelectric energy source that powered a nearby rice mill. Today, only the moss-covered ruins of the dam remain. Mag-asawang Bato is located just below the Barangay Hall of Poblacion Dos. Visitors have to go down a long flight of stairs with about 160 steps to reach the river. It&#039;s a good spot for picnics, swimming, and river trekking.', '/thesis/images/places/925da445c47302e91c1f456b45f8ac17.jpg', 1, 8, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1626.3517037817721!2d120.79178074438298!3d14.186692380170335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd852784ae30e3%3A0x44b361ed76a52f2c!2sTala%20River%20Park!5e0!3m2!1sen!2sph!4v1592196091064!5m2!1sen!2sph\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(45, 'Mag-asawang Bato', 'Mag-asawang Bato got its name from a pair of giant boulders situated in the middle of the river. The boulders are also known as &quot;Paliguang Aso&quot; (bath for dogs) among the locals, although dogs are rarely spotted bathing there. Fed by tributaries in Alfonso and Bailen, the river was once a hydroelectric energy source that powered a nearby rice mill. Today, only the moss-covered ruins of the dam remain. Mag-asawang Bato is located just below the Barangay Hall of Poblacion Dos. Visitors have to go down a long flight of stairs with about 160 steps to reach the river. It&#039;s a good spot for picnics, swimming, and river trekking.', '/thesis/images/places/62b922e136844af16f27a21576149160.jpg', 1, 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d575.0178227854872!2d120.79589599063678!3d14.180516841618369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd84870ddb2aa9%3A0x882ee1f4b43adacb!2sPaliguang%20Aso!5e0!3m2!1sen!2sph!4v1592191888539!5m2!1sen!2sph\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `place_location`
--

CREATE TABLE `place_location` (
  `PLOC_ID` int(255) NOT NULL,
  `PLOC_BARANGAY` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `place_location`
--

INSERT INTO `place_location` (`PLOC_ID`, `PLOC_BARANGAY`) VALUES
(1, 'POBLACION I'),
(2, 'POBLACION II'),
(3, 'POBLACION III'),
(4, 'POBLACION IV'),
(5, 'CASTAÑOS CERCA'),
(6, 'CASTAÑOS LEJOS'),
(7, 'KABULUSAN'),
(8, 'TABORA'),
(9, 'A.DALUSAG'),
(10, 'BATAS-DAO'),
(11, 'LUMIPA'),
(12, 'KAYMISAS'),
(13, 'KAYPAABA'),
(14, 'NARVAEZ');

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `PROC_ID` int(255) NOT NULL,
  `PROJ_ID` int(255) DEFAULT NULL,
  `C_ID` int(255) DEFAULT NULL,
  `PROC_TITLE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROC_BUDGET` double(64,2) DEFAULT NULL,
  `PROC_WORD` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROC_DATE` date DEFAULT NULL,
  `O_ID` int(255) DEFAULT NULL,
  `M_ID` int(255) DEFAULT NULL,
  `STAT_ID` int(255) DEFAULT NULL,
  `PROC_DATE_DEAD` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `procurement`
--

INSERT INTO `procurement` (`PROC_ID`, `PROJ_ID`, `C_ID`, `PROC_TITLE`, `PROC_BUDGET`, `PROC_WORD`, `PROC_DATE`, `O_ID`, `M_ID`, `STAT_ID`, `PROC_DATE_DEAD`) VALUES
(1, 2, 1, 'PROCUREMENT OF GARBAGE HAULING SERVICES FOR SIX (6) MONTHS FOR THE MUNICIPALITY OF GEN. E. AGUINALDO, MUNICIPAL ENVIRONMENTAL &amp; NATURAL RESOURCES OFFICE, GEN. E. AGUINALDO, CAVITE', 318000.00, 'Three Hundred Eighteen Thousand Pesos', '2020-05-05', 2, 2, 3, '2020-06-12'),
(2, 3, 5, 'PROCUREMENT OF GARBAGE HAULING SERVICES FOR SIX (6) MONTHS FOR THE MUNICIPALITY OF GEN. E. AGUINALDO, MUNICIPAL ENVIRONMENTAL &amp; NATURAL RESOURCES OFFICE, GEN. E. AGUINALDO, CAVITE', 380000.00, 'three hundred thousand pesos', '2020-05-12', 2, 2, 3, '2020-06-01'),
(3, 3, 1, 'MUNICIPAL HALL', 10000.00, 'ten thousand pesos', '2020-05-20', 2, 2, 1, '2020-06-26'),
(4, 2, 5, 'MUNICIPAL HALL', 123.00, 'asd', '2020-06-07', 4, 2, 1, '2020-06-16'),
(5, 3, 1, 'SUPPLY AND DELIVERY OF VARIOUS RESCUE SUPPLIES AND EQUIPMENT FOR MDRRMO, CASTA&Ntilde;OS CERCA, GEN. E. AGUINALDO, CAVITE', 145000.00, '', '2020-06-15', 1, 1, 1, '2020-06-19'),
(6, 3, 1, 'test', 12333.00, '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  number_format() expects parameter 1 to be float, string given in &lt;b&gt;C:xampphtdocs	hesisadminprocurement.php&lt;/b&gt; on line &lt;b&gt;65&lt;/b&gt;&lt;br /&gt;&lt;br /&gt;&lt;b&gt;Notice&lt;/b&gt;:  Undefined', '2020-06-14', 4, 1, 3, '2020-06-15'),
(7, 2, 1, 'test1', 9000.00, 'NINE THOUSAND ', '2020-06-10', 4, 2, 2, '2020-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PROD_ID` int(255) NOT NULL,
  `PROD_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROD_DESCRIPTION` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROD_IMG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROD_STATUS` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PROD_ID`, `PROD_NAME`, `PROD_DESCRIPTION`, `PROD_IMG`, `PROD_STATUS`) VALUES
(4, 'Tilbok', 'Ang Tilbok ay isa rin sa pagkaing kilala sa bayan ng Bailen. Ito ay gawa sa kinayod na buko, gatas na malapot(condensed), galapong, asukal ,food color na pangpakulay. Ito ay niluluto sa katamtamang apoy habang hinahalo hanggang sa kumunat.', '/thesis/images/products/0e8603658e8997eb1fdbdff3eea94894.png', 1),
(5, 'Puto Bumbong', 'Puto Bumbong, that ubiquitous purple rice cake during Christmastime, is the famous specialty of a small, unnamed eatery in Bailen. For only P10, you can enjoy four pieces of puto bumbong topped with margarine, grated coconut, and delicious muscovado. It also comes with a free cup of pandan and avocado leaf tea. Orie Angue, the owner, has been making puto bumbong for 14 years now. She only used to sell it during the holidays but due to popular demand, the rice cake is now available all year.', '/thesis/images/products/581da79e9c242663a70d3d089cdc5301.png', 1),
(8, 'Atchara', 'Gen. Aguinaldo also known as Bailen, an upland town in Cavite, is a cool and peaceful place. People here survive mostly in Agriculture. One who visits the place could absolutely enjoy the quiet environment, fresh air, and most especially, fresh and luscious fruits and vegetables. The abundance of vegetables in the place made the municipality a popular producer of pickles.', '/thesis/images/products/9e72998b3fd76e92344ad66b10495bd9.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_reference`
--

CREATE TABLE `project_reference` (
  `PROJ_ID` int(255) NOT NULL,
  `PROJ_CODE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_reference`
--

INSERT INTO `project_reference` (`PROJ_ID`, `PROJ_CODE`) VALUES
(1, 'SVP'),
(2, 'PB'),
(3, 'NP');

-- --------------------------------------------------------

--
-- Table structure for table `requirement`
--

CREATE TABLE `requirement` (
  `R_ID` int(255) NOT NULL,
  `R_COUNT` int(255) NOT NULL,
  `R_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `R_TYPE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requirement`
--

INSERT INTO `requirement` (`R_ID`, `R_COUNT`, `R_NAME`, `R_TYPE`) VALUES
(1, 1, 'BIRTH CERT', 'NEW'),
(1, 2, 'ceula', 'NEW'),
(1, 3, 'bussness permit', 'NEW'),
(1, 1, 'test', 'OLD'),
(1, 2, 'test1', 'OLD'),
(1, 3, 'test2', 'OLD'),
(2, 1, 'Proof of business registration, incorporation, or legal personality(DTI, SEC/CDA).', 'NEW'),
(2, 2, 'Basis for Computing taxes, fees and charges', 'NEW'),
(2, 3, 'occupancy permit.', 'NEW'),
(2, 4, 'Contract of leas(if leave).', 'NEW'),
(2, 5, 'brgy.clearance with community tax certification', 'NEW'),
(2, 1, 'Basis for Computing taxes, fees and charges', 'OLD'),
(2, 2, 'Barangay clearance with community tax certificate', 'OLD'),
(2, 3, 'Sanitary Permit', 'OLD'),
(3, 1, 'COMMUNITY TAX CERTIFICATE', 'NEW'),
(3, 2, 'BARANGAY CLEARANCE', 'NEW'),
(3, 3, 'POLICE CLEARANCE', 'NEW'),
(3, 4, 'JUDGE CLEARANCE', 'NEW'),
(3, 1, 'none', 'OLD'),
(4, 1, 'test1', 'NEW'),
(4, 2, 'test2', 'NEW'),
(4, 3, 'test3', 'NEW'),
(4, 4, 'test4', 'NEW'),
(4, 1, 'test1', 'OLD'),
(4, 2, 'test2', 'OLD'),
(4, 3, 'test3', 'OLD'),
(4, 4, 'test4', 'OLD'),
(5, 1, 'asd aw  ', 'NEW'),
(5, 1, 'a sdf as e', 'OLD'),
(6, 1, 'Xerox Copy of Certificate', 'NEW'),
(6, 2, 'Deed of Conveyance', 'NEW'),
(6, 3, 'BIR Cert.', 'NEW'),
(6, 4, 'Realty Tax Receipt', 'NEW'),
(6, 5, 'Transfer Tax receipt', 'NEW'),
(6, 6, 'Certified True Copy of Old Tax Declaration', 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `S_ID` int(255) NOT NULL,
  `S_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `E_ID` int(255) DEFAULT NULL,
  `O_ID` int(255) DEFAULT NULL,
  `R_ID` int(255) DEFAULT NULL,
  `S_FEES` double(64,2) DEFAULT NULL,
  `SS_ID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`S_ID`, `S_NAME`, `E_ID`, `O_ID`, `R_ID`, `S_FEES`, `SS_ID`) VALUES
(1, 'business permit', 9, 1, 1, 100.00, 1),
(2, 'BUSINESS PERMIT AND LICENSING SECTION', 11, 2, 2, 1000.00, 2),
(3, 'ISSUANCE OF MAYOR&#039;S CLEARANCE', 9, 2, 3, 3000.00, 3),
(4, 'National statistic office', 9, 2, 4, 1500.00, 4),
(5, 'asdfa', 9, 4, 5, 1234.00, 5),
(6, 'Title Property ', 9, 4, 6, 200.00, 6);

-- --------------------------------------------------------

--
-- Table structure for table `service_step`
--

CREATE TABLE `service_step` (
  `SS_ID` int(255) NOT NULL,
  `SS_COUNT` int(255) NOT NULL,
  `SS_APPLICANT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SS_ACTIVITY` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SS_DURATION` int(255) DEFAULT NULL,
  `E_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_step`
--

INSERT INTO `service_step` (`SS_ID`, `SS_COUNT`, `SS_APPLICANT`, `SS_ACTIVITY`, `SS_DURATION`, `E_NAME`) VALUES
(1, 1, 'AKASLJDALKSDJALKSD', 'qweq', 5, 'jerico'),
(1, 2, 'qweqwe', 'qweq', 3, 'jerico'),
(1, 3, 'asdawsdasd asd as', '9', 10, 'jerico'),
(2, 1, 'Proceed to Business permit & Licensing Section for issuance of Application Form &filling up the same.', 'give the client an application form & check all the requirements presented', 2, 'jerico'),
(2, 2, 'Proceed to Business permit & Licensing Section for issuance of Application Form &filling up the same.', 'give the client an application form & check all the requirements presented', 5, 'jerico'),
(2, 3, 'Proceed to Business permit & Licensing Section for issuance of Application Form &filling up the same.', 'give the client an application form & check all the requirements presented', 8, 'jerico'),
(2, 4, 'Proceed to Business permit & Licensing Section for issuance of Application Form &filling up the same.', 'give the client an application form & check all the requirements presented', 3, 'jerico'),
(2, 5, 'Proceed to Business permit & Licensing Section for issuance of Application Form &filling up the same.', 'give the client an application form & check all the requirements presented', 6, 'jerico'),
(3, 1, 'SUBMIT ALL THE REQUIREMENTS', 'RECIEVE AND REVIEW THE REWUIREMENTS IF COMPLETE AND DULY SIGNED', 2, 'jerico'),
(3, 2, 'Proceed to the Treasurer’s Office to pay prescribed fee and buy documentary stamp', 'Receive payment and issue Official Receipt and documentary stamp.', 5, 'jerico'),
(3, 3, 'Present Official receipt at the Mayor’s Office', 'Prepare the clearance.', 5, 'jerico'),
(3, 4, 'Affix signature on the clearance', 'Sign the clearance.', 1, 'jerico'),
(3, 5, 'Receive the Mayor’s  clearance', 'Get a duplicate copy, record and release the clearance.', 1, 'jerico'),
(4, 1, 'bring requirements', 'process the document', 4, 'jerico'),
(4, 2, 'tset', 'test', 12, 'jerico'),
(5, 1, 'qw qwe ', 'qwe qw ', 412, '  awsefa e'),
(6, 1, 'Submit All the Requirements', 'provide the client w/ a short briefing on the service & its requirements', 5, 'Gemma D. Agustin & Marisa Ilao'),
(6, 3, 'Submit All the Requirements', 'Typing of Tax Declaration ', 15, 'Gemma D. Agustin & Marisa Ilao');

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `SRC_ID` int(255) NOT NULL,
  `SRC_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE `stat` (
  `STAT_ID` int(255) NOT NULL,
  `STAT_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stat`
--

INSERT INTO `stat` (`STAT_ID`, `STAT_NAME`) VALUES
(1, 'AWARDED'),
(2, 'PENDING'),
(3, 'FAILED');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vemployee`
-- (See below for the actual view)
--
CREATE TABLE `vemployee` (
`E_ID` int(255)
,`E_NAME_FIRST` varchar(255)
,`E_NAME_LAST` varchar(255)
,`E_DESIGNATION` varchar(255)
,`E_CONTACT` varchar(255)
,`O_NAME` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewservice`
-- (See below for the actual view)
--
CREATE TABLE `viewservice` (
`S_ID` int(255)
,`S_NAME` varchar(255)
,`E_NAME_FIRST` varchar(255)
,`E_NAME_LAST` varchar(255)
,`E_DESIGNATION` varchar(255)
,`E_CONTACT` varchar(255)
,`O_NAME` varchar(255)
,`S_FEES` double(64,2)
,`R_ID` int(255)
,`SS_ID` int(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vplaces`
-- (See below for the actual view)
--
CREATE TABLE `vplaces` (
`PL_ID` int(255)
,`PL_TITLE` varchar(225)
,`PL_DESCRIPTION` text
,`PL_IMG` varchar(255)
,`PLOC_ID` int(225)
,`PLOC_BARANGAY` varchar(255)
,`PL_STATUS` int(255)
,`embed` mediumtext
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vprocurement`
-- (See below for the actual view)
--
CREATE TABLE `vprocurement` (
`PROC_ID` int(255)
,`PROJ_CODE` varchar(255)
,`C_NAME` varchar(255)
,`PROC_TITLE` varchar(255)
,`PROC_BUDGET` double(64,2)
,`PROC_WORD` varchar(255)
,`PROC_DATE` date
,`PROC_DATE_DEAD` date
,`O_NAME` varchar(255)
,`M_NAME` varchar(255)
,`STAT_ID` int(255)
,`STAT_NAME` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vservices`
-- (See below for the actual view)
--
CREATE TABLE `vservices` (
`S_ID` int(255)
,`S_NAME` varchar(255)
,`O_NAME` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vemployee`
--
DROP TABLE IF EXISTS `vemployee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vemployee`  AS  (select `e`.`E_ID` AS `E_ID`,`e`.`E_NAME_FIRST` AS `E_NAME_FIRST`,`e`.`E_NAME_LAST` AS `E_NAME_LAST`,`e`.`E_DESIGNATION` AS `E_DESIGNATION`,`e`.`E_CONTACT` AS `E_CONTACT`,`o`.`O_NAME` AS `O_NAME` from (`employee` `e` join `office` `o` on(`e`.`O_ID` = `o`.`O_ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `viewservice`
--
DROP TABLE IF EXISTS `viewservice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewservice`  AS  (select `s`.`S_ID` AS `S_ID`,`s`.`S_NAME` AS `S_NAME`,`e`.`E_NAME_FIRST` AS `E_NAME_FIRST`,`e`.`E_NAME_LAST` AS `E_NAME_LAST`,`e`.`E_DESIGNATION` AS `E_DESIGNATION`,`e`.`E_CONTACT` AS `E_CONTACT`,`o`.`O_NAME` AS `O_NAME`,`s`.`S_FEES` AS `S_FEES`,`r`.`R_ID` AS `R_ID`,`st`.`SS_ID` AS `SS_ID` from ((((`service` `s` join `office` `o` on(`s`.`O_ID` = `o`.`O_ID`)) join `employee` `e` on(`s`.`E_ID` = `e`.`E_ID`)) join `requirement` `r` on(`s`.`R_ID` = `r`.`R_ID`)) join `service_step` `st` on(`s`.`SS_ID` = `st`.`SS_ID`)) group by `s`.`S_ID`) ;

-- --------------------------------------------------------

--
-- Structure for view `vplaces`
--
DROP TABLE IF EXISTS `vplaces`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vplaces`  AS  (select `p`.`PL_ID` AS `PL_ID`,`p`.`PL_TITLE` AS `PL_TITLE`,`p`.`PL_DESCRIPTION` AS `PL_DESCRIPTION`,`p`.`PL_IMG` AS `PL_IMG`,`p`.`PLOC_ID` AS `PLOC_ID`,`pl`.`PLOC_BARANGAY` AS `PLOC_BARANGAY`,`p`.`PL_STATUS` AS `PL_STATUS`,`p`.`embed` AS `embed` from (`places` `p` join `place_location` `pl` on(`p`.`PLOC_ID` = `pl`.`PLOC_ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vprocurement`
--
DROP TABLE IF EXISTS `vprocurement`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vprocurement`  AS  (select `p`.`PROC_ID` AS `PROC_ID`,`pr`.`PROJ_CODE` AS `PROJ_CODE`,`c`.`C_NAME` AS `C_NAME`,`p`.`PROC_TITLE` AS `PROC_TITLE`,`p`.`PROC_BUDGET` AS `PROC_BUDGET`,`p`.`PROC_WORD` AS `PROC_WORD`,`p`.`PROC_DATE` AS `PROC_DATE`,`p`.`PROC_DATE_DEAD` AS `PROC_DATE_DEAD`,`o`.`O_NAME` AS `O_NAME`,`m`.`M_NAME` AS `M_NAME`,`s`.`STAT_ID` AS `STAT_ID`,`s`.`STAT_NAME` AS `STAT_NAME` from (((((`procurement` `p` join `project_reference` `pr` on(`p`.`PROJ_ID` = `pr`.`PROJ_ID`)) join `categories` `c` on(`p`.`C_ID` = `c`.`C_ID`)) join `office` `o` on(`p`.`O_ID` = `o`.`O_ID`)) join `method` `m` on(`p`.`M_ID` = `m`.`M_ID`)) join `stat` `s` on(`p`.`STAT_ID` = `s`.`STAT_ID`)) order by `p`.`PROC_ID`) ;

-- --------------------------------------------------------

--
-- Structure for view `vservices`
--
DROP TABLE IF EXISTS `vservices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vservices`  AS  (select `s`.`S_ID` AS `S_ID`,`s`.`S_NAME` AS `S_NAME`,`o`.`O_NAME` AS `O_NAME` from (`service` `s` join `office` `o` on(`s`.`O_ID` = `o`.`O_ID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_ID`),
  ADD KEY `O_ID` (`O_ID`);

--
-- Indexes for table `festivities`
--
ALTER TABLE `festivities`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`LN_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`L_ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`M_ID`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`O_ID`);

--
-- Indexes for table `ordinance`
--
ALTER TABLE `ordinance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`PL_ID`),
  ADD KEY `PLOC_ID` (`PLOC_ID`);

--
-- Indexes for table `place_location`
--
ALTER TABLE `place_location`
  ADD PRIMARY KEY (`PLOC_ID`);

--
-- Indexes for table `procurement`
--
ALTER TABLE `procurement`
  ADD PRIMARY KEY (`PROC_ID`),
  ADD KEY `O_ID` (`O_ID`),
  ADD KEY `M_ID` (`M_ID`),
  ADD KEY `STAT_ID` (`STAT_ID`),
  ADD KEY `PROJ_ID` (`PROJ_ID`),
  ADD KEY `C_ID` (`C_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PROD_ID`);

--
-- Indexes for table `project_reference`
--
ALTER TABLE `project_reference`
  ADD PRIMARY KEY (`PROJ_ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `SR_ID` (`R_ID`),
  ADD KEY `SS_ID` (`SS_ID`),
  ADD KEY `E_ID` (`E_ID`),
  ADD KEY `O_ID` (`O_ID`);

--
-- Indexes for table `service_step`
--
ALTER TABLE `service_step`
  ADD KEY `E_ID` (`E_NAME`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`SRC_ID`);

--
-- Indexes for table `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`STAT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `C_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `C_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `E_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `festivities`
--
ALTER TABLE `festivities`
  MODIFY `F_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `LN_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `L_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `P_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `method`
--
ALTER TABLE `method`
  MODIFY `M_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `O_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ordinance`
--
ALTER TABLE `ordinance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `PL_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `place_location`
--
ALTER TABLE `place_location`
  MODIFY `PLOC_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
  MODIFY `PROC_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PROD_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_reference`
--
ALTER TABLE `project_reference`
  MODIFY `PROJ_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `SRC_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stat`
--
ALTER TABLE `stat`
  MODIFY `STAT_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`O_ID`) REFERENCES `office` (`O_ID`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`PLOC_ID`) REFERENCES `place_location` (`PLOC_ID`);

--
-- Constraints for table `procurement`
--
ALTER TABLE `procurement`
  ADD CONSTRAINT `procurement_ibfk_10` FOREIGN KEY (`C_ID`) REFERENCES `categories` (`C_ID`),
  ADD CONSTRAINT `procurement_ibfk_5` FOREIGN KEY (`O_ID`) REFERENCES `office` (`O_ID`),
  ADD CONSTRAINT `procurement_ibfk_6` FOREIGN KEY (`M_ID`) REFERENCES `method` (`M_ID`),
  ADD CONSTRAINT `procurement_ibfk_7` FOREIGN KEY (`STAT_ID`) REFERENCES `stat` (`STAT_ID`),
  ADD CONSTRAINT `procurement_ibfk_9` FOREIGN KEY (`PROJ_ID`) REFERENCES `project_reference` (`PROJ_ID`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`E_ID`) REFERENCES `employee` (`E_ID`),
  ADD CONSTRAINT `service_ibfk_3` FOREIGN KEY (`O_ID`) REFERENCES `office` (`O_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
