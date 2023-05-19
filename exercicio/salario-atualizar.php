<?php
require_once "Classes/Funcionario.php";
$funcionario = new Funcionario();
$lista = $funcionario->listar();

$valores = filter_input_array(INPUT_POST, FILTER_DEFAULT);

foreach ($lista as $linha) {
    if ($linha['salario_atual'] < 1500) {
        $id = $linha['id'];
        $acrescimo = $linha['salario_atual'] / 100 * $valores['porcentagem'];
        $antigo = $linha['salario_atual'];
        $novo = $linha['salario_atual'] + $acrescimo + $valores['bonus'];
        $funcionario->salario_atual = $novo;
        $funcionario->salario_anterior = $antigo;
        $funcionario->id = $id;
        $funcionario->atualizar();
    } else {
    }
}

header('Location: index.php');
