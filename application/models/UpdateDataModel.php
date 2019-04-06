<?php
class UpdateDataModel extends CI_Model {
  public function update_data_kelas_pengganti($id){
    $data = array(
        'status' => 'canceled'
    );

    $this->db->where('id', $id);
    $this->db->update('transaksi_kelas', $data);
  }

  public function update_data_praktikum($id){
    $data = array(
        'status' => 'canceled'
    );

    $this->db->where('id', $id);
    $this->db->update('transaksi_praktikum', $data);
  }

}
