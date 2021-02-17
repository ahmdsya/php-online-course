<?php

class Materi extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        $data = $this->db->table('materi')->where('id_kursus',$id)->orderBy('id','ASC')->get();

        return $data;
    }

    public function tambah($req)
    {
        $insert = $this->db->table('materi')->insert($req);

        if ($insert) {
            return true;
        }else {
            return false;
        }
    }

    public function ubah($req, $id)
    {
        $update = $this->db->table('materi')->where('id',$id)->update($req);

        if ($update) {
            return true;
        }else {
            return false;
        }
    }

    public function hapus($id)
    {
        $hapus = $this->db->table('materi')->where('id',$id)->delete();

        if ($hapus) {
            return true;
        }else {
            return false;
        }
    }
}