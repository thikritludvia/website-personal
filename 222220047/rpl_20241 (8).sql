-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2025 pada 16.58
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl_20241`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `billingpayment`
--

CREATE TABLE `billingpayment` (
  `NoPembayaran` varchar(15) NOT NULL,
  `NoBilling` varchar(50) NOT NULL,
  `TglPembayaran` datetime(6) NOT NULL,
  `TotalPembayaran` decimal(19,2) NOT NULL,
  `idKasir` varchar(50) NOT NULL,
  `Pembayar` varchar(50) DEFAULT NULL,
  `TotalTunai` decimal(18,2) DEFAULT NULL,
  `TotalNonTunai` decimal(18,2) DEFAULT NULL,
  `UntukPembayaran` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(500) DEFAULT NULL,
  `IdUserUpdate` varchar(50) DEFAULT NULL,
  `TglLastUpdate` datetime(6) DEFAULT NULL,
  `NoOrder` varchar(50) DEFAULT NULL,
  `NoKartuNonTunai` varchar(50) DEFAULT NULL,
  `PaymentMethode` varchar(50) DEFAULT NULL,
  `Tindakan` varchar(100) DEFAULT NULL,
  `BiayaTindakan` decimal(19,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `billingpayment`
--

INSERT INTO `billingpayment` (`NoPembayaran`, `NoBilling`, `TglPembayaran`, `TotalPembayaran`, `idKasir`, `Pembayar`, `TotalTunai`, `TotalNonTunai`, `UntukPembayaran`, `Keterangan`, `IdUserUpdate`, `TglLastUpdate`, `NoOrder`, `NoKartuNonTunai`, `PaymentMethode`, `Tindakan`, `BiayaTindakan`) VALUES
('NP001', '202406050001', '2025-01-26 10:00:00.000000', '100000.00', 'K001', 'aqil', '50000.00', '50000.00', 'Pembayaran Administrasi', 'Pembayaran pertama', 'admin', '2025-01-26 10:05:00.000000', 'ORD001', '123456789', 'Tunai', 'Tindakan pertama', '50000.00'),
('NP002', '202406050002', '2025-01-26 11:00:00.000000', '200000.00', 'K002', 'irfan', '100000.00', '100000.00', 'Cek Darah', 'Pembayaran kedua', 'admin', '2025-01-26 11:05:00.000000', 'ORD002', '987654321', 'Non-Tunai', 'Tindakan kedua', '100000.00'),
('NP003', '202406050003', '2025-01-26 12:00:00.000000', '300000.00', 'K003', 'syifa', '150000.00', '150000.00', 'cek Kolestrol', 'Pembayaran ketiga', 'admin', '2025-01-26 12:05:00.000000', 'ORD003', '112233445', 'Tunai', 'Tindakan ketiga', '150000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `billingpenjamindetail`
--

CREATE TABLE `billingpenjamindetail` (
  `IdBaris` int(11) NOT NULL,
  `NoReferensi` varchar(100) NOT NULL,
  `KodeItem` varchar(100) NOT NULL,
  `KodeBaris` int(15) NOT NULL,
  `Harga` int(15) NOT NULL,
  `Jumlah` int(15) NOT NULL,
  `TotalHarga` int(15) NOT NULL,
  `StatusEksekusi` varchar(100) NOT NULL,
  `LokasiEksekusi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `billingpenjamindetail`
--

