DROP TABLE IF EXISTS `penduduk`;
CREATE TABLE `penduduk` (
  `no_kk` varchar(16) DEFAULT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(40) DEFAULT NULL,
  `kelamin` enum('L','P') DEFAULT 'L',
  `shk` varchar(15) DEFAULT NULL,
  `tp_lahir` varchar(20) DEFAULT NULL,
  `tg_lahir` date DEFAULT NULL,
  `st_kawin` varchar(16) DEFAULT 'Belum Kawin',
  `agama` varchar(8) DEFAULT NULL,
  `kewarganegaraan` varchar(20) DEFAULT 'Indonesia',
  `gol_darah` enum('A','B','AB','O','Tidak Tahu') DEFAULT 'Tidak Tahu',
  `pendidikan` varchar(30) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `no_akte_lahir` varchar(21) DEFAULT NULL,
  `rw` int(2) DEFAULT NULL,
  `rt` int(2) DEFAULT NULL,
  `bpkNik` varchar(16) DEFAULT NULL,
  `bpkNama` varchar(40) DEFAULT NULL,
  `bpkTpLahir` varchar(40) DEFAULT NULL,
  `bpkTgLahir` date,
  `bpkAlamat` tinytext,
  `ibuNik` varchar(16) DEFAULT NULL,
  `ibuNama` varchar(40) DEFAULT NULL,
  `ibuTpLahir` varchar(40) DEFAULT NULL,
  `ibuTgLahir` date,
  `ibuAlamat` tinytext,
  `mutasi` enum('datang','pindah','merantau','meninggal','external') DEFAULT 'datang',
  `tglmutasi` date DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS pildata;
CREATE TABLE pildata(
  idx int(3) not null auto_increment primary key,
  optGroup varchar(20) not null,
  optData varchar(40)
);

insert into pildata (optGroup,optData) values
('agama','ISLAM'),
('agama','KRISTEN'),
('agama','KATHOLIK'),
('agama','HINDU'),
('agama','BUDHA'),
('agama','KONGHUCU'),
('agama','KEPERCAYAAN'),
('hubKeluarga','KEPALA KELUARGA'),
('hubKeluarga','SUAMI'),
('hubKeluarga','ISTRI'),
('hubKeluarga','ANAK'),
('hubKeluarga','MENANTU'),
('hubKeluarga','CUCU'),
('hubKeluarga','ORANG TUA'),
('hubKeluarga','MERTUA'),
('hubKeluarga','FAMILI LAIN'),
('hubKeluarga','PEMBANTU'),
('hubKeluarga','LAINNYA'),
('pendidikan','TIDAK/BELUM SEKOLAH'),
('pendidikan','BELUM TAMAT SD/SEDERAJAT'),
('pendidikan','TAMAT SD/SEDERAJAT'),
('pendidikan','SLTP/SEDERAJAT'),
('pendidikan','SLTA/SEDERAJAT'),
('pendidikan','DIPLOMA I/II'),
('pendidikan','AKADEMI/DIPLOMA III/SARJANA MUDA'),
('pendidikan','DIPLOMA IV/STRATA I'),
('pendidikan','STRATA II'),
('pendidikan','STRATA III'),
('pekerjaan','BELUM / TIDAK BEKERJA'),
('pekerjaan','MENGURUS RUMAH TANGGA'),
('pekerjaan','PELAJAR/MAHASISWA'),
('pekerjaan','PENSIUNAN'),
('pekerjaan','PEGAWAI NEGERI SIPIL'),
('pekerjaan','TENTARA NASIONAL INDONESIA'),
('pekerjaan','KEPOLISIAN RI'),
('pekerjaan','PERDAGANGAN'),
('pekerjaan','PETANI/PEKEBUN'),
('pekerjaan','PETERNAK'),
('pekerjaan','NELAYAN/PERIKANAN'),
('pekerjaan','INDUSTRI'),
('pekerjaan','KONSTRUKSI'),
('pekerjaan','TRANSPORTASI'),
('pekerjaan','KARYAWAN SWASTA'),
('pekerjaan','KARYAWAN BUMN'),
('pekerjaan','KARYAWAN BUMD'),
('pekerjaan','KARYAWAN HONORER'),
('pekerjaan','UBURUH HARIAN LEPAS'),
('pekerjaan','BURUH TANI/PERKEBUNAN'),
('pekerjaan','BURUH NELAYAN/PERIKANAN'),
('pekerjaan','BURUH PETERNAKAN'),
('pekerjaan','PEMBANTU RUMAH TANGGA'),
('pekerjaan','TUKANG CUKUR'),
('pekerjaan','TUKANG LISTRIK'),
('pekerjaan','TUKAN BATU'),
('pekerjaan','TUKANG KAYU'),
('pekerjaan','TUKANG SOL SEPATU'),
('pekerjaan','TUKANG LAS / PANDE BESI'),
('pekerjaan','TUKANG JAHIT'),
('pekerjaan','TUKANG GIGI'),
('pekerjaan','PENATA RIAS'),
('pekerjaan','PENATA BUSANA'),
('pekerjaan','PENATA RAMBUT'),
('pekerjaan','MEKANIK'),
('pekerjaan','SENIMAN'),
('pekerjaan','TABIB'),
('pekerjaan','PENGRAJIN'),
('pekerjaan','PERANCANG BUSANA'),
('pekerjaan','PENTERJEMAH'),
('pekerjaan','IMAM MASJID'),
('pekerjaan','PENDETA'),
('pekerjaan','PASTOR'),
('pekerjaan','WARTAWAN'),
('pekerjaan','USTADZ/MUBALIGH'),
('pekerjaan','JURU MASAK'),
('pekerjaan','PROMOTOR ACARA'),
('pekerjaan','ANGGOTA DPR'),
('pekerjaan','ANGGOTA DPD'),
('pekerjaan','ANGGOTA BPK'),
('pekerjaan','PRESIDEN'),
('pekerjaan','WAKIL PRESIDEN'),
('pekerjaan','ANGOTA MK'),
('pekerjaan','ANGGOTA KABINET'),
('pekerjaan','DUTA BESAR'),
('pekerjaan','GUBERNUR'),
('pekerjaan','WAKIL GUBERNUR'),
('pekerjaan','BUPATI'),
('pekerjaan','WAKIL BUPATI'),
('pekerjaan','WALIKOTA'),
('pekerjaan','WAKIL WALIKOTA'),
('pekerjaan','ANGGOTA DPRD PROPINSI'),
('pekerjaan','ANGGOTA DORD KABUPATEN'),
('pekerjaan','DOSEN'),
('pekerjaan','GURU'),
('pekerjaan','PILOT'),
('pekerjaan','PENGACARA'),
('pekerjaan','NOTARIS'),
('pekerjaan','ARSITEK'),
('pekerjaan','AKUNTAN'),
('pekerjaan','KONSULTAN'),
('pekerjaan','DOKTER'),
('pekerjaan','BIDAN'),
('pekerjaan','PERAWAT'),
('pekerjaan','APOTEKER'),
('pekerjaan','PSIKIATER/PSIKOLOG'),
('pekerjaan','PENYIAR TELEVISI'),
('pekerjaan','PENYIAR RADIO'),
('pekerjaan','PELAUT'),
('pekerjaan','PENELITI'),
('pekerjaan','SOPIR'),
('pekerjaan','PIALANG'),
('pekerjaan','PARANORMAL'),
('pekerjaan','PEDAGANG'),
('pekerjaan','PERANGKAT DESA'),
('pekerjaan','KEPALA DESA'),
('pekerjaan','BIARAWATI'),
('pekerjaan','WIRASWASTA'),
('st_kawin','Belum Kawin'),
('st_kawin','Cerai Hidup'),
('st_kawin','Cerai Mati'),
('st_kawin','Kawin')
('golDarah','A+'),
('golDarah','A-'),
('golDarah','AB+'),
('golDarah','AB-'),
('golDarah','B+'),
('golDarah','B-'),
('golDarah','O+'),
('golDarah','0-'),
('golDarah','Tidak Tahu');

DROP TABLE IF EXISTS `kredensiWarga`;
CREATE TABLE `kredensiWarga`(
  nik varchar(16) NOT NULL,
  namalogin varchar(32) DEFAULT NULL,
  katasandi varchar(32) DEFAULT NULL,
  statusLog enum('aktif','inaktif') default 'inaktif',
  primary key (nik)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `pengantar`;
CREATE TABLE `pengantar`(
  kd_permohonan varchar(8) NOT NULL,  -- yymmxxxx --
  tanggal timestamp DEFAULT CURRENT_TIMESTAMP(),
  nik varchar(16) NOT NULL,
  keperluan tinytext,
  status ('antri','cetak','batal') default 'antri',
  PRIMARY KEY (kd_permohonan)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `ambulans`;
CREATE TABLE ambulans(
  id_permintaan varchar(8) NOT NULL PRIMARY KEY, -- yymmxxxx --
  nik_peminta varchar(8) NOT NULL,
  jemput_rumah varchar(30) NOT NULL,
  jemput_rt_rw varchar(10) NOT NULL,
  tujuan varchar(40) NOT NULL,
  tanggal_masuk timestamp default current_timestamp(),
  tanggal_respon timestamp default '0000-00-00 00:00:00',
  responStatus enum('antri','proses','selesai') default 'antri'
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `agendaPengantar`;
CREATE TABLE `agendaPengantar`(
  kd_permohonan varchar(8) NOT NULL,
  nmAgenda varchar(20) NOT NULL UNIQUE,
  tgAgenda date,
  jbtPemaraf varchar(20) DEFAULT 'Kepala Desa',
  nmaPemaraf varchar(20) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS SOSAlert;
CREATE TABLE SOSAlert(
  id int(6) not null auto_increment primary key,
  jamTgl timestamp default current_timestamp(),
  nik varchar(16) not null,
  bujur varchar(20) default '0.0000',
  lintang varchar(20) default '0.0000',
  status enum('antri','tanggap','selesai') default 'antri'
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- VIEWS --
CREATE OR REPLACE VIEW vwLogin AS
SELECT penduduk.nik, penduduk.nama_lengkap, penduduk.kelamin, penduduk.tg_lahir,
penduduk.rt, penduduk.rw, kredensiWarga.namalogin, kredensiWarga.katasandi,
kredensiWarga.statusLog
FROM penduduk, kredensiWarga
WHERE kredensiWarga.nik = penduduk.nik;
