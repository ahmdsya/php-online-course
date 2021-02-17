<?php

class Home extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $data   = [];
        $kursus = $this->db->table('kursus')
                    ->where('status', '1')
                    ->orderBy('id', 'DESC')
                    ->select(['id', 'gambar', 'judul', 'slug', 'deskripsi', 'tingkat'])
                    ->get();
        foreach($kursus as $row){
            $materi = $this->db->table('materi')->where('id_kursus', $row->id)->get();
            $data[] = [
                'id' => $row->id,
                'gambar' => $row->gambar,
                'judul' => $row->judul,
                'slug' => $row->slug,
                'deskripsi' => $row->deskripsi,
                'tingkat' => $row->tingkat,
                'jlh_materi' => count($materi)
            ];
        }

        return $data;
    }
}