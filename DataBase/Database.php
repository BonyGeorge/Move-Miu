<?php

class Database
{
    private $host = 'server116.web-hosting.com';
    private $user = 'movegvka_admin';
    private $pass = 'Admin2020';
    private $dbName = 'movegvka_move';

    private $dbh;
    private $stmt;
    private $error;
    

    public function __construct()
    {
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try
        {
            $this->dbh = new PDO($dsn,$this->user,$this->pass,$options);
        }catch(PDOExeption $e)
        {
            $this->error = $e->getMessage();

            echo $this->error;
        }
    }
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    public function bind($param,$value)
    {
        $stmt->bindParam($param,$value);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }
    public function getdata()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function numRows()
    {
        return $this->stmt->rowCount();
    }

}
?>