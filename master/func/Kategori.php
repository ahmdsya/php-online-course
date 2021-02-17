<?php

class Kategori extends DB {

    public function __contruct()
    {
        parent::__construct();
    }

    public function get()
    {
        $data = $this->db->table('kategori')->orderBy('id','DESC')->get();

        return $data;
    }

    public function tambah($req)
    {
        $insert = $this->db->table('kategori')->insert($req);

        if ($insert) {
            return true;
        }else {
            return false;
        }
    }

    public function ubah($req, $id)
    {
        $update = $this->db->table('kategori')->where('id', $id)->update($req);

        if ($update) {
            return true;
        }else {
            return false;
        }
    }

    public function hapus($id)
    {
        $delete = $this->db->table('kategori')->where('id',$id)->delete();

        if ($delete) {
            return true;
        }else {
            return false;
        }
    }

}