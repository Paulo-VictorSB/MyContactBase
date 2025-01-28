<?php

class Query_functions extends Server{

    public function buscar_nome($id){
        try {
            $query = $this->conectar()->query("SELECT name FROM principal WHERE id = $id");

            return $query->fetch(PDO::FETCH_ASSOC);
            $query = null;
        } catch (PDOException $err) {
            echo "Erro ao buscar nomes: " . $err->getMessage();
            return false;
        }
    }

    public function buscar_numero($id){
        try {
            $query = $this->conectar()->query("SELECT phone FROM principal WHERE id = $id");

            return $query->fetch(PDO::FETCH_ASSOC);
            $query = null;
        } catch (PDOException $err) {
            echo "Erro ao buscar números: " . $err->getMessage();
            return false;
        } 
    }

    public function buscar_email($id){
        try {
            $query = $this->conectar()->query("SELECT email FROM principal WHERE id = $id");

            return $query->fetch(PDO::FETCH_ASSOC);
            $query = null;
        } catch (PDOException $err) {
            echo "Erro ao buscar nomes: " . $err->getMessage();
            return false;
        } 
    }

    public function buscar_tudo(){
        try {
            $query = $this->conectar()->query("SELECT * FROM principal");

            return $query->fetchAll(PDO::FETCH_OBJ);
            $query = null;
        } catch (PDOException $err) {
            echo "Erro ao buscar tudo: " . $err->getMessage();
            return false;
        } 
    }

    public function excluir_contato($id){
        try {
            // Prepara a consulta com parâmetros
            $query = $this->conectar()->prepare("DELETE FROM principal WHERE id = :id");
            
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            
            // Executa a consulta
            $query->execute();
            
            // Encerra conexão
            $query = null;
            
            // Retorna sucesso ou outros dados, se necessário
            return true;
            
        } catch (PDOException $err) {
            // Exibe o erro caso algo aconteça
            echo "Erro ao apagar contato: " . $err->getMessage();
            return false;
        }
    }

    public function adicionar_contato($name, $phone, $email) {
        try {
            // Prepara a consulta com parâmetros
            $query = $this->conectar()->prepare("INSERT INTO principal (name, phone, email) VALUES (:name, :phone, :email)");
            
            // Substitui os parâmetros pelos valores recebidos
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':phone', $phone, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            
            // Executa a consulta
            $query->execute();
            
            // Encerra conexão
            $query = null;
            
            // Retorna sucesso ou outros dados, se necessário
            return true;
            
        } catch (PDOException $err) {
            // Exibe o erro caso algo aconteça
            echo "Erro ao adicionar contato: " . $err->getMessage();
            return false;
        }
    }

    public function atualizar_contato($id ,$name, $phone, $email) {
        try {
            // Prepara a consulta com parâmetros
            $query = $this->conectar()->prepare("UPDATE principal SET name = :name, phone = :phone, email = :email WHERE id = :id");
            
            // Substitui os parâmetros pelos valores recebidos
            $query->bindParam(':name', $name);
            $query->bindParam(':phone', $phone);
            $query->bindParam(':email', $email);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            
            // Executa a consulta
            $query->execute();
            
            // Encerra conexão
            $query = null;
            
            // Retorna sucesso ou outros dados, se necessário
            return true;
            
        } catch (PDOException $err) {
            // Exibe o erro caso algo aconteça
            echo "Erro ao adicionar contato: " . $err->getMessage();
            return false;
        }
    }
    
}