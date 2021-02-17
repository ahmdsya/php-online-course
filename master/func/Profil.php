<?php

class Profil extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showProfile($id)
    {
        $data = $this->db->table('admin')->find($id);

        return  $data;
    }

    public function ubah($req, $id, $session)
    {
        $ubah = $this->db->table('admin')->where('id', $id)->update($req);

        if ($ubah) {
            $session->set('admin-name', $req['nama']);
            $session->set('admin-email', $req['email']);
            $session->set('admin-password', $req['password']);
            return true;
        }else {
            return false;
        }
    }
}