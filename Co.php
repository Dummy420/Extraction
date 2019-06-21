<?php
/*
$hostname_inventaire = "localhost";
$database_inventaire = "inventaire";
$username_inventaire = "inventaire";
$password_inventaire = "gtk56w77";
*/
try {
    $link = new PDO("mysql:host=localhost;dbname=inventaire_test", "root", "");
} catch (PDOExeption $e) {
    echo $e->getMessage();
}
class Link extends PDO
{
    private static $instance;
    private $type = 'mysql';
    private $host = 'localhost';
    private $dbname = 'inventaire_test';
    private $username = 'root';
    private $password = '';
    private $link;

    private function __construct()
    {
        try {
            $this->link = new PDO(
                $this->type.':host='.$this->host.'; dbname='.$this->dbname,
                $this->username,
                $this->password,
                array(PDO::ATTR_PERSISTENT => true)
    );
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    // La méthode singleton
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getlink()
    {
        return $this->link;
    }

    public function Select($query)
    {
        $array = [];
        $result = $this->link->query($query);
        while ($row = $result->fetch()) {
            array_push($array, $row);
        }
        return $array;
    }
}
