SET FOREIGN_KEY_CHECKS = 0;

-- masukkan data kelas
INSERT INTO `kelas` (`id`, `nama_kelas`, `jurusan`) VALUES
(1, 'X-1', NULL),
(2, 'X-2', NULL),
(3, 'XI-IPA-1', 'IPA'),
(4, 'XI-IPA-2', 'IPA'),
(5, 'XI-IPS-1', 'IPS'),
(6, 'XI-IPS-2', 'IPS'),
(7, 'XII-IPA-1', 'IPA'),
(8, 'XII-IPA-2', 'IPA'),
(9, 'XII-IPS-1', 'IPS'),
(10, 'XII-IPS-2', 'IPS');

-- masukkan data mapel riil sma
INSERT INTO `mapel` (`id`, `nama_mapel`) VALUES
(1, 'Matematika Wajib'),
(2, 'Bahasa Indonesia'),
(3, 'Bahasa Inggris'),
(4, 'Fisika'),
(5, 'Kimia'),
(6, 'Biologi'),
(7, 'Ekonomi'),
(8, 'Geografi'),
(9, 'Sosiologi'),
(10, 'Sejarah Indonesia'),
(11, 'Pendidikan Agama & Budi Pekerti'),
(12, 'Pendidikan Jasmani, Olahraga & Kesehatan (PJOK)');

-- masukkan akun login untuk admin dan guru
INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin.sekolah', 'admin123', 'Admin Sekolah'),
(2, 'guru.budi', 'guru123', 'Guru'),
(3, 'guru.siti', 'guru123', 'Guru'),
(4, 'guru.ahmad', 'guru123', 'Guru'),
(5, 'guru.mega', 'guru123', 'Guru');

-- masukkan profil detail guru
INSERT INTO `guru` (`id`, `user_id`, `nip`, `nama_guru`) VALUES
(1, 2, '198001012005011001', 'Budi Santoso, M.Pd.'),
(2, 3, '198503152010022003', 'Siti Aminah, S.Pd.'),
(3, 4, '197808202003121002', 'Ahmad Hidayat, S.Si.'),
(4, 5, '199011222018032001', 'Mega Lestari, M.Si.');

