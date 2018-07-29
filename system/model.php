<?php

class Model
{
    private $pdoConnect;

    //private $mysqliConnect;

    public function __construct()
    {
        global $config;
        // mysqli connect
        //$this->mysqliConnect = new mysqli($config['db_host'], $config['db_username'], $config['db_password'], $config['db_name']) or die('Mysqli Error: ' . $this->mysqliConnect->connect_errno);
        //$this->mysqliConnect->query("SET NAMES UTF8");

        // PDO connect
        try {
            $host = $config['db_host'];
            $database = $config['db_name'];
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"'];
            $this->pdoConnect = new PDO("mysql:host=$host;dbname=$database", $config['db_username'], $config['db_password'], $options) or die();
            $this->pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('PDO Connection Error: ' . $e->getMessage());
        }
    }


    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }

    // get connection PDO
    public function getPdoConnect()
    {
        return $this->pdoConnect;
    }

    // do select method
    public static function DoSelect($sql = '', $values = [], $fetch = '', $fetch_style = PDO::FETCH_ASSOC)
    {
        $stmt = self::getPdoConnect()->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetch_style);
        } else {
            $result = $stmt->fetch($fetch_style);
        }
        return $result;
    }

    // do query method
    public static function DoQuery($sql = '', $values = [])
    {
        $stmt = self::getPdoConnect()->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
    }


}


?>
