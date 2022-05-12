<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login_Model extends CI_Model
{

    public function cek_login($user, $pass)
    {
        $username = $user;
        $password = $pass;

        $result = $this->db
            ->where('username_admin', $username)
            ->where('password_admin', $password)
            ->limit(1)
            ->get('tb_admin');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }
}
