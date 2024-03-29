<?php

class SpkModel extends CI_model{

    public function get_data($table){
        return $this->db->get($table);
    }

    public function insert_data($data,$table){
        $this->db->insert($table,$data);
    }

    public function update_data($table, $data, $where){
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function cek_login()
    {
        $username       = set_value('username');
        $password       = set_value('password');

        $result         = $this->db->where('username', $username)
                                   ->where('password', $password)
                                   ->where('status', "Aktif")
                                   ->limit(300)
                                   ->get('hak_akses');
        if($result->num_rows()>0){
            return $result->row();
        }else{
            return FALSE;
        }
    }
}

?>