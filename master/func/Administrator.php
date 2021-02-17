<?php

class Administrator extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData()
    {
        $data = $this->db->table('admin')->get();

        return $data;
    }

    public function hapus($id)
    {
        $hapus = $this->db->table('admin')->where('id', $id)->delete();

        if ($hapus) {
            return true;
        }else {
            return false;
        }
    }
}