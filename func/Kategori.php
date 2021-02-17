<?php

class Kategori extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showKategori($id)
    {
        $data = $this->db->table('kategori')->find($id);

        return $data;
    }

    public function getKursusbyKategori($kategori_id)
    {
        $data   = [];
        $kursus = $this->db->table('kursus')
                    ->where('kategori_id', $kategori_id)
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