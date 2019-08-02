<?php


class Connection
{
    public static $conn; //Variavel para pegar a conexa

    public static function GetConn()
    {
        //Verifica se já possui conexao, se sim ele já retorna a conexao
        if(self::$conn!=null){
            return self::$conn;
        }

        //Fazendo a conexao com o banco
        self::$conn = new PDO('mysql:host=localhost; dbname=projeto-php-crud-pessoa', 'root', '');

        return self::$conn;
    }
}