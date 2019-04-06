<?php
class GetDataModel extends CI_Model {
  public function get_data_kelas(){
    $this->db->select('lab_name, nama');
    $query = $this->db->get('laboratory');
    $data = $query->result();
    return $data;
  }

  public function get_data_dosen(){
    $this->db->select('kode, nama_depan, nama_belakang');
    $query = $this->db->get('users_teacher');
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

}
