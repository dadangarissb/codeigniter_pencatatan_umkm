<?php 

class M_login_Admin extends CI_Model{	
	public $table = 'admin';
	public $username = 'admin.username';
	public $password = 'admin.password';


	function cek_login_admin($data){		
		//return $this->db->get_where($table,$where);
		$this->db->where($this->username, $data['username']);
		$this->db->where($this->password, $data['password']);
		$query=$this->db->get($this->table);

		 if ($query->num_rows() > 0) {
            return $query;
        }
	}	


}

// function get_allimage($id_umkm) {
//         $this->db->where($this->id_umkm, $id_umkm);
//         //$this->db->from($this->table);
// 		$query = $this->db->get($this->table);

//         //cek apakah ada data
//         if ($query->num_rows() > 0) {
//             return $query->result();
//         }
// 	}