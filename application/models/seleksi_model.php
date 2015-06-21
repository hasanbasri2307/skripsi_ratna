<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Seleksi_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_seleksi($limit,$offset)
    {
        $this->db->select('count(id_warga) as total_warga,bulan,tahun,id_hasil,(select count(id_warga) from hasil_seleksi where status_pembagian =0) as belum_diambil,(select count(id_warga) from hasil_seleksi where status_pembagian =1) as sudah_diambil,(select count(id_warga) from hasil_seleksi where status_pembagian =2) as dibatalkan');
        $this->db->from('hasil_seleksi');
        $this->db->group_by('bulan');
        $this->db->group_by('tahun');
        $this->db->order_by('bulan');
        $this->db->order_by('tahun');
        $this->db->limit($limit,$offset);

        $q  = $this->db->get()->result();

        if(!empty($q))
            return $q;
        return false;
    }

    public function cekseleksi($bulan,$tahun)
    {
        $this->db->where('bulan',$bulan);
        $this->db->where('tahun',$tahun);
        return $this->db->count_all_results('hasil_seleksi');
    }

    public function getDetailSeleksi($bulan,$tahun,$limit,$offset)
    {
        $this->db->select('*');
        $this->db->from('hasil_seleksi');
        $this->db->join('data_warga_miskin','data_warga_miskin.id_warga = hasil_seleksi.id_warga');
        $this->db->where('bulan',$bulan);
        $this->db->where('tahun',$tahun);
        $this->db->limit($limit,$offset);

        $q  = $this->db->get()->result();

        if(!empty($q))
            return $q;
        return false;
    }

    public function get_seleksi_all()
    {
        $this->db->select('*');
        $this->db->from('hasil_seleksi');
        $q  = $this->db->get()->result();

        if(!empty($q))
            return $q;
        return false;
    }

    public function count_seleksi()
    {
        return $this->db->count_all("hasil_seleksi");
    }

    public function count_seleksi_detail($bulan,$tahun)
    {
        $this->db->where('bulan',$bulan);
        $this->db->where('tahun',$tahun);
        return $this->db->count_all_results("hasil_seleksi");
    }

    public function insert_seleksi($data)
    {
        $q= $this->db->insert('hasil_seleksi',$data);
        if($q)
            return true;
        return false;
    }

     public function insert_batch($data)
    {
         $this->db->insert_batch('hasil_seleksi', $data); 
    }

    public function getseleksiById($id)
    {
        $this->db->select('*');
        $this->db->from('hasil_seleksi');
        $this->db->where('id_seleksi',$id);
        $q = $this->db->get()->row();

        if($q)
            return $q;
        return false;
    }

    public function update_seleksi($id,$data)
    {
        $this->db->where('id_hasil', $id);
        $q = $this->db->update('hasil_seleksi', $data); 
        if($q)
            return true;
        return false;
    }

    public function delete_seleksi($id)
    {
         $this->db->delete('hasil_seleksi', array('id_seleksi' => $id)); 
    }

    public function get_seleksi_all2()
    {
        $this->db->select('count(id_warga) as total_warga,bulan,tahun,id_hasil,(select count(id_warga) from hasil_seleksi where status_pembagian =0) as belum_diambil,(select count(id_warga) from hasil_seleksi where status_pembagian =1) as sudah_diambil,(select count(id_warga) from hasil_seleksi where status_pembagian =2) as dibatalkan');
        $this->db->from('hasil_seleksi');
        $this->db->group_by('bulan');
        $this->db->group_by('tahun');
        $this->db->order_by('bulan');
        $this->db->order_by('tahun');

        $q  = $this->db->get()->result();

        if(!empty($q))
            return $q;
        return false;
    }


    public function getDetailSeleksiPeriode($bulan,$tahun)
    {
        $this->db->select('*');
        $this->db->from('hasil_seleksi');
        $this->db->join('data_warga_miskin','data_warga_miskin.id_warga = hasil_seleksi.id_warga');
        $this->db->where('bulan',$bulan);
        $this->db->where('tahun',$tahun);

        $q  = $this->db->get()->result();

        if(!empty($q))
            return $q;
        return false;
    }


}