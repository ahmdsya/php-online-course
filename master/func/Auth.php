<?php

class Auth extends DB
{
    protected $session;

    public function __construct($session)
    {
        parent::__construct();
        $this->session = $session;
    }

    public function login($email, $pass)
    {
        $user = $this->db->table('admin')
                    ->where('email', $email)
                    ->where('password', $pass)
                    ->first();

        if (count($user) >= 1) {
            $this->session->set('admin-id', $user->id);
            $this->session->set('admin-name', $user->nama);
            $this->session->set('admin-email', $user->email);
            $this->session->set('admin-password', $user->password);

            return true;
        }else {
            return false;
        }
    }

    public function isLogin()
    {
        $email = $this->session->get('admin-email');
        $pass  = $this->session->get('admin-password');
        
        if ($email && $pass) {
            return true;
        }else {
            return false;
        }
    }

    public function register($nama, $email, $pass)
    {
        $cekEmail = $this->db->table('admin')->where('email', $email)->count();

        if($cekEmail >= 1){
            return false;
        }else {
            $insert = $this->db->table('admin')
                        ->insert([
                            'nama' => $nama,
                            'email' => $email,
                            'password' => $pass
                        ]);
            
            if ($insert) {
                $user = $this->db->table('admin')
                        ->where('email', $email)
                        ->where('password', $pass)
                        ->first();
                $this->session->set('admin-id', $user->id);
                $this->session->set('admin-name', $user->nama);
                $this->session->set('admin-email', $user->email);
                $this->session->set('admin-password', $user->password);

                return true;
            }
        }
    }
}