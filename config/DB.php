<?php

class DB
{
    protected $db;
    
    public function __construct()
    {
        $config = array(
            'driver'    => 'mysql', // Db driver
            'host'      => 'localhost',
            'database'  => 'php-online-course',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8', // Optional
            'collation' => 'utf8_unicode_ci', // Optional
            'prefix'    => '', // Table prefix, optional
        );
        
        $connection = new \Pixie\Connection('mysql', $config);
        $this->db = new \Pixie\QueryBuilder\QueryBuilderHandler($connection);
    }
}