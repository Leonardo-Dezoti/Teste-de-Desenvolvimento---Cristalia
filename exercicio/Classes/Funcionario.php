<?php

class Funcionario
{
    public $id;
    public $nome;
    public $cargo;
    public $salario_atual;
    public $salario_anterior;

     public function __construct($id = false)
     {
         if ($id){
             $this->id = $id;
             $this->carregar();
         }
     }

    public function inserir()
    {
        $sql = "INSERT INTO salario(nome, cargo, salario_atual, salario_anterior)
        
         VALUES ('" .$this->nome. "', '" .$this->cargo. "', '".$this->salario_atual. "', '".$this->salario_anterior. "')";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=salario','root','');
        $conexao->exec($sql);
        
    }


public function listar()
{
    $sql = "SELECT * FROM funcionarios";
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=salario','root','');
    $resultado = $conexao->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;

}

public function excluir()
{
    $sql = "DELETE FROM funcionarios WHERE id=".$this->id;
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=salario','root','');
    $conexao->exec($sql);
}

public function carregar()
{
    $sql = "SELECT * FROM funcionarios WHERE id=".$this->id;
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=salario','root','');
    $resultado = $conexao->query($sql);
    $linha = $resultado->fetch();
    $this->nome = $linha['nome'];
    $this->cargo = $linha['cargo'];
    $this->salario_atual = $linha['salario_atual'];
    $this->salario_anterior = $linha['salario_anterior'];

}

public function atualizar()
{
    $sql = "UPDATE funcionarios SET 
    salario_atual = '$this->salario_atual' ,
    salario_anterior = '$this->salario_anterior'
    WHERE id = $this->id";
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=salario','root','');
    $conexao->exec($sql);
}
}