<?php
class Mupload extends CI_Model {

    public $table = 'foto_produk';
	public $id = 'id_foto';
    public $id_umkm = 'id_umkm';
	

    function __construct() {
        parent::__construct();
    }
    
    //fungsi untuk menampilkan semua data dari table database
	function get_allimage($id_umkm) {
        $this->db->where($this->id_umkm, $id_umkm);
        //$this->db->from($this->table);
		$query = $this->db->get($this->table);

        //cek apakah ada data
        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}
	
	// get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    //fungsi insert ke database
    function get_insert($data){
       $this->db->insert($this->table, $data);
       return TRUE;
    }
	
	// update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
	
	// delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

?>
