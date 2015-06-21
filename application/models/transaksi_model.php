<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_transaksi($limit,$offset,$user_id="")
    {
        $this->db->select('*');
        $this->db->from('data_warga_miskin');

        if($user_id != "")
        {
            $this->db->where('id_user',$user_id);
        }

        $this->db->limit($limit,$offset);

        $q  = $this->db->get()->result();

        if(!empty($q))
            return $q;
        return false;
    }

    public function count_transaksi($id_user="")
    {
        if($id_user != "")
        {
            $this->db->where('id_user',$id_user);
            return $this->db->count_all_results("data_warga_miskin");
        }
        else {
            return $this->db->count_all("data_warga_miskin");
        }
        
    }

    public function insert_transaksi($data)
    {
        $q= $this->db->insert('data_warga_miskin',$data);
        if($q)
            return $this->db->insert_id();
        return false;
    }

    public function insert_detail_warga($data)
    {
         $this->db->insert_batch('detail_warga_miskin', $data); 
    }

    public function gettransaksiById($id)
    {
        $this->db->select('*');
        $this->db->from('data_warga_miskin');
        $this->db->where('id_warga',$id);
        $q = $this->db->get()->row();

        if($q)
            return $q;
        return false;
    }

    public function update_transaksi($id,$data)
    {
        $this->db->where('id_warga', $id);
        $q = $this->db->update('data_warga_miskin', $data); 
        if($q)
            return true;
        return false;
    }

    public function delete_transaksi($id)
    {
         $this->db->delete('data_warga_miskin', array('id_warga' => $id)); 
    }

    public function getDetailWarga($id)
    {
        $this->db->select('*');
        $this->db->from('detail_warga_miskin');
        $this->db->join('kriteria','kriteria.id_kriteria = detail_warga_miskin.kriteria');
        $this->db->where('id_warga',$id);
        return $this->db->get()->result();
    }

    public function deletedetailwargamiskin($id)
    {
        $this->db->delete('detail_warga_miskin', array('id_warga' => $id));
    }

    public function cek_no_kk($no_kk)
    {
        $this->db->where('no_kk',$no_kk);
        return $this->db->count_all_results('data_warga_miskin');
    }

    public function cek_no_ktp($no_ktp)
    {
        $this->db->where('nik_kk',$no_ktp);
        return $this->db->count_all_results('data_warga_miskin');
    }

    public function cek($item,$idwarga)
    {
        $this->db->select('*');
        $this->db->from("detail_warga_miskin");
        $this->db->where('kriteria',$item);
        $this->db->where('id_warga',$idwarga);
        return $this->db->count_all_results();
    }

    public function ambilwarga()
    {
        $q = "SELECT detail_warga_miskin.id_warga AS id_warga, COUNT( kriteria ) AS total_kriteria, SUM( value ) AS total FROM detail_warga_miskin JOIN data_warga_miskin c ON c.id_warga = detail_warga_miskin.id_warga WHERE c.status =1 GROUP BY id_warga ORDER BY total DESC ";

        return $this->db->query($q)->result();

    }

    public function getWargaAll()
    {
        $this->db->order_by('rw','asc');
        
        return $this->db->get('data_warga_miskin')->result();
    }

    public function getWargaPerRw($rw)
    {
        $this->db->where('rw',$rw);
        return $this->db->get('data_warga_miskin')->result();
    }

    public function getWargaStatus($status)
    {
        $this->db->where('status',$status);
        return $this->db->get('data_warga_miskin')->result();
    }
}