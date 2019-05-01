<?php
class GetAdminModel extends CI_Model {
  public function get_penjadwalan(){
    $query = $this->db->query('call list_transaksi()');
    $data = $query->row_array();

    $query->next_result();
    $query->free_result();

    return $data;
  }

  public function get_penjadwalan_kelas(){
    $query = $this->db->query('call list_transaksi_kelas()');
    $data = $query->row_array();

    $query->next_result();
    $query->free_result();

    return $data;
  }
}
