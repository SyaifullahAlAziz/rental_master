<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ulasan_Model extends CI_Model
{

    private $_table = "tb_ulasan";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_ulasan"; // primary key

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function join_all()
    {
        return $this->db->query("SELECT * FROM tb_ulasan LEFT JOIN tb_barang ON tb_ulasan.id_barang=tb_barang.id_barang LEFT JOIN tb_user ON tb_ulasan.id_user=tb_user.id_user")->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, [$this->primaryKey => $id])->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array($this->primaryKey => $id));
    }
}
