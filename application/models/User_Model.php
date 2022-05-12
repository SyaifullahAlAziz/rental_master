<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{

    private $_table = "tb_user";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_user"; // primary key

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function save($post)
    {
        $data = [];
        $data['nama_user'] = $post["nama_user"];
        $data['alamat_user'] = $post["alamat_user"];
        $data['email_user'] = $post["email_user"];
        $data['telp_user'] = $post["telp_user"];
        $data['username'] = $post["username"];
        $data['password'] = $post["password"];
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
