<?php
class InputDataModel extends CI_Model {
  public function input_data_pesan($nama, $email, $subject, $pesan){
    $data = array(
        'nama' => $nama,
        'email' => $email,
        'subject' => $subject,
        'pesan' => $pesan
    );

    $this->db->insert('pesan', $data);
  }

  public function input_data_kelas_pengganti($nama, $kelas, $ruang, $jam_masuk, $pinjamruangan, $matakuliah, $kode_dosen, $tanggal){
    $data = array(
        'peminjam' => $nama,
        //'kelas' => $kelas,
        'ruangan' => $ruang,
        'jam_masuk' => $jam_masuk,
        'jumlah_jam' => $pinjamruangan,
        'matakuliah' => $matakuliah,
        'kode_dosen' => $kode_dosen,
        'tanggal' => $tanggal,
        'kebutuhan' => NULL,
        'bukti' => NULL,
        'keterangan' => 'kelas',
        'status' => 'pending'
    );

    $this->db->insert('transaksi', $data);

    $jm = $jam_masuk;

    if ($pinjamruangan > 1) {
      $dat = array(
        'tanggal' => $tanggal,
        'jam' => $jam_masuk,
        'ruang' => $ruang,
        'kelas' => $kelas,
        'status' => 'pending'
      );
      $this->db->insert('penjadwalan', $dat);
      for($i=1;$i<$pinjamruangan;$i++){
        $tambahjam = strtotime($jm) + 60*60;
        $jm = date('H:i:s', $tambahjam);
        $dat = array(
          'tanggal' => $tanggal,
          'jam' => $jm,
          'ruang' => $ruang,
          'kelas' => $kelas,
          'status' => 'pending'
        );
        $this->db->insert('penjadwalan', $dat);
      }
    }else{
      $dat = array(
        'tanggal' => $tanggal,
        'jam' => $jam_masuk,
        'ruang' => $ruang,
        'kelas' => $kelas,
        'status' => 'pending'
      );
      $this->db->insert('penjadwalan', $dat);
    }
  }

  public function input_data_praktikum($nama, $kelas, $ruang, $jam_masuk, $pinjamruangan, $kode_dosen, $matakuliah, $tanggal, $kebutuhan, $bukti){
    $data = array(
        'peminjam' => $nama,
        'ruangan' => $ruang,
        'jam_masuk' => $jam_masuk,
        'jumlah_jam' => $pinjamruangan,
        'kode_dosen' => $kode_dosen,
        'matakuliah' => $matakuliah,
        'tanggal' => $tanggal,
        'kebutuhan' => $kebutuhan,
        'bukti' => $bukti,
        'status' => 'pending',
        'keterangan' => 'praktikum',
    );

    $this->db->insert('transaksi', $data);

     // echo $kode_dosen;
     // die();

    $jm = $jam_masuk;

    if ($pinjamruangan > 1) {
      $dat = array(
        'tanggal' => $tanggal,
        'jam' => $jam_masuk,
        'ruang' => $ruang,
        'kelas' => $kelas,
        'status' => 'pending'
      );
      $this->db->insert('penjadwalan', $dat);
      for($i=1;$i<$pinjamruangan;$i++){
        $tambahjam = strtotime($jm) + 60*60;
        $jm = date('H:i:s', $tambahjam);
        $dat = array(
          'tanggal' => $tanggal,
          'jam' => $jm,
          'ruang' => $ruang,
          'kelas' => $kelas,
          'status' => 'pending'
        );
        $this->db->insert('penjadwalan', $dat);
      }
    }else{
      $dat = array(
        'tanggal' => $tanggal,
        'jam' => $jam_masuk,
        'ruang' => $ruang,
        'kelas' => $kelas,
        'status' => 'pending'
      );
      $this->db->insert('penjadwalan', $dat);
    }

  }

}
