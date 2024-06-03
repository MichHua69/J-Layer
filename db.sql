CREATE TABLE dinas_peternakan (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255),
    no_telepon INTEGER,
    email VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE peternak (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    NIK INTEGER,
    nama VARCHAR(255),
    no_telepon INTEGER,
    email VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE kepala_kelompok_ternak (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    NIK INTEGER,
    nama VARCHAR(255),
    no_telepon INTEGER,
    email VARCHAR(255),
    wilayah ENUM('wilayah1', 'wilayah2', 'wilayah3'), -- adjust ENUM values as needed
    no_surat VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE berita (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    tanggal DATETIME,
    judul VARCHAR(255),
    thumbnail BLOB,
    deskripsi TEXT,
    id_dinas_peternakan INTEGER,
    FOREIGN KEY (id_dinas_peternakan) REFERENCES dinas_peternakan(id)
);

CREATE TABLE status_validasi (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    status VARCHAR(255)
);

CREATE TABLE status_konfirmasi (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    status VARCHAR(255)
);

CREATE TABLE jumlah_populasi_ayam (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    jumlah VARCHAR(255)
);

CREATE TABLE tempat_pengambilan (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255)
);

CREATE TABLE validasi (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    tanggal_pengambilan DATETIME,
    jumlah_pakan INTEGER,
    id_dinas_peternakan INTEGER,
    id_tempat_pengambilan INTEGER,
    FOREIGN KEY (id_dinas_peternakan) REFERENCES dinas_peternakan(id),
    FOREIGN KEY (id_tempat_pengambilan) REFERENCES tempat_pengambilan(id)
);

CREATE TABLE konfirmasi (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    tanggal_pengambilan DATETIME,
    foto_bukti BLOB,
    id_kepala_kelompok_ternak INTEGER,
    FOREIGN KEY (id_kepala_kelompok_ternak) REFERENCES kepala_kelompok_ternak(id)
);

CREATE TABLE pengajuan (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    alamat VARCHAR(255),
    foto_peternakan BLOB,
    foto_surat_usaha BLOB,
    jumlah_pakan INTEGER,
    id_jumlah_populasi_ayam INTEGER,
    id_peternak INTEGER,
    id_status_validasi INTEGER,
    id_status_konfirmasi INTEGER,
    id_validasi INTEGER,
    id_konfirmasi INTEGER,
    FOREIGN KEY (id_jumlah_populasi_ayam) REFERENCES jumlah_populasi_ayam(id),
    FOREIGN KEY (id_peternak) REFERENCES peternak(id),
    FOREIGN KEY (id_status_validasi) REFERENCES status_validasi(id),
    FOREIGN KEY (id_status_konfirmasi) REFERENCES status_konfirmasi(id),
    FOREIGN KEY (id_validasi) REFERENCES validasi(id),
    FOREIGN KEY (id_konfirmasi) REFERENCES konfirmasi(id)
);