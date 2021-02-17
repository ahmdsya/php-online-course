<?php

class Kursus extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getKategori()
    {
        $data = $this->db->table('kategori')->orderBy('id','ASC')->get();

        return $data;
    }

    public function getData()
    {
        $data = [];
        $kursus = $this->db->table('kursus')->select(['id','judul','status'])->orderBy('id','DESC')->get();
        foreach($kursus as $row){
            $materi = $this->db->table('materi')->where('id_kursus', $row->id)->get();
            $data[] = [
                'id' => $row->id,
                'judul' => $row->judul,
                'status' => $row->status,
                'jlh_materi' => count($materi)
            ];
        }

        return $data;
    }

    public function tambahKursus($req)
    {
        $insert = $this->db->table('kursus')->insert($req);

        if ($insert) {
            $sql   = $this->db->table('kursus')->orderBy('id','DESC')->limit(1)->first();
            $id    = $sql->id;
            return $id;
        }else{
            return false;
        }
    }

    public function show($id)
    {
        $kursus = $this->db->table('kursus')->where('id',$id)->first();

        return $kursus;
    }

    public function ubah($req, $id)
    {
        $update = $this->db->table('kursus')->where('id', $id)->update($req);

        if ($update) {
            return true;
        }else {
            return false;
        }
    }

    public function ubahKursusStatus($id)
    {
        $update = $this->db->table('kursus')
                    ->where('id', $id)
                    ->update([
                        'status' => '1'
                    ]);

        if ($update) {
            return true;
        }else {
            return false;
        }
    }

    public function hapus($id)
    {
        $data = $this->db->table('kursus')->find($id);
        unlink('assets/img/'.$data->gambar);
        
        $delKursus = $this->db->table('kursus')->where('id', $id)->delete();

        if ($delKursus) {
            $delMateri = $this->db->table('materi')->where('id_kursus', $id)->delete();
            return true;
        }else {
            return false;
        }
    }
}