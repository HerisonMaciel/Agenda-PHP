<?php

class Contato {

    private $id;
    private $nome;
    private $telefone;
    private $email;

    function __construct($nome, $telefone, $email){
        $this->nome     = $nome;
        $this->telefone = $telefone;
        $this->email    = $email;
    }

    function __construct2(){

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = telefone;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = email;
    }
}