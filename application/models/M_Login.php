<?php 

class M_login extends CI_Model{	
	public $table = 'data_umkm';
	public $email = 'data_umkm.email';
	public $password = 'data_umkm.password';



	function cek_login($data){		
		//return $this->db->get_where($table,$where);
		$this->db->where($this->email, $data['email']);
		$this->db->where($this->password, $data['password']);
		$query=$this->db->get($this->table);

		 if ($query->num_rows() > 0) {
            return $query;
        }
	}	

	function cek_id($data){		
		//return $this->db->get_where($table,$where);
		$this->db->where($this->email, $data['email']);
		//$this->db->where($this->password, $data['password']);
		return $this->db->get($this->table)->row();
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