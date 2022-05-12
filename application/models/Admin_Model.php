<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{

    private $_table = "tb_admin";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_admin"; // primary key

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function save($post)
    {
        $data = [];
        $data['nama_admin'] = $post["nama_admin"];
        $data['email_admin'] = $post["email_admin"];
        $data['username_admin'] = $post["username_admin"];
        $data['password_admin'] = $post["password_admin"];
        return $this->db->insert($this->_table, $data);
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, [$this->primaryKey => $id])->row_array();
    }

    public function update($post)
    {
        $data = [];
        $id = $post["id_admin"];
        $data['nama_admin'] = $post["nama_admin"];
        $data['username_admin'] = $post["username_admin"];
        $data['email_admin'] = $post["email_admin"];
        $data['password_admin'] = $post["password_admin"];
        return $this->db->update($this->_table, $data,  array($this->primaryKey => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array($this->primaryKey => $id));
    }
}
