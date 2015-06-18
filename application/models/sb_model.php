<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sb_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_stok_beras($limit,$offset)
    {
        $this->db->select('*');
        $this->db->from('stok_beras');
        $this->db->limit($limit,$offset);

        $q  = $this->db->get()->result();

        if(!empty($q))
            return $q;
        return false;
    }

    public function count_stok_beras()
    {
        return $this->db->count_all("stok_beras");
    }

    public function insert_stok_beras($data)
    {
        $q= $this->db->insert('stok_beras',$data);
        if($q)
            return true;
        return false;
    }

    public function getstok_berasById($id)
    {
        $this->db->select('*');
        $this->db->from('stok_beras');
        $this->db->where('id_stok_beras',$id);
        $q = $this->db->get()->row();

        if($q)
            return $q;
        return false;
    }

    public function update_stok_beras($id,$data)
    {
        $this->db->where('id_stok_beras', $id);
        $q = $this->db->update('stok_beras', $data); 
        if($q)
            return true;
        return false;
    }

    public function delete_stok_beras($id)
    {
         $this->db->delete('stok_beras', array('id_stok_beras' => $id)); 
    }

    public function cek_stok($bulan,$tahun)
    {
        $this->db->select('*');
        $this->db->from('stok_beras');
        $this->db->where('bulan',$bulan);
        $this->db->where('tahun',$tahun);

        $q = $this->db->count_all_results();

        if($q)
            return $q;
        return false;
    }
}