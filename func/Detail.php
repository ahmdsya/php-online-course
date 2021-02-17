<?php

class Detail extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getKursus($id)
    {
        $data = $this->db->table('kursus')->find($id);

        return $data;
    }

    public function getKategori($id)
    {
        $data = $this->db->table('kategori')->find($id);

        return $data;
    }

    public function getMateri($id)
    {
        $data = $this->db->table('materi')
                ->where('id_kursus', $id)
                ->get();

        return $data;
    }

    public function showMateri($id)
    {
        $data = $this->db->table('materi')
                ->where('id', $id)
                ->first();

        return $data;
    }

    public function enroll($id_kursus, $id_user)
    {
        $insert = $this->db->table('enroll')
                    ->insert([
                        'id_kursus' => $id_kursus,
                        'id_user'   => $id_user
                    ]);

        if($insert){
            return true;
        }else {
            return false;
        }
    }

    public function getEnroll($id_kursus, $id_user)
    {
        $data = $this->db->table('enroll')
                    ->where('id_kursus', $id_kursus)
                    ->where('id_user', $id_user)
                    ->count();
        
        if($data >= 1){
            return true;
        }else {
            return false;
        }
    }
}