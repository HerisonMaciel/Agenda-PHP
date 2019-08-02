<?php

include_once "../entidy/Contato.php";
include_once "../models/ContatoModel.php";
//Verifica em qual if vai entar
$action = $_GET['action'];

if ($action == 'index') {
    $listaDeContatos = buscaContatos();
    include_once('../views/header-view.php');
    include_once('../views/inicio-view.php');
    include_once('../views/footer-view.php');
}

if ($action == 'find') {
    $listaDeContatos = buscaContatosPorNome();
    include_once('../views/header-view.php');
    include_once('../views/inicio-view.php');
    include_once('../views/footer-view.php');
}

if ($action == 'new') {
    include_once('../views/header-view.php');
    include_once('../views/new-view.php');
    include_once('../views/footer-view.php');
}

if ($action == 'details') {
    $contato = buscaContatosPorId();
    include_once('../views/header-view.php');
    include_once('../views/detalhe-view.php');
    include_once('../views/footer-view.php');
}

if ($action == 'create') {
    $contatoAdicionado = adicionaContato();
    $listaDeContatos   = buscaContatos();
    include_once('../views/header-view.php');
    include_once('../views/inicio-view.php');
    include_once('../views/footer-view.php');
}

if ($action == 'update') {
    $contatoEditado  = editaContato();
    //echo $contatoEditado;
    $listaDeContatos = buscaContatos();
    include_once('../views/header-view.php');
    include_once('../views/inicio-view.php');
    include_once('../views/footer-view.php');
}

if ($action == 'delete'){
    $contatoRemovido = removeContato();
    $listaDeContatos = buscaContatos();
    include_once('../views/header-view.php');
    include_once('../views/inicio-view.php');
    include_once('../views/footer-view.php');
}

if ($action != 'index' && $action != 'find' 
    && $action != 'new' && $action != 'create' 
    && $action != 'update' && $action != 'delete' 
    && $action != 'details' && $action != 'addArquivo') {
    echo "Erro 404: Page not found";
}

//Função para adicionar contato
function adicionaContato() {
    $nome     = $_GET['nome'];
    $telefone = $_GET['telefone'];
    $email    = $_GET['email'];
    $contato  = new Contato($nome, $telefone, $email);

    try{
        ContatoModel::insert($contato); //Chamando a função insert da classe ContatoModel
        return true;
    }catch (Exception $e){
        return false;
    }

}
//Funcção para editar contato
function editaContato(){
    $nome     = $_GET['nome'];
    $telefone = $_GET['telefone'];
    $email    = $_GET['email'];
    $contato  = new Contato($nome, $telefone, $email);
    $contato->setId($_GET['id']);

    try{
        ContatoModel::update($contato); //Chamando a função update da classe ContatoModel
        return $contato;
    }catch (Exception $e){
        echo $e;
        return $e->getMessage();
    }

}

//Função para buscar contato por nome
function buscaContatosPorNome(){
    $nome = $_GET['nome'];
    $contatos = array();

    try{
        $contatos = ContatoModel::getContato($nome); //Chamando a função getContato da classe ContatoModel que retorna array com todos que tem o nome
         return $contatos;
    }catch (Exception $e){
        return $e->getMessage();
    }
}

// Função para buscar por id
function buscaContatosPorId(){
    $id = $_GET['id'];

    try{
        $contato = ContatoModel::getContatoPorId($id); //Chamando a função getContatoPorId da classe ContatoModel, retorna um contato
        return $contato;
    }catch (Exception $e){
        return $e->getMessage();
    }

}

//Função para buscar todos os contatos
function buscaContatos(){

    $contatos = array();

    try{
        $contatos = ContatoModel::getTodosContatos(); // Chamando a função getTodosContatos da classe ContatoModel, retorna um array
        //var_dump($contatos);
        return $contatos;
    }catch (Exception $e){
        //var_dump($contatos);
        return $e->getMessage();
    }

}

//Função para remover contato
function removeContato(){
    $idContato = $_GET['id'];
    try{
        ContatoModel::delete($idContato); //Chamando a função delete da classe ContatoModel
        return true;
    }catch (Exception $e){
        return $e->getMessage();
    }
}

//Funçao para adicionar por arquivo CSV
function adicionarPorArquivo($arquivo){

    date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

    $ext = strtolower(substr($arquivo['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Define um novo nome para o arquivo
    $dir = 'C:/xampp/htdocs/agenda-php/arquivos-enviados/'; //Diretório para uploads

    move_uploaded_file($arquivo['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

    $file = fopen($dir.'/'.$new_name, 'r');

    //Percorre o Arquivo
    while (($line = fgetcsv($file, null, ';')) !== false)
    {
        $nome = $line[0];
        $telefone = $line[1];
        $email = $line[2];
        $contato = new Contato($nome, $telefone, $email);
        try{
            ContatoModel::insert($contato); //Chamando a função insert da classe ContatoModel

        }catch (Exception $e){
        }

    }
    fclose($file);
    header('Refresh:0'); //Atualiza a pagina
}