delimiter //
create or replace procedure dashboard()
	begin
		select * from penjadwalan
		join laboratory on penjadwalan.ruang = laboratory.id
		join kelas on penjadwalan.kelas = kelas.id;
	end //
delimiter ;

delimiter //
create or replace procedure statuspinjam(uname varchar(32))
	begin
	select * kode_dosen as kdosen
	from transaksi join dosen on transaksi.kode_dosen = dosen.id
  join laboratory on transaksi.ruangan = laboratory.id
	where status = 'Pending' OR status = 'Approved' AND keterangan = 'Kelas' AND peminjam = uname;;
	end //
delimiter ;

delimiter //
create or replace procedure history_kelas(id int)
	begin
	select *, dosen.kode as kdosen
	from transaksi join dosen on transaksi.kode_dosen = dosen.id
  join laboratory on transaksi.ruangan = laboratory.id
	where (status = 'attended' OR status = 'canceled') AND keterangan = 'kelas' AND peminjam = id;
	end //
delimiter ;

delimiter //
create or replace procedure statuspinjam_praktikum(uname varchar(32))
  begin
  select *, kode_dosen as kdosen
  from transaksi join dosen on transaksi.kode_dosen = dosen.id
  join laboratory on transaksi.ruangan = laboratory.id
  where status = 'Pending' OR status = 'Approved' AND keterangan = 'Praktikum' AND peminjam = uname;
  end //
delimiter ;

delimiter //
create or replace procedure history_praktikum(id int)
  begin
  select *, dosen.kode as kdosen
  from transaksi join dosen on transaksi.kode_dosen = dosen.id
  join laboratory on transaksi.ruangan = laboratory.id
  where status = 'Canceled' OR status = 'Attended' AND keterangan = 'Praktikum' AND peminjam = id;
  end //
delimiter ;

delimiter //
create or replace procedure list_lab()
  begin
    select * from laboratory
  end //
delimiter ;

delimiter //
create or replace procedure request_kelas()
  begin
    select *, kode_dosen as kdosen
    from transaksi join dosen on transaksi.kode_dosen = dosen.id
    join laboratory on transaksi.ruangan = laboratory.id
    where status = 'pending' and keterangan = 'kelas';
  end //
delimiter ;

delimiter //
create or replace procedure request_prakt()
  begin
    select *, kode_dosen as kdosen
    from transaksi join dosen on transaksi.kode_dosen = dosen.id
    join laboratory on transaksi.ruangan = laboratory.id
    where status = 'pending' and keterangan = 'praktikum';
  end //
delimiter ;



delimiter //
create or replace function fpinjam(ket varchar(30)) returns int(3)
	deterministic
	begin
	declare total_peminjaman int;

	select count(id) into total_peminjaman
	from transaksi
	where keterangan = ket;

	return(total_peminjaman);

	end //
delimiter ;

select fpinjam('kelas');

select fpinjam('praktikum');

delimiter //
create or replace function ftotpinjam() returns int(3)
	deterministic
	begin
	declare total_peminjaman int;

	select count(id) into total_peminjaman
	from transaksi;

	return(total_peminjaman);

	end //
delimiter ;

select ftotpinjam();

-- TRIGGER
create or replace table dosenlab_history(
	lab_name varchar(50),
	tgl_ubah date,
	old_pemb int,
	new_pemb int,
	information varchar(20)
);

delimiter //
create or replace trigger afterupdate_lab
 	after update on laboratory
 	for each row
begin
 	insert into dosenlab_history
 	set
 	lab_name = OLD.kode,
 	tgl_ubah = now(),
 	old_pemb = OLD.id,
 	new_pemb = NEW.id,
 	information = 'CHANGE';
 end //
delimiter ;