-- masukkan semua akun login siswa (10 siswa per kelas)
INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
-- kelas x-1 (user id 6 - 15)
(6, 'siswa.x1.1', 'siswa123', 'Siswa'), (7, 'siswa.x1.2', 'siswa123', 'Siswa'), (8, 'siswa.x1.3', 'siswa123', 'Siswa'), (9, 'siswa.x1.4', 'siswa123', 'Siswa'), (10, 'siswa.x1.5', 'siswa123', 'Siswa'),
(11, 'siswa.x1.6', 'siswa123', 'Siswa'), (12, 'siswa.x1.7', 'siswa123', 'Siswa'), (13, 'siswa.x1.8', 'siswa123', 'Siswa'), (14, 'siswa.x1.9', 'siswa123', 'Siswa'), (15, 'siswa.x1.10', 'siswa123', 'Siswa'),
-- kelas x-2 (user id 16 - 25)
(16, 'siswa.x2.1', 'siswa123', 'Siswa'), (17, 'siswa.x2.2', 'siswa123', 'Siswa'), (18, 'siswa.x2.3', 'siswa123', 'Siswa'), (19, 'siswa.x2.4', 'siswa123', 'Siswa'), (20, 'siswa.x2.5', 'siswa123', 'Siswa'),
(21, 'siswa.x2.6', 'siswa123', 'Siswa'), (22, 'siswa.x2.7', 'siswa123', 'Siswa'), (23, 'siswa.x2.8', 'siswa123', 'Siswa'), (24, 'siswa.x2.9', 'siswa123', 'Siswa'), (25, 'siswa.x2.10', 'siswa123', 'Siswa'),
-- kelas xi-ipa-1 (user id 26 - 35)
(26, 'siswa.xi.ipa1.1', 'siswa123', 'Siswa'), (27, 'siswa.xi.ipa1.2', 'siswa123', 'Siswa'), (28, 'siswa.xi.ipa1.3', 'siswa123', 'Siswa'), (29, 'siswa.xi.ipa1.4', 'siswa123', 'Siswa'), (30, 'siswa.xi.ipa1.5', 'siswa123', 'Siswa'),
(31, 'siswa.xi.ipa1.6', 'siswa123', 'Siswa'), (32, 'siswa.xi.ipa1.7', 'siswa123', 'Siswa'), (33, 'siswa.xi.ipa1.8', 'siswa123', 'Siswa'), (34, 'siswa.xi.ipa1.9', 'siswa123', 'Siswa'), (35, 'siswa.xi.ipa1.10', 'siswa123', 'Siswa'),
-- kelas xi-ipa-2 (user id 36 - 45)
(36, 'siswa.xi.ipa2.1', 'siswa123', 'Siswa'), (37, 'siswa.xi.ipa2.2', 'siswa123', 'Siswa'), (38, 'siswa.xi.ipa2.3', 'siswa123', 'Siswa'), (39, 'siswa.xi.ipa2.4', 'siswa123', 'Siswa'), (40, 'siswa.xi.ipa2.5', 'siswa123', 'Siswa'),
(41, 'siswa.xi.ipa2.6', 'siswa123', 'Siswa'), (42, 'siswa.xi.ipa2.7', 'siswa123', 'Siswa'), (43, 'siswa.xi.ipa2.8', 'siswa123', 'Siswa'), (44, 'siswa.xi.ipa2.9', 'siswa123', 'Siswa'), (45, 'siswa.xi.ipa2.10', 'siswa123', 'Siswa'),
-- kelas xi-ips-1 (user id 46 - 55)
(46, 'siswa.xi.ips1.1', 'siswa123', 'Siswa'), (47, 'siswa.xi.ips1.2', 'siswa123', 'Siswa'), (48, 'siswa.xi.ips1.3', 'siswa123', 'Siswa'), (49, 'siswa.xi.ips1.4', 'siswa123', 'Siswa'), (50, 'siswa.xi.ips1.5', 'siswa123', 'Siswa'),
(51, 'siswa.xi.ips1.6', 'siswa123', 'Siswa'), (52, 'siswa.xi.ips1.7', 'siswa123', 'Siswa'), (53, 'siswa.xi.ips1.8', 'siswa123', 'Siswa'), (54, 'siswa.xi.ips1.9', 'siswa123', 'Siswa'), (55, 'siswa.xi.ips1.10', 'siswa123', 'Siswa'),
-- kelas xi-ips-2 (user id 56 - 65)
(56, 'siswa.xi.ips2.1', 'siswa123', 'Siswa'), (57, 'siswa.xi.ips2.2', 'siswa123', 'Siswa'), (58, 'siswa.xi.ips2.3', 'siswa123', 'Siswa'), (59, 'siswa.xi.ips2.4', 'siswa123', 'Siswa'), (60, 'siswa.xi.ips2.5', 'siswa123', 'Siswa'),
(61, 'siswa.xi.ips2.6', 'siswa123', 'Siswa'), (62, 'siswa.xi.ips2.7', 'siswa123', 'Siswa'), (63, 'siswa.xi.ips2.8', 'siswa123', 'Siswa'), (64, 'siswa.xi.ips2.9', 'siswa123', 'Siswa'), (65, 'siswa.xi.ips2.10', 'siswa123', 'Siswa'),
-- kelas xii-ipa-1 (user id 66 - 75)
(66, 'siswa.xii.ipa1.1', 'siswa123', 'Siswa'), (67, 'siswa.xii.ipa1.2', 'siswa123', 'Siswa'), (68, 'siswa.xii.ipa1.3', 'siswa123', 'Siswa'), (69, 'siswa.xii.ipa1.4', 'siswa123', 'Siswa'), (70, 'siswa.xii.ipa1.5', 'siswa123', 'Siswa'),
(71, 'siswa.xii.ipa1.6', 'siswa123', 'Siswa'), (72, 'siswa.xii.ipa1.7', 'siswa123', 'Siswa'), (73, 'siswa.xii.ipa1.8', 'siswa123', 'Siswa'), (74, 'siswa.xii.ipa1.9', 'siswa123', 'Siswa'), (75, 'siswa.xii.ipa1.10', 'siswa123', 'Siswa'),
-- kelas xii-ipa-2 (user id 76 - 85)
(76, 'siswa.xii.ipa2.1', 'siswa123', 'Siswa'), (77, 'siswa.xii.ipa2.2', 'siswa123', 'Siswa'), (78, 'siswa.xii.ipa2.3', 'siswa123', 'Siswa'), (79, 'siswa.xii.ipa2.4', 'siswa123', 'Siswa'), (80, 'siswa.xii.ipa2.5', 'siswa123', 'Siswa'),
(81, 'siswa.xii.ipa2.6', 'siswa123', 'Siswa'), (82, 'siswa.xii.ipa2.7', 'siswa123', 'Siswa'), (83, 'siswa.xii.ipa2.8', 'siswa123', 'Siswa'), (84, 'siswa.xii.ipa2.9', 'siswa123', 'Siswa'), (85, 'siswa.xii.ipa2.10', 'siswa123', 'Siswa'),
-- kelas xii-ips-1 (user id 86 - 95)
(86, 'siswa.xii.ips1.1', 'siswa123', 'Siswa'), (87, 'siswa.xii.ips1.2', 'siswa123', 'Siswa'), (88, 'siswa.xii.ips1.3', 'siswa123', 'Siswa'), (89, 'siswa.xii.ips1.4', 'siswa123', 'Siswa'), (90, 'siswa.xii.ips1.5', 'siswa123', 'Siswa'),
(91, 'siswa.xii.ips1.6', 'siswa123', 'Siswa'), (92, 'siswa.xii.ips1.7', 'siswa123', 'Siswa'), (93, 'siswa.xii.ips1.8', 'siswa123', 'Siswa'), (94, 'siswa.xii.ips1.9', 'siswa123', 'Siswa'), (95, 'siswa.xii.ips1.10', 'siswa123', 'Siswa'),
-- kelas xii-ips-2 (user id 96 - 105)
(96, 'siswa.xii.ips2.1', 'siswa123', 'Siswa'), (97, 'siswa.xii.ips2.2', 'siswa123', 'Siswa'), (98, 'siswa.xii.ips2.3', 'siswa123', 'Siswa'), (99, 'siswa.xii.ips2.4', 'siswa123', 'Siswa'), (100, 'siswa.xii.ips2.5', 'siswa123', 'Siswa'),
(101, 'siswa.xii.ips2.6', 'siswa123', 'Siswa'), (102, 'siswa.xii.ips2.7', 'siswa123', 'Siswa'), (103, 'siswa.xii.ips2.8', 'siswa123', 'Siswa'), (104, 'siswa.xii.ips2.9', 'siswa123', 'Siswa'), (105, 'siswa.xii.ips2.10', 'siswa123', 'Siswa');

