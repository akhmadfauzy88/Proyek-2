<?php
class GetDataModel extends CI_Model {
  public function get_penjadwalan(){
    //$this->db->order_by('ruang ASC, jam_masuk ASC');
    $query = $this->db->join('laboratory', 'penjadwalan.ruang=laboratory.id');
    $query = $this->db->join('kelas', 'penjadwalan.kelas=kelas.id');
    $query = $this->db->get('penjadwalan');
    $data = $query->result();
    return $data;
  }

  // public function get_pinjam_praktikum(){
  //   $this->db->order_by('ruang ASC, jam_masuk ASC');
  //   $query = $this->db->get('transaksi_praktikum');
  //   $data = $query->result();
  //   return $data;
  // }

  public function get_data_kelas(){
    $this->db->select('id, kode, nama');
    $query = $this->db->get('laboratory');
    $data = $query->result();
    return $data;
  }

  public function get_data_dosen(){
    $this->db->select('id, kode, nama_depan, nama_belakang');
    $query = $this->db->get('dosen');
    $data = $query->result();
    return $data;
  }

  public function get_status_kelas($peminjam){
    $query = $this->db->get_where('transaksi_kelas',
                                    array(
                                      'peminjam' => $peminjam,
                                      'status ' => 'pending'
                                    ));
    $data = $query->result();
    return $data;
  }

  public function get_history_kelas($peminjam){
    $query = $this->db->get_where('transaksi_kelas',
                                    array(
                                      'peminjam' => $peminjam,
                                      'status !=' => 'pending'
                                    ));
    $data = $query->result();
    return $data;
  }

  public function get_status_praktikum($peminjam){
    $query = $this->db->get_where('transaksi_praktikum',
                                    array(
                                      'peminjam' => $peminjam,
                                      'status ' => 'pending'
                                    ));
    $data = $query->result();
    return $data;
  }

  public function get_history_praktikum($peminjam){
    $query = $this->db->get_where('transaksi_praktikum',
                                    array(
                                      'peminjam' => $peminjam,
                                      'status !=' => 'pending'
                                    ));
    $data = $query->result();
    return $data;
  }

}
