<?php
class LoginModel extends CI_Model
{
    public function validasi($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function updateUser($username_lama, $data)
    {
        $this->db->where('username', $username_lama);
        $this->db->update('user', $data);
    }

    public function registerUser($data)
    {
        // Masukkan data ke dalam tabel 'user'
        $this->db->insert('user', $data);
        
        // Cek apakah baris yang dimasukkan lebih dari 0 (artinya berhasil)
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    

    public function deleteUser($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('user');
    }
}