INSERT INTO `billingpenjamindetail` (`IdBaris`, `NoReferensi`, `KodeItem`, `KodeBaris`, `Harga`, `Jumlah`, `TotalHarga`, `StatusEksekusi`, `LokasiEksekusi`) VALUES
(1, 'AK2024060001', 'ITM00001', 1, 8000, 1, 8000, '', ''),
(2, 'AK2024060002', 'ITM00002', 2, 12000, 1, 12000, '', ''),
(3, 'AK2024060003', 'ITM00003', 3, 75670, 1, 75670, '', ''),
(4, 'AK2024060004', 'ITM00004', 4, 88900, 1, 88900, '', ''),
(5, 'AK2024060005', 'ITM00005', 5, 79400, 1, 79400, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `billingpenjaminheader`
--

CREATE TABLE `billingpenjaminheader` (
  `NoBilling` varchar(20) NOT NULL,
  `PersonKeyPatient` int(11) NOT NULL,
  `TanggalMasuk` datetime NOT NULL,
  `TanggalKeluar` datetime NOT NULL,
  `TotalTagihan` int(11) NOT NULL,
  `CanceledReason` varchar(255) NOT NULL,
  `KelasHarga` varchar(10) NOT NULL,
  `DokterKey` varchar(10) NOT NULL,
  `namadokter` varchar(60) NOT NULL,
  `ClosedDate` datetime NOT NULL,
  `ClosedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `billingpenjaminheader`
--

INSERT INTO `billingpenjaminheader` (`NoBilling`, `PersonKeyPatient`, `TanggalMasuk`, `TanggalKeluar`, `TotalTagihan`, `CanceledReason`, `KelasHarga`, `DokterKey`, `namadokter`, `ClosedDate`, `ClosedBy`) VALUES
('202406050001', 1, '2024-06-03 02:00:00', '2024-06-12 20:00:00', 20000, '-', '3', '4', 'Naya', '2024-06-14 08:00:00', 'THIKRIT'),
('202406050002', 2, '2024-06-11 00:00:00', '2024-06-12 20:00:00', 79400, '-', '1', '1', 'Jco', '2024-06-12 23:00:00', 'LUDVIA'),
('202406050003', 3, '2024-06-08 10:00:00', '2024-06-10 08:00:00', 75670, '-', '2', '2', 'Diva', '2024-06-10 09:00:00', 'BATARA'),
('202406050004', 4, '2024-06-12 02:13:00', '2024-06-13 09:26:00', 88900, 'Kesalahan Input Data', '1', '1', 'Jco', '2024-06-13 09:30:00', 'JEVO'),
('202406050005', 5, '2024-12-20 00:00:00', '2024-12-20 15:00:00', 79400, '-', '3', '3', 'Lia', '2024-12-21 12:00:00', 'ALFIAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `billingpenjaminsubheader`
--

CREATE TABLE `billingpenjaminsubheader` (
  `NoReferensi` varchar(100) NOT NULL,
  `PartnerKeyReferal` int(11) NOT NULL,
  `NoBilling` varchar(100) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `PersonKeyDokter` int(11) NOT NULL,
  `EmrTypekey` int(11) NOT NULL,
  `ExecutedDate` datetime NOT NULL,
  `ExecutedBy` varchar(100) NOT NULL,
  `OrderBy` varchar(100) NOT NULL,
  `ExecutedStatus` varchar(100) NOT NULL,
  `IdLokasiProses` int(11) NOT NULL,
  `TglProses` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `billingpenjaminsubheader`
--

INSERT INTO `billingpenjaminsubheader` (`NoReferensi`, `PartnerKeyReferal`, `NoBilling`, `Tanggal`, `PersonKeyDokter`, `EmrTypekey`, `ExecutedDate`, `ExecutedBy`, `OrderBy`, `ExecutedStatus`, `IdLokasiProses`, `TglProses`) VALUES
('AK2024060001', 0, '202406050001', '2024-06-03 02:00:00', 4, 0, '2024-06-03 13:10:00', '-', '-', '-', 102, '2024-06-03 02:10:00'),
('AK2024060002', 0, '202406050001', '2024-06-11 00:00:00', 1, 0, '2024-06-11 06:00:00', '-', '-', '-', 102, '2024-06-11 02:10:00'),
('AK2024060003', 0, '202406050003', '2024-06-08 10:00:00', 2, 0, '2024-06-08 20:00:00', '-', '-', '-', 101, '2024-06-08 10:05:00'),
('AK2024060004', 0, '202406050004', '2024-06-12 02:13:00', 1, 0, '2024-06-12 11:35:00', '-', '-', '-', 101, '2024-06-12 02:15:00'),
('AK2024060005', 0, '202406050005', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '', '', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `itemmaster`
--

CREATE TABLE `itemmaster` (
  `KodeItem` varchar(100) NOT NULL,
  `PatnerKey` varchar(10) NOT NULL,
  `NamaItem` varchar(100) NOT NULL,
  `ItemTypeKey` varchar(100) NOT NULL,
  `HargaHNA` int(10) NOT NULL,
  `AttributeName` varchar(100) NOT NULL,
  `SatuanStok` varchar(100) NOT NULL,
  `ProductClassKey` int(10) NOT NULL,
  `ItemGroupKey` int(10) NOT NULL,
  `ItemKey` int(10) NOT NULL,
  `IsActive` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `itemmaster`
--

INSERT INTO `itemmaster` (`KodeItem`, `PatnerKey`, `NamaItem`, `ItemTypeKey`, `HargaHNA`, `AttributeName`, `SatuanStok`, `ProductClassKey`, `ItemGroupKey`, `ItemKey`, `IsActive`) VALUES
('ITM00001', '1', 'Paramex', '1', 8000, 'Obat Pereda Nyeri', '1', 0, 0, 0, 'Active'),
('ITM00002', '1', 'Panadol', '1', 12000, 'Obat Pereda Nyeri', '1', 0, 0, 0, 'Active'),
('ITM00003', '1', 'Ibuprofen', '1', 75670, 'Obat Anti Inflamasi', '1', 0, 0, 0, 'Active'),
('ITM00004', '1', 'Aspirin', '1', 88900, 'Obat Pereda Nyeri', '1', 0, 0, 0, 'Active'),
('ITM00005', '1', 'Paracetamol', '1', 79400, 'Obat Pereda Nyeri', '1', 0, 0, 0, 'Active'),
('ITM00006', '', 'Biaya Pendaftaran', '', 50000, 'Biaya Pendaftaran', '', 0, 0, 0, ''),
('ITM00007', '', 'Konsultasi Dokter D', '', 150000, 'Konsultasi Dokter D', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `itemqtytransaksiheader`
--

CREATE TABLE `itemqtytransaksiheader` (
  `NoTransaksi` varchar(50) NOT NULL,
  `TglTransaksi` datetime(6) NOT NULL,
  `TipeTransaksi` varchar(50) NOT NULL,
  `FromLocationId` int(11) NOT NULL,
  `EnteredDate` datetime(6) DEFAULT NULL,
  `PersonKey` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `person`
--

CREATE TABLE `person` (
  `PersonKey` int(11) NOT NULL,
  `Nama` varchar(60) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `PlaceofBirth` varchar(50) NOT NULL,
  `HomeAddress` varchar(200) NOT NULL,
  `HomePhone` varchar(50) NOT NULL,
  `WorkAddress` varchar(200) NOT NULL,
  `WorkPhone` varchar(50) NOT NULL,
  `EmailAddress` varchar(70) NOT NULL,
  `MobilePhone` varchar(25) NOT NULL,
  `Number` varchar(20) NOT NULL,
  `Occupation` varchar(40) NOT NULL,
  `Photo` longblob NOT NULL,
  `StatusPersonKey` tinyint(3) NOT NULL,
  `MaritalStatusKey` tinyint(3) NOT NULL,
  `ReligionKey` varchar(20) NOT NULL,
  `PersonTypeKey` tinyint(3) NOT NULL,
  `IdPropinsi` int(11) NOT NULL,
  `IdKabupaten` int(11) NOT NULL,
  `IdKecamatan` int(11) NOT NULL,
  `IdKelurahan` int(11) NOT NULL,
  `Pekerjaan` int(11) NOT NULL,
  `Pendidikan` int(11) NOT NULL,
  `GolDar` varchar(11) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `TglEfektif` date NOT NULL,
  `EnteredBy` varchar(50) NOT NULL,
  `EnteredDate` datetime(6) NOT NULL,
  `UpdateBy` varchar(50) NOT NULL,
  `UpdateDate` datetime(6) NOT NULL,
  `NoID` varchar(50) NOT NULL,
  `Kodepos` varchar(10) NOT NULL,
  `IdNegara` int(11) NOT NULL,
  `NoBPJS` varchar(50) NOT NULL,
  `NoRekamMedis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `person`
--

INSERT INTO `person` (`PersonKey`, `Nama`, `Gender`, `DateOfBirth`, `PlaceofBirth`, `HomeAddress`, `HomePhone`, `WorkAddress`, `WorkPhone`, `EmailAddress`, `MobilePhone`, `Number`, `Occupation`, `Photo`, `StatusPersonKey`, `MaritalStatusKey`, `ReligionKey`, `PersonTypeKey`, `IdPropinsi`, `IdKabupaten`, `IdKecamatan`, `IdKelurahan`, `Pekerjaan`, `Pendidikan`, `GolDar`, `NIK`, `TglEfektif`, `EnteredBy`, `EnteredDate`, `UpdateBy`, `UpdateDate`, `NoID`, `Kodepos`, `IdNegara`, `NoBPJS`, `NoRekamMedis`) VALUES
(1, 'Aqil', 'l', '2003-03-26', 'Kota Padang', 'Jl. Cendrawasih', '123456', 'Jl.Sultan', '081234567890', 'aqil26@gmail.com', '089765434567', '', '', '', 0, 0, 'Islam', 0, 0, 0, 0, 0, 0, 0, 'A', '', '0000-00-00', '', '0000-00-00 00:00:00.000000', '', '0000-00-00 00:00:00.000000', '', '', 0, '0000012678935', 'RM-0001'),
(2, 'Irfan', 'l', '2000-03-12', 'Kota Palembang', 'Jl. Mawar', '098765478903', 'Jl. Cendrawasih', '081235678903', 'irfan27@gmail.com', '089745678390', '', '', '', 0, 0, 'Islam', 0, 0, 0, 0, 0, 0, 0, 'AB', '', '0000-00-00', '', '0000-00-00 00:00:00.000000', '', '0000-00-00 00:00:00.000000', '', '', 0, '0000012678936', 'RM-0002'),
(3, 'Syifa', 'p', '2003-03-26', 'Kota Semarang', 'Jl. Melati', '024789087', 'Jl. Cendrawasih', '08972839339', 'syifa@gmail.com', '081238903480', '', '', '', 0, 0, 'Islam', 0, 0, 0, 0, 0, 0, 0, 'A', '', '0000-00-00', '', '0000-00-00 00:00:00.000000', '', '0000-00-00 00:00:00.000000', '', '', 0, '0000012678934', 'RM-0003'),
(4, 'vio', 'p', '2008-03-12', 'Kota Semarang', 'Jl. mawar', '081234567890', '', '', '', '', '', '', '', 0, 0, 'Islam', 0, 0, 0, 0, 0, 0, 0, 'A', '', '0000-00-00', '', '0000-00-00 00:00:00.000000', '', '0000-00-00 00:00:00.000000', '', '', 0, '', 'RM-0004'),
(5, 'Yana', 'p', '2000-04-26', 'Kota Semarang', 'Jl. Anggrek', '081234567980', '', '', '', '', '', '', '', 0, 0, 'Islam', 0, 0, 0, 0, 0, 0, 0, 'A', '', '0000-00-00', '', '0000-00-00 00:00:00.000000', '', '0000-00-00 00:00:00.000000', '', '', 0, '', 'RM-0005');

--
-- Trigger `person`
--
DELIMITER $$
CREATE TRIGGER `before_insert_person` BEFORE INSERT ON `person` FOR EACH ROW BEGIN
    -- Menghasilkan No Rekam Medis berdasarkan PersonKey
    SET NEW.NoRekamMedis = CONCAT('RM-', LPAD((SELECT COUNT(*)+1 FROM person), 4, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personsinpartners`
--

CREATE TABLE `personsinpartners` (
  `PersonKey` int(11) NOT NULL,
  `MedicalRecordNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `personsinpartners`
--

INSERT INTO `personsinpartners` (`PersonKey`, `MedicalRecordNumber`) VALUES
(1, 'RM-0001'),
(2, 'RM-0002'),
(3, 'RM-0003'),
(4, 'RM-0004'),
(5, 'RM-0005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `procedureorder`
--

CREATE TABLE `procedureorder` (
  `NoProcedure` varchar(50) NOT NULL,
  `NoEpisode` varchar(20) DEFAULT NULL,
  `Tanggal` datetime(6) DEFAULT NULL,
  `PersonKeyPasien` int(11) DEFAULT NULL,
  `PersonKeyDokter` int(11) DEFAULT NULL,
  `DiagnosisAwal` varchar(500) DEFAULT NULL,
  `Alergi` varchar(500) DEFAULT NULL,
  `ICD10` varchar(50) DEFAULT NULL,
  `IsBatal` tinyint(1) DEFAULT NULL,
  `PartnerKeyPenjamin` int(11) DEFAULT NULL,
  `TotalHarga` decimal(18,2) DEFAULT NULL,
  `KodeICD9CM` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `EnteredDate` datetime(6) DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateDate` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `procedureorder`
--

INSERT INTO `procedureorder` (`NoProcedure`, `NoEpisode`, `Tanggal`, `PersonKeyPasien`, `PersonKeyDokter`, `DiagnosisAwal`, `Alergi`, `ICD10`, `IsBatal`, `PartnerKeyPenjamin`, `TotalHarga`, `KodeICD9CM`, `EnteredBy`, `EnteredDate`, `UpdateBy`, `UpdateDate`) VALUES
('PR1100001', '202406050001', '2024-01-11 11:24:50.000000', 1, 2, NULL, NULL, NULL, NULL, 44, '50000.00', NULL, 'LUDVIA', '2024-01-11 00:00:00.000000', NULL, NULL),
('PR1100002', '202406050002', '2024-11-11 11:26:27.000000', 3, 4, NULL, NULL, NULL, NULL, NULL, '150000.00', NULL, 'LUDVIA', '2024-01-11 11:26:39.000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `procedureorderdetail`
--

CREATE TABLE `procedureorderdetail` (
  `NoProcedure` varchar(50) NOT NULL,
  `KodeItem` varchar(100) CHARACTER SET utf8 NOT NULL,
  `KodeBaris` tinyint(3) NOT NULL,
  `Jumlah` decimal(18,2) NOT NULL,
  `Harga` decimal(18,2) NOT NULL,
  `EnteredDate` decimal(10,0) NOT NULL,
  `Discount` decimal(18,2) NOT NULL,
  `SubTotal` decimal(38,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `procedureorderdetail`
--

INSERT INTO `procedureorderdetail` (`NoProcedure`, `KodeItem`, `KodeBaris`, `Jumlah`, `Harga`, `EnteredDate`, `Discount`, `SubTotal`) VALUES
('PR1100001', 'ITM00006', 1, '1.00', '50000.00', '0', '0.00', '50000.0000'),
('PR1100002', 'ITM00007', 2, '1.00', '150000.00', '0', '0.00', '150000.0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reseporder`
--

CREATE TABLE `reseporder` (
  `NoResep` varchar(20) NOT NULL,
  `PartnerKeyFarmasi` int(11) DEFAULT NULL,
  `TipeOrder` varchar(100) DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `PersonKeyPasien` int(11) DEFAULT NULL,
  `PersonKeyDokter` varchar(10) DEFAULT NULL,
  `PatnerKeyPenjamin` int(11) NOT NULL,
  `NoEpisode` varchar(20) DEFAULT NULL,
  `TotalHarga` int(20) DEFAULT NULL,
  `PaymentMethode` varchar(11) DEFAULT NULL,
  `NoResepCopy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reseporder`
--

INSERT INTO `reseporder` (`NoResep`, `PartnerKeyFarmasi`, `TipeOrder`, `Tanggal`, `PersonKeyPasien`, `PersonKeyDokter`, `PatnerKeyPenjamin`, `NoEpisode`, `TotalHarga`, `PaymentMethode`, `NoResepCopy`) VALUES
('RSP0002018120100001', 0, '', '2018-12-01 08:38:18', 1, '2', 0, '202406050001', 10000, 'CASH', 0),
('RSP0002024111900001', 0, '', '2024-11-19 14:18:22', 2, '3', 0, '202406050002', 20000, 'ASURANSI WW', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reseporderdetail`
--

CREATE TABLE `reseporderdetail` (
  `NoResep` varchar(20) NOT NULL,
  `KodeItem` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `KodeBaris` int(11) NOT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Harga` int(15) DEFAULT NULL,
  `HargaDijamin` int(15) DEFAULT NULL,
  `SubTotalDijamin` int(15) DEFAULT NULL,
  `EnteredDate` datetime DEFAULT NULL,
  `Comments` text DEFAULT NULL,
  `SubTotal` int(15) DEFAULT NULL,
  `QtyParsial` int(11) DEFAULT NULL,
  `QtySisa` int(11) DEFAULT NULL,
  `SatuanJual` varchar(50) DEFAULT NULL,
  `JumlahJual` int(11) DEFAULT NULL,
  `Iter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reseporderdetail`
--

INSERT INTO `reseporderdetail` (`NoResep`, `KodeItem`, `KodeBaris`, `Jumlah`, `Harga`, `HargaDijamin`, `SubTotalDijamin`, `EnteredDate`, `Comments`, `SubTotal`, `QtyParsial`, `QtySisa`, `SatuanJual`, `JumlahJual`, `Iter`) VALUES
('RSP0002018120100001', 'ITM00001', 1, 1, 8000, 0, 0, '2018-12-01 08:38:18', 'Sakit kepala ringan/migrain/nyeri otot ringan. Obat: Paramex, diminum 1 tablet setelah makan, maksimal 3 kali sehari.\r\n', 8000, 0, 0, '0', 0, 0),
('RSP0002024111900001', 'ITM00002', 2, 1, 12000, 0, 0, '2024-11-19 14:18:22', 'Sakit kepala, demam, atau nyeri ringan. Obat: Panadol, diminum 1 tablet setiap 4-6 jam sekali, maksimal 4 tablet per hari.', 12000, 0, 0, '0', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockopname`
--

CREATE TABLE `stockopname` (
  `NoTransaksi` int(11) NOT NULL,
  `PatnerKey` varchar(10) NOT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `IdLokasi` varchar(100) DEFAULT NULL,
  `ItemGroupKey` int(11) DEFAULT NULL,
  `Keterangan` text DEFAULT NULL,
  `EnteredDate` date DEFAULT NULL,
  `EnteredBy` varchar(100) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stockopname`
--

INSERT INTO `stockopname` (`NoTransaksi`, `PatnerKey`, `Tanggal`, `IdLokasi`, `ItemGroupKey`, `Keterangan`, `EnteredDate`, `EnteredBy`, `Status`) VALUES
(2024120301, '1', '2024-12-21 10:59:36', NULL, NULL, 'SO 21/12/2024', NULL, 'LUDVIA', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockopnamedetail`
--

CREATE TABLE `stockopnamedetail` (
  `NoLine` int(11) NOT NULL,
  `PartnerKey` int(11) DEFAULT NULL,
  `NoTransaksi` int(11) DEFAULT NULL,
  `KodeItem` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `BatchNumber` varchar(50) DEFAULT NULL,
  `ExpiredDate` date DEFAULT NULL,
  `RealStock` int(11) DEFAULT NULL,
  `EnteredBy` varchar(20) NOT NULL,
  `EnteredDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(20) NOT NULL,
  `UpdateDate` datetime(6) DEFAULT NULL,
  `IdKlasifikasi` int(11) DEFAULT NULL,
  `ReffNoTransaksi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stockopnamedetail`
--

INSERT INTO `stockopnamedetail` (`NoLine`, `PartnerKey`, `NoTransaksi`, `KodeItem`, `BatchNumber`, `ExpiredDate`, `RealStock`, `EnteredBy`, `EnteredDate`, `UpdateBy`, `UpdateDate`, `IdKlasifikasi`, `ReffNoTransaksi`) VALUES
(1001, 1, 2024120301, 'ITM00001', 'Blank', NULL, 0, '', '2024-12-21 00:00:00', '', NULL, NULL, NULL),
(1002, 1, 2024120301, 'ITM00002', 'HCG17', '2029-01-01', 8, '', '2024-12-21 10:59:36', '', NULL, NULL, NULL),
(1003, 1, 2024120301, 'ITM00003', '171193', '2026-01-01', 2000, '', '2024-12-21 10:59:36', '', NULL, NULL, NULL),
(1004, 1, 2024120301, 'ITM00004', 'CEODA31', '2027-12-01', 25, '', '2024-12-21 10:59:36', '', NULL, NULL, NULL),
(1005, 1, 2024120301, 'ITM00005', 'K4768978626', '2021-03-01', 1, '', '2024-12-21 10:59:36', '', NULL, NULL, NULL),
(1006, 1, 2024120301, 'ITM00006', 'K499041880', '2028-01-01', 2, '', '2024-12-21 10:59:36', '', NULL, NULL, NULL),
(1007, 1, 2024120301, 'ITM00007', 'FOB18030004', '2024-12-21', 10, '', '2029-01-01 00:00:00', '', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `billingpayment`
--
ALTER TABLE `billingpayment`
  ADD PRIMARY KEY (`NoPembayaran`);

--
-- Indeks untuk tabel `billingpenjamindetail`
--
ALTER TABLE `billingpenjamindetail`
  ADD PRIMARY KEY (`IdBaris`),
  ADD KEY `NoRefrensi` (`NoReferensi`),
  ADD KEY `KodeItem` (`KodeItem`);

--
-- Indeks untuk tabel `billingpenjaminheader`
--
ALTER TABLE `billingpenjaminheader`
  ADD PRIMARY KEY (`NoBilling`);

--
-- Indeks untuk tabel `billingpenjaminsubheader`
--
ALTER TABLE `billingpenjaminsubheader`
  ADD PRIMARY KEY (`NoReferensi`,`PartnerKeyReferal`);

--
-- Indeks untuk tabel `itemmaster`
--
ALTER TABLE `itemmaster`
  ADD PRIMARY KEY (`KodeItem`),
  ADD KEY `ItemTypeKey` (`ItemTypeKey`),
  ADD KEY `ItemKey` (`ItemKey`),
  ADD KEY `PatnerKey` (`PatnerKey`);

--
-- Indeks untuk tabel `itemqtytransaksiheader`
--
ALTER TABLE `itemqtytransaksiheader`
  ADD PRIMARY KEY (`NoTransaksi`);

--
-- Indeks untuk tabel `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`PersonKey`),
  ADD KEY `PersonTypeKey` (`PersonTypeKey`),
  ADD KEY `GolDar` (`GolDar`);

--
-- Indeks untuk tabel `personsinpartners`
--
ALTER TABLE `personsinpartners`
  ADD PRIMARY KEY (`PersonKey`);

--
-- Indeks untuk tabel `procedureorder`
--
ALTER TABLE `procedureorder`
  ADD PRIMARY KEY (`NoProcedure`),
  ADD KEY `NoEpisode` (`NoEpisode`);

--
-- Indeks untuk tabel `procedureorderdetail`
--
ALTER TABLE `procedureorderdetail`
  ADD KEY `NoProcedure` (`NoProcedure`),
  ADD KEY `KodeItem` (`KodeItem`);

--
-- Indeks untuk tabel `reseporder`
--
ALTER TABLE `reseporder`
  ADD PRIMARY KEY (`NoResep`),
  ADD KEY `NoEpisode` (`NoEpisode`);

--
-- Indeks untuk tabel `reseporderdetail`
--
ALTER TABLE `reseporderdetail`
  ADD KEY `fk_kodeitem` (`KodeItem`),
  ADD KEY `fk_noresep` (`NoResep`);

--
-- Indeks untuk tabel `stockopname`
--
ALTER TABLE `stockopname`
  ADD PRIMARY KEY (`NoTransaksi`);

--
-- Indeks untuk tabel `stockopnamedetail`
--
ALTER TABLE `stockopnamedetail`
  ADD PRIMARY KEY (`NoLine`),
  ADD KEY `NoTransaksi` (`NoTransaksi`),
  ADD KEY `KodeItem` (`KodeItem`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `billingpenjamindetail`
--
ALTER TABLE `billingpenjamindetail`
  MODIFY `IdBaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `person`
--
ALTER TABLE `person`
  MODIFY `PersonKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `procedureorder`
--
ALTER TABLE `procedureorder`
  ADD CONSTRAINT `procedureorder_ibfk_1` FOREIGN KEY (`NoEpisode`) REFERENCES `billingpenjaminheader` (`NoBilling`);

--
-- Ketidakleluasaan untuk tabel `reseporder`
--
ALTER TABLE `reseporder`
  ADD CONSTRAINT `reseporder_ibfk_1` FOREIGN KEY (`NoEpisode`) REFERENCES `billingpenjaminheader` (`NoBilling`);

--
-- Ketidakleluasaan untuk tabel `stockopnamedetail`
--
ALTER TABLE `stockopnamedetail`
  ADD CONSTRAINT `stockopnamedetail_ibfk_1` FOREIGN KEY (`KodeItem`) REFERENCES `itemmaster` (`KodeItem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
