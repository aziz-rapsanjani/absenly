SET FOREIGN_KEY_CHECKS = 0;

-- 1. membuat tabel users
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('Admin Sekolah', 'Guru', 'Siswa') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. membuat tabel kelas
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_kelas` VARCHAR(20) NOT NULL,
  `jurusan` ENUM('IPA', 'IPS', 'Bahasa') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. membuat tabel mapel
DROP TABLE IF EXISTS `mapel`;
CREATE TABLE `mapel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_mapel` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. membuat tabel guru
DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT DEFAULT NULL,
  `nip` VARCHAR(20) DEFAULT NULL,
  `nama_guru` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_nip` (`nip`),
  CONSTRAINT `fk_guru_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. membuat tabel siswa
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT DEFAULT NULL,
  `kelas_id` INT DEFAULT NULL,
  `nisn` VARCHAR(10) DEFAULT NULL,
  `nama_siswa` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_nisn` (`nisn`),
  CONSTRAINT `fk_siswa_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_siswa_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 6. membuat tabel sesi_absensi
DROP TABLE IF EXISTS `sesi_absensi`;
CREATE TABLE `sesi_absensi` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `guru_id` INT DEFAULT NULL,
  `kelas_id` INT DEFAULT NULL,
  `mapel_id` INT DEFAULT NULL,
  `tanggal_sesi` DATE NOT NULL,
  `jam_mulai` TIME NOT NULL,
  `qr_token_aktif` VARCHAR(255) DEFAULT NULL,
  `is_hotspot_validation` TINYINT(1) DEFAULT '0',
  `ip_guru_aktif` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_sesi_guru` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_sesi_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_sesi_mapel` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 7. membuat tabel presensi
DROP TABLE IF EXISTS `presensi`;
CREATE TABLE `presensi` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sesi_id` INT DEFAULT NULL,
  `siswa_id` INT DEFAULT NULL,
  `kelas_id` INT DEFAULT NULL,
  `waktu_scan` DATETIME DEFAULT NULL,
  `ip_siswa` VARCHAR(45) DEFAULT NULL,
  `status` ENUM('Hadir', 'Terlambat', 'Sakit', 'Izin', 'Alpa') NOT NULL,
  `keterangan` TEXT DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_presensi_sesi` FOREIGN KEY (`sesi_id`) REFERENCES `sesi_absensi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_presensi_siswa` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_presensi_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;