-- masukkan data profil detail siswa
INSERT INTO `siswa` (`user_id`, `kelas_id`, `nisn`, `nama_siswa`) VALUES
-- profil siswa kelas X-1 (kelas_id = 1)
(6, 1, '0061010001', 'Aditya Pratama'), (7, 1, '0061010002', 'Bagus Saputra'), (8, 1, '0061010003', 'Citra Lestari'), (9, 1, '0061010004', 'Deni Hidayat'), (10, 1, '0061010005', 'Eka Wijaya'),
(11, 1, '0061010006', 'Fajar Kusuma'), (12, 1, '0061010007', 'Gita Wulandari'), (13, 1, '0061010008', 'Hendra Setiawan'), (14, 1, '0061010009', 'Indah Siregar'), (15, 1, '0061010010', 'Joko Susilo'),
-- profil siswa kelas X-2 (kelas_id = 2)
(16, 2, '0061020001', 'Kevin Ramadhan'), (17, 2, '0061020002', 'Lesti Andini'), (18, 2, '0061020003', 'Muhammad Aldi'), (19, 2, '0061020004', 'Nadia Putri'), (20, 2, '0061020005', 'Oki Sanjaya'),
(21, 2, '0061020006', 'Putri Ayu'), (22, 2, '0061020007', 'Rian Hidayat'), (23, 2, '0061020008', 'Siti Rahma'), (24, 2, '0061020009', 'Taufik Ismail'), (25, 2, '0061020010', 'Utami Lestari'),
-- profil siswa kelas XI-IPA-1 (kelas_id = 3)
(26, 3, '0062010001', 'Andi Wijaya'), (27, 3, '0062010002', 'Bella Safira'), (28, 3, '0062010003', 'Candra Kirana'), (29, 3, '0062010004', 'Dimas Anggara'), (30, 3, '0062010005', 'Ernawati'),
(31, 3, '0062010006', 'Farhan Malik'), (32, 3, '0062010007', 'Gani Prakoso'), (33, 3, '0062010008', 'Hany Handayani'), (34, 3, '0062010009', 'Irfan Hakim'), (35, 3, '0062010010', 'Julia Perez'),
-- profil siswa kelas XI-IPA-2 (kelas_id = 4)
(36, 4, '0062020001', 'Kurniawan'), (37, 4, '0062020002', 'Lia Tomat'), (38, 4, '0062020003', 'Maman Suherman'), (39, 4, '0062020004', 'Nina Karlina'), (40, 4, '0062020005', 'Oman Malik'),
(41, 4, '0062020006', 'Panji Petualang'), (42, 4, '0062020007', 'Qori Sandioriva'), (43, 4, '0062020008', 'Rendra Karno'), (44, 4, '0062020009', 'Siska Sukmawati'), (45, 4, '0062020010', 'Tono Sutopo'),
-- profil siswa kelas XI-IPS-1 (kelas_id = 5)
(46, 5, '0062030001', 'Umar bin Khattab'), (47, 5, '0062030002', 'Vina Panduwinata'), (48, 5, '0062030003', 'Wawan Gunawan'), (49, 5, '0062030004', 'Xena Warrior'), (50, 5, '0062030005', 'Yanto Basna'),
(51, 5, '0062030006', 'Zainal Abidin'), (52, 5, '0062030007', 'Anisa Rahma'), (53, 5, '0062030008', 'Bambang Pamungkas'), (54, 5, '0062030009', 'Chandra Liow'), (55, 5, '0062030010', 'Desta Mahendra'),
-- profil siswa kelas XI-IPS-2 (kelas_id = 6)
(56, 6, '0062040001', 'Eko Patrio'), (57, 6, '0062040002', 'Fitri Carlina'), (58, 6, '0062040003', 'Gading Marten'), (59, 6, '0062040004', 'Hesti Purwadinata'), (60, 6, '0062040005', 'Irfan Bachdim'),
(61, 6, '0062040006', 'Jessica Iskandar'), (62, 6, '0062040007', 'Kaka Slank'), (63, 6, '0062040008', 'Luna Maya'), (64, 6, '0062040009', 'Melly Goeslaw'), (65, 6, '0062040010', 'Nabila Syakieb'),
-- profil siswa kelas XII-IPA-1 (kelas_id = 7)
(66, 7, '0063010001', 'Olga Syahputra'), (67, 7, '0063010002', 'Pasha Ungu'), (68, 7, '0063010003', 'Raffi Ahmad'), (69, 7, '0063010004', 'Sule Prikitiw'), (70, 7, '0063010005', 'Tukul Arwana'),
(71, 7, '0063010006', 'Uus Rizky'), (72, 7, '0063010007', 'Vicky Prasetyo'), (73, 7, '0063010008', 'Wendi Cagur'), (74, 7, '0063010009', 'Zaskia Gotik'), (75, 7, '0063010010', 'Ariel Noah'),
-- profil siswa kelas XII-IPA-2 (kelas_id = 8)
(76, 8, '0063020001', 'Bunga Citra Lestari'), (77, 8, '0063020002', 'Chiko Jericho'), (78, 8, '0063020003', 'Desta Club80s'), (79, 8, '0063020004', 'Eross Candra'), (80, 8, '0063020005', 'Fatin Shidqia'),
(81, 8, '0063020006', 'Giring Ganesha'), (82, 8, '0063020007', 'Isyana Sarasvati'), (83, 8, '0063020008', 'Judika Sihotang'), (84, 8, '0063020009', 'Kunto Aji'), (85, 8, '0063020010', 'Maudy Ayunda'),
-- profil siswa kelas XII-IPS-1 (kelas_id = 9)
(86, 9, '0063030001', 'Najwa Shihab'), (87, 9, '0063030002', 'Onadio Leonardo'), (88, 9, '0063030003', 'Piyu Padi'), (89, 9, '0063030004', 'Raisa Andriana'), (90, 9, '0063030005', 'Soni Wakwaw'),
(91, 9, '0063030006', 'Tantri Kotak'), (92, 9, '0063030007', 'Uya Kuya'), (93, 9, '0063030008', 'Virzha Idol'), (94, 9, '0063030009', 'Wizzy Williana'), (95, 9, '0063030010', 'Yura Yunita'),
-- profil siswa kelas XII-IPS-2 (kelas_id = 10)
(96, 10, '0063040001', 'Ziva Magnolya'), (97, 10, '0063040002', 'Anang Hermansyah'), (98, 10, '0063040003', 'Baim Wong'), (99, 10, '0063040004', 'Chef Juna'), (100, 10, '0063040005', 'Deddy Corbuzier'),
(101, 10, '0063040006', 'Ernest Prakasa'), (102, 10, '0063040007', 'Fiersa Besari'), (103, 10, '0063040008', 'Glenn Fredly'), (104, 10, '0063040009', 'Husein Alatas'), (105, 10, '0063040010', 'Ismed Sofyan');

SET FOREIGN_KEY_CHECKS = 1;