<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_kriteria($limit,$offset)
    {
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->limit($limit,$offset);

        $q  = $this->db->get()->result();

        if(!empty($q))
            return $q;
        return false;
    }

    public function get_kriteria_all()
    {
        $this->db->select('*');
        $this->db->from('kriteria');
        $q  = $this->db->get()->result();

        if(!empty($q))
            return $q;
        return false;
    }

    public function count_kriteria()
    {
        return $this->db->count_all("kriteria");
    }

    public function insert_kriteria($data)
    {
        $q= $this->db->insert('kriteria',$data);
        if($q)
            return true;
        return false;
    }

    public function getkriteriaById($id)
    {
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('id_kriteria',$id);
        $q = $this->db->get()->row();

        if($q)
            return $q;
        return false;
    }

    public function update_kriteria($id,$data)
    {
        $this->db->where('id_kriteria', $id);
        $q = $this->db->update('kriteria', $data); 
        if($q)
            return true;
        return false;
    }

    public function delete_kriteria($id)
    {
         $this->db->delete('kriteria', array('id_kriteria' => $id)); 
    }

}