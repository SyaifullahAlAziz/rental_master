<?php defined('BASEPATH') or exit('No direct script access allowed');

class Store_Model extends CI_Model
{

    private $_table = "tb_store";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_store"; // primary key

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function join_all()
    {
        return $this->db->query("SELECT * FROM tb_store LEFT JOIN tb_user ON tb_store.id_user=tb_user.id_user")->result();
    }
    public function save($data)
    {
        return $this->db->insert($this->_table, $data);
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, [$this->primaryKey => $id])->row_array();
    }

    public function update($id, $data)
    {
        return $this->db->update($this->_table, $data,  array($this->primaryKey => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array($this->primaryKey => $id));
    }
}
