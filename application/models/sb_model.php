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

    public function cek_stok_sebelumnya($bulan,$tahun)
    {
        $q = "select sum(jml_stock) as total from stok_beras where (bulan between ".$bulan." - 1 and ".$bulan.") and tahun = ".$tahun."";
        return $this->db->query($q)->row();
    }

    public function count_stok_beras()
    {
        return $this->db->count_all("stok_beras");
    }

    public function hitungstok($bulan,$tahun)
    {
        $q= "
        SELECT sum(jml_stock) as total_stok FROM `stok_beras` WHERE bulan = ".$bulan." and tahun = ".$tahun."
        ";

        return $this->db->query($q)->row();
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

    public function update_stok($bulan,$tahun)
    {
        $q = "update stok_beras set jml_stock = jml_stock-1, stock_terpakai =stock_terpakai+1 where bulan = ".$bulan." and tahun = ".$tahun."";
        $this->db->query($q);
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

    public function ubah_stok($bulan,$tahun)
    {
        $q= "update stok_beras set jml_stock =0 where bulan < ".$bulan." and tahun = ".$tahun."";
        $this->db->query($q);
    }

    public function getAllStok()
    {
        return $this->db->get('stok_beras')->result();
    }

    public function getAllStokFilter($bulan,$tahun)
    {
        $this->db->where('bulan',$bulan);
        $this->db->where('tahun',$tahun);

        return $this->db->get('stok_beras')->result();
    }
}