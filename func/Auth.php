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
        $user = $this->db->table('user')
                    ->where('email', $email)
                    ->where('password', $pass)
                    ->first();

        if (count($user) >= 1) {
            $this->session->set('user-id', $user->id);
            $this->session->set('user-name', $user->nama);
            $this->session->set('user-email', $user->email);
            $this->session->set('user-password', $user->password);

            return true;
        }else {
            return false;
        }
    }

    public function isLogin()
    {
        $email = $this->session->get('user-email');
        $pass  = $this->session->get('user-password');
        
        if ($email && $pass) {
            return true;
        }else {
            return false;
        }
    }

    public function register($nama, $email, $pass)
    {
        $cekEmail = $this->db->table('user')->where('email', $email)->count();

        if($cekEmail >= 1){
            return false;
        }else {
            $insert = $this->db->table('user')
                        ->insert([
                            'nama' => $nama,
                            'email' => $email,
                            'password' => $pass
                        ]);
            
            if ($insert) {
                $user = $this->db->table('user')
                        ->where('email', $email)
                        ->where('password', $pass)
                        ->first();
                $this->session->set('user-id', $user->id);
                $this->session->set('user-name', $user->nama);
                $this->session->set('user-email', $user->email);
                $this->session->set('user-password', $user->password);

                return true;
            }
        }
    }
}