<?php

include_once "../dao/Connection.php";

class ContatoModel
{
    //Função para selecionar todos contatos do banco
    public static function getTodosContatos()
    {
        $pdo = Connection::GetConn();
        $stmt = $pdo->prepare("SELECT * FROM contato ORDER BY nome");
        $stmt->execute();

        $contatos = array();

        //Colocando os contatos em um array para retornar o array com todos os contatos
        while ($contato = $stmt->fetchObject('ContatoModel'))
        {
            $contatos[] = $contato;
        }

        if($contatos == false){
            throw new Exception("Objeto não encontrado");
            return false;
        }
        return $contatos;
    }

    //Função para inserir um contato
    public static function insert($contato)
    {

        $pdo = Connection::GetConn();

        $stmt = $pdo->prepare("INSERT INTO contato (nome, telefone, email) VALUES (:nom, :tel, :emi);");
        $stmt->bindValue(':nom', $contato->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':tel', $contato->getTelefone(), PDO::PARAM_STR);
        $stmt->bindValue(':emi', $contato->getEmail(), PDO::PARAM_STR);
        $validacao = $stmt->execute();

        if($validacao == false){
            throw new Exception("Falha ao cadastrar usuário!");
            return false;
        }
        return true;
    }

    //Função para atualizar um contato
    public static function update($contato)
    {
        $pdo = Connection::GetConn();

        $sql = "UPDATE contato SET nome = :nom, telefone = :tel, email = :ema WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $contato->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nom', $contato->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':tel', $contato->getTelefone(), PDO::PARAM_STR);
        $stmt->bindValue(':ema', $contato->getEmail(), PDO::PARAM_STR);

        $validacao = $stmt->execute();

        if($validacao == false){
            throw new Exception("Não foi possível alterar!");
            return false;
        }

        return true;
    }

    //Função para pegar todos contatos com o nome passado por parametro
    public static function getContato($nome)
    {

        $pdo = Connection::GetConn();
        $stmt = $pdo->prepare("SELECT * FROM contato WHERE UPPER(nome) LIKE '%$nome%' ORDER BY nome");
        $stmt->bindValue($nome,PDO::PARAM_STR);
        $stmt->execute();


        $contatos = array();

        //Colocando todos os resultado em um array
        while ($contato = $stmt->fetchObject('ContatoModel'))
        {
            $contatos[] = $contato;
        }

        if($contatos == false){
            throw new Exception("Objeto não encontrado");
            return false;
        }

        return $contatos;
    }

    //Função para pegar um contato pelo Id, utilizado para editar
    public static function getContatoPorId($id)
    {
        $pdo  = Connection::GetConn();
        $stmt = $pdo->prepare("SELECT * FROM contato WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $contato = $stmt->fetchObject('ContatoModel');

        if($contato == false){
            throw new Exception("Objeto não encontrado");
            return false;
        }

        return $contato;
    }

    //Função para deletar um contato
    public static function delete($idContato)
    {

        $pdo = Connection::GetConn();

        $stmt = $pdo->prepare("DELETE FROM contato WHERE id = :id");
        $stmt->bindValue(":id", $idContato, PDO::PARAM_INT);
        $validacao = $stmt->execute();

        if($validacao == false){
            throw new Exception("Não foi possível deletar o contato!");
            return false;
        }
        return true;
    }

}