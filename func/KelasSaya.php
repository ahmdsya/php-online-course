<?php

class KelasSaya extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($userID)
    {
        $data = $this->db->table('enroll')
                ->select('kursus.*')
                ->join('kursus', 'kursus.id', '=', 'enroll.id_kursus')
                ->get();

        return $data;
    }
}