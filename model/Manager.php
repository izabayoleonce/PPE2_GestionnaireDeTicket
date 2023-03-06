<?php
namespace model;

use classes\dbConnect;

class Manager
{
    private $_dsn = '';
    private $_login = 'leonce';
    private $_password = 'z3nwbHdJy';

    /**
     * Attribut contenant l'instance PDO
     */
    protected $manager;


    public function __construct()
    {
        if ( strstr($_SERVER['HTTP_HOST'], '51.178.86.117' ) )
        {
            $this->_dsn = 'mysql:host=localhost;dbname=ppe2_leonce';
            $this->manager = dbConnect::getDb($this->_dsn, $this->_login, $this->_password );
        }
        else{
            $this->_dsn = 'mysql:host=localhost;dbname=ppe3';
            $this->manager = dbConnect::getDb($this->_dsn, $this->_login, $this->_password );
        }
        
    }

    public function connection()
    {
        
    }

}