<?php

class Dashboard extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function jlhKursus()
    {
        $data = $this->db->table('kursus')->count();

        return $data;
    }

    public function jlhKategori()
    {
        $data = $this->db->table('kategori')->count();

        return $data;
    }

    public function jlhPeserta()
    {
        $data = $this->db->table('user')->count();

        return $data;
    }

    public function jlhAdmin()
    {
        $data = $this->db->table('admin')->count();

        return $data;
    }

    public function getKursus()
    {
        $data = $this->db->table('kursus')->select('judul')->orderBy('id', 'DESC')->limit(5)->get();

        return $data;
    }

    public function getPeserta()
    {
        $data = $this->db->table('user')->select(['nama','email'])->orderBy('id', 'DESC')->limit(5)->get();

        return $data;
    }
}