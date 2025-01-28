<?php 

class Server{
    private $dbname = "mycontactbase";
    private $user = "admin";
    private $pass = "admin";

    public function conectar()
    {
        try {
            return new PDO("mysql:host=localhost;dbname=" .$this->dbname, $this->user, $this->pass);
        } catch (PDOException $err){
            echo "Erro ao buscar números: " . $err->getMessage();
            return false;
        }
    }

    public function desconectar(){
        return null;
    }
}

?>