<?php

class Profil extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProfile($user_id)
    {
        $data = $this->db->table('user')->where('id', $user_id)->first();

        return $data;
    }

    public function update($req, $id, $session)
    {
        $update = $this->db->table('user')->where('id', $id)->update($req);

        if ($update) {
            $session->set('user-name', $req['nama']);
            $session->set('user-email', $req['email']);
            $session->set('user-password', $req['password']);
            return true;
        }else {
            return false;
        }
    }
}