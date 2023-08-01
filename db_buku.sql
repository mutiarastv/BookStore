CREATE DATABASE IF NOT EXISTS db_buku;

create table IF NOT EXISTS tbl_penerbit(
    kd_penerbit int not null auto_increment,
    nama_penerbit varchar(255) not null,
    alamat_penerbit text,
    primary key (kd_penerbit)
);

create table IF NOT EXISTS tbl_buku(
    kd_buku int not null auto_increment,
    judul_buku varchar(255) not null,
    tahun_penerbit year,
    kd_penerbit int,
    primary key(kd_buku),
    foreign key (kd_penerbit) references tbl_penerbit(kd_penerbit)
);

insert into tbl_penerbit(nama_penerbit,alamat_penerbit) values ('Gramedia pustaka utama', 'Jl.Palmerah barat jakarta');
insert into tbl_penerbit(nama_penerbit,alamat_penerbit) values ('Mizan pustaka', 'Jl. Cinambo 136 (Cisaranten Wetan) Bandung');
insert into tbl_penerbit(nama_penerbit,alamat_penerbit) values ('Penerbit Erlangga', 'Jl. H Baping Raya Ciracas Jakarta');
insert into tbl_penerbit(nama_penerbit,alamat_penerbit) values ('Penerbit Republika', 'Jl. Kav Polri Jakarta');