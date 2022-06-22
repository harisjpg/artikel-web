-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 10:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artikel-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_admin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Haris Subhan Maulana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(3) NOT NULL,
  `gambar_artikel` varchar(100) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `isi_artikel` text NOT NULL,
  `author` varchar(25) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `gambar_artikel`, `judul_artikel`, `kategori`, `isi_artikel`, `author`, `tanggal`) VALUES
(1, 'art-1655884864.jpg', 'NFT MERAJALELA', 'NFT', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, aliquam expedita accusamus commodi similique esse quis consequuntur, earum ut fugiat adipisci? Harum quasi blanditiis ipsa porro, molestiae quisquam omnis aliquam quod ipsam eum dolorem soluta voluptate pariatur. Vel labore autem eveniet velit deleniti repudiandae, laborum tempora! Architecto voluptates, iste, sunt at voluptatum aut eum earum eaque nulla expedita odit ducimus veritatis velit dolorum consequuntur laboriosam modi autem vero adipisci est tempore obcaecati ex possimus. Ratione, cum consequuntur perferendis assumenda odio corporis placeat quasi aliquid at modi corrupti adipisci exercitationem voluptates blanditiis ut rerum accusamus tempora magni. Nam, dolore! Amet doloribus, dignissimos voluptatibus sequi delectus commodi porro perferendis laborum nostrum ex veniam reiciendis minima sapiente sit non magni aliquid ad quos. Laborum odio cumque optio beatae reprehenderit aliquid tempore deleniti, itaque aperiam assumenda officia rem, eaque qui tempora sunt voluptatum ut veritatis ipsa id cupiditate at? Laudantium obcaecati dolore adipisci similique nam vero quod, aliquam molestiae magni est. Nihil qui iure excepturi. Consectetur numquam reprehenderit magni omnis recusandae quas a harum debitis. Debitis rem mollitia perferendis eius sint voluptatum, sit adipisci animi possimus quae iusto molestias est itaque totam ea nulla doloremque amet rerum architecto repellendus. Delectus sunt doloremque eos officia facere ab sequi sapiente quae fugit aliquid commodi, natus quo perspiciatis quisquam rerum. Labore non totam corporis, culpa dolorem temporibus. Dolorum enim quo dicta distinctio nemo sed numquam praesentium blanditiis eaque veniam ab, ea officiis illo reiciendis? Distinctio voluptas, culpa quasi fuga dignissimos repellat voluptates temporibus iste cupiditate hic sint unde cum, sed corporis explicabo quia excepturi reiciendis iure possimus recusandae dolorem? Porro totam vel obcaecati quae officiis inventore similique at, minima labore laudantium suscipit delectus animi, ab ea vero beatae illum! Possimus cum quia minus excepturi tenetur magnam! Error, rerum. Doloremque, quasi reiciendis! Beatae esse dignissimos adipisci molestias illum. Dignissimos quo et quas officiis vitae, placeat repudiandae saepe corporis qui eveniet voluptas commodi provident a illo facere quibusdam reiciendis optio consequatur eum aliquam accusamus hic! Rerum dolorem dicta velit repellat mollitia quisquam modi, corporis nulla? A quia molestiae corrupti, numquam ea voluptas sed facilis, molestias pariatur beatae odit dolor nostrum ex eligendi aperiam tenetur perspiciatis, corporis voluptatum consequatur eveniet laudantium ipsam enim asperiores perferendis. Cupiditate ut vitae quisquam, repudiandae ea fugiat adipisci dolorem sunt deleniti ipsum facere fugit beatae repellat, eligendi qui? Hic numquam dolores officiis aspernatur delectus quibusdam, voluptate maxime doloribus. Impedit doloribus iusto sunt nisi ab neque quas nostrum voluptatum! Nulla ullam eius, nesciunt facilis neque officia, dolorum molestias magnam, praesentium vel ipsam! Similique et reiciendis blanditiis ipsa necessitatibus quidem ipsum distinctio temporibus, corporis, odit soluta quae nihil. Harum, expedita veniam tempora impedit atque veritatis, repellendus nemo magni eos, earum nisi sequi! Accusantium saepe numquam enim provident sint nam voluptate tenetur ullam modi harum accusamus asperiores quam officiis, architecto voluptatibus necessitatibus magnam consequuntur autem praesentium esse mollitia eveniet? Voluptas eius quo, dolore dolorum, a facilis magni doloribus nostrum voluptatibus quia illum laborum rerum provident sapiente, commodi saepe quidem fuga corrupti. Doloremque beatae quod a reiciendis, ad aperiam!', 'Haris', '2022-06-22'),
(2, 'art-1655884870.png', 'BAHAYANYA ANAK TERLALU MINUM AIR TIDURAN', 'INTERNET', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, aliquam expedita accusamus commodi similique esse quis consequuntur, earum ut fugiat adipisci? Harum quasi blanditiis ipsa porro, molestiae quisquam omnis aliquam quod ipsam eum dolorem soluta voluptate pariatur. Vel labore autem eveniet velit deleniti repudiandae, laborum tempora! Architecto voluptates, iste, sunt at voluptatum aut eum earum eaque nulla expedita odit ducimus veritatis velit dolorum consequuntur laboriosam modi autem vero adipisci est tempore obcaecati ex possimus. Ratione, cum consequuntur perferendis assumenda odio corporis placeat quasi aliquid at modi corrupti adipisci exercitationem voluptates blanditiis ut rerum accusamus tempora magni. Nam, dolore! Amet doloribus, dignissimos voluptatibus sequi delectus commodi porro perferendis laborum nostrum ex veniam reiciendis minima sapiente sit non magni aliquid ad quos. Laborum odio cumque optio beatae reprehenderit aliquid tempore deleniti, itaque aperiam assumenda officia rem, eaque qui tempora sunt voluptatum ut veritatis ipsa id cupiditate at? Laudantium obcaecati dolore adipisci similique nam vero quod, aliquam molestiae magni est. Nihil qui iure excepturi. Consectetur numquam reprehenderit magni omnis recusandae quas a harum debitis. Debitis rem mollitia perferendis eius sint voluptatum, sit adipisci animi possimus quae iusto molestias est itaque totam ea nulla doloremque amet rerum architecto repellendus. Delectus sunt doloremque eos officia facere ab sequi sapiente quae fugit aliquid commodi, natus quo perspiciatis quisquam rerum. Labore non totam corporis, culpa dolorem temporibus. Dolorum enim quo dicta distinctio nemo sed numquam praesentium blanditiis eaque veniam ab, ea officiis illo reiciendis? Distinctio voluptas, culpa quasi fuga dignissimos repellat voluptates temporibus iste cupiditate hic sint unde cum, sed corporis explicabo quia excepturi reiciendis iure possimus recusandae dolorem? Porro totam vel obcaecati quae officiis inventore similique at, minima labore laudantium suscipit delectus animi, ab ea vero beatae illum! Possimus cum quia minus excepturi tenetur magnam! Error, rerum. Doloremque, quasi reiciendis! Beatae esse dignissimos adipisci molestias illum. Dignissimos quo et quas officiis vitae, placeat repudiandae saepe corporis qui eveniet voluptas commodi provident a illo facere quibusdam reiciendis optio consequatur eum aliquam accusamus hic! Rerum dolorem dicta velit repellat mollitia quisquam modi, corporis nulla? A quia molestiae corrupti, numquam ea voluptas sed facilis, molestias pariatur beatae odit dolor nostrum ex eligendi aperiam tenetur perspiciatis, corporis voluptatum consequatur eveniet laudantium ipsam enim asperiores perferendis. Cupiditate ut vitae quisquam, repudiandae ea fugiat adipisci dolorem sunt deleniti ipsum facere fugit beatae repellat, eligendi qui? Hic numquam dolores officiis aspernatur delectus quibusdam, voluptate maxime doloribus. Impedit doloribus iusto sunt nisi ab neque quas nostrum voluptatum! Nulla ullam eius, nesciunt facilis neque officia, dolorum molestias magnam, praesentium vel ipsam! Similique et reiciendis blanditiis ipsa necessitatibus quidem ipsum distinctio temporibus, corporis, odit soluta quae nihil. Harum, expedita veniam tempora impedit atque veritatis, repellendus nemo magni eos, earum nisi sequi! Accusantium saepe numquam enim provident sint nam voluptate tenetur ullam modi harum accusamus asperiores quam officiis, architecto voluptatibus necessitatibus magnam consequuntur autem praesentium esse mollitia eveniet? Voluptas eius quo, dolore dolorum, a facilis magni doloribus nostrum voluptatibus quia illum laborum rerum provident sapiente, commodi saepe quidem fuga corrupti. Doloremque beatae quod a reiciendis, ad aperiam!', 'Haris', '2022-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(3) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `gambar`) VALUES
(1, 'NFT', 'ka-1655886391.png'),
(2, 'INTERNET', 'ka-1655886398.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
