<?php

require_once("config.php");

class DBConnection
{

    private $_dbHostname = HOSTNAME;
    private $_dbName = DB_NAME;
    private $_dbUsername = DB_USER;
    private $_dbPassword = DB_PASS;
    private $_con;

    public function __construct()
    {

        try {
            $this->_con = new PDO("mysql:host=$this->_dbHostname;dbname=$this->_dbName", $this->_dbUsername, $this->_dbPassword);
            $this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conectado com sucesso.";
        } catch (PDOException $e) {
            echo "<h1>Ops, algo deu errado: " . $e->getMessage() . "</h1>";
            echo "<pre>";
            echo print_r($e);
        }
    }
    // return Connection
    public function returnConnection()
    {
        return $this->_con;
    }
}
