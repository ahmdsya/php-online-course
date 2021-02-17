<?php

class Helper extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function slug($text='')
    {
        $text = trim($text);
        if (empty($text)) return '';
        
            $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
            $text = strtolower(trim($text));
            $text = str_replace(' ', '-', $text);
            $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
        
            return $text;
    }

    public function alert($type, $content, $session)
    {
        if ($type == 'sukses') {
            $alert = '
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    '.$content.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }else {
            $alert = '
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    '.$content.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }

        $session->flash('alert', $alert);
        
        return true;
    }

    public function jlhPeserta($id_kursus)
    {
        $data = $this->db->table('enroll')->where('id_kursus', $id_kursus)->count();

        return $data;
    }
}
