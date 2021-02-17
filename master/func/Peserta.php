<?php

class Peserta extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData()
    {
        $data = $this->db->table('user')->get();

        return $data;
    }

    public function hapus($id)
    {
        $hapus = $this->db->table('user')->where('id', $id)->delete();

        if ($hapus) {
            return true;
        }else {
            return false;
        }
    }
}