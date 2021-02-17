<?php

class Helper extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function jlhPeserta($id_kursus)
    {
        $data = $this->db->table('enroll')->where('id_kursus', $id_kursus)->count();

        return $data;
    }

    public function getKategori()
    {
        $data = $this->db->table('kategori')->get();

        return $data;
    }

}