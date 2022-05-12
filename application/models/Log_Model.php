<?php defined('BASEPATH') or exit('No direct script access allowed');

class Log_Model extends CI_Model
{

    private $_table = "tb_log_activity";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_log_activity"; // primary key

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function join_all()
    {
        return $this->db->query("SELECT * FROM tb_log_activity LEFT JOIN tb_user ON tb_log_activity.id_user=tb_user.id_user")->result();
    }

    // public function save($post)
    // {
    //     $data = [];
    //     $data['img_store'] = $post["img_store"];
    //     return $this->db->insert($this->_table, $data);
    // }
    // public function getById($id)
    // {
    // 	return $this->db->get_where($this->_table, [$this->primaryKey => $id])->result();
    // }

    // public function delete($id)
    // {
    // 	return $this->db->delete($this->_table, array($this->primaryKey => $id));
    // }
}
