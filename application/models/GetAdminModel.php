<?php
class GetAdminModel extends CI_Model {
  public function get_penjadwalan_kelas($status){
    $query = $this->db->query("select fpinjam('$status') as $status");
    $data = $query->row_array();

    //$query->next_result();
    //$query->free_result();

    return $data;
  }

  public function get_penjadwalan(){
    $query = $this->db->query('select ftotpinjam() as total');
    $data = $query->row_array();

    // $query->next_result();
    // $query->free_result();

    return $data;
  }

  public function req_kelas(){
    $query = $this->db->query('call request_kelas()');
    $data = $query->result();

    $query->next_result();
    $query->free_result();

    return $data;
  }

  public function req_praktikum(){
    $query = $this->db->query('call request_prakt()');
    $data = $query->result();

    $query->next_result();
    $query->free_result();

    return $data;
  }

  public function respon_transaksi_kelas($id, $respon){
    $data = array(
        'status' => $respon
    );

    $this->db->where('id', $id);
    $this->db->update('transaksi', $data);
  }
}
