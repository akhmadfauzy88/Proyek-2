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
	select *
	from transaksi
	where status = 'Pending' OR status = 'Approved' AND peminjam = uname;
	end //
delimiter ;

delimiter //
create or replace procedure historypinjam(uname varchar(32))
	begin
	select *
	from transaksi
	where status = 'Attended' OR status = 'Canceled' AND peminjam = uname;
	end //
delimiter ;
