<?php

require_once "Classes/Funcionario.php";
$funcionario = new Funcionario();
$lista = $funcionario->listar();
$somaAtual = 0;
$somaAnterior = 0;

foreach ($lista as $linha) {
    $somaAtual = $somaAtual + $linha['salario_atual'];
}

foreach ($lista as $linha) {
    $somaAnterior = $somaAnterior + $linha['salario_anterior'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atividade 01</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script>

        function soma()
            {
                <?php
                    $valor = $_POST['salarios'];
                ?>
                var soma = document.getElementById("soma");

                if(<?php echo $valor ?> == 1) {
                    document.getElementById('salario').innerHTML = 'Soma dos Salários Atuais:';
                    soma.value = <?php echo $somaAtual; ?>;
                }
                else if (<?php echo $valor ?> == 2){
                    document.getElementById('salario').innerHTML = 'Soma dos Salários Anteriores:';
                    soma.value = <?php echo $somaAnterior; ?>;
                } 
    
            }
    </script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-10 mt-3" style="width: 100%">
                <table class="table table-striped text-center" border="1">
                    <tr>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Salario Atual</th>
                        <th>Salario Anterior</th>
                    </tr>
                    <?php foreach ($lista as $linha) : ?>
                        <tr>
                            <td><?php echo $linha['nome'] ?></td>
                            <td><?php echo $linha['cargo'] ?></td>
                            <td><?php echo $linha['salario_atual'] ?></td>
                            <td><?php echo $linha['salario_anterior'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>

            <div class="col-4 text-center" >
                <form action="salario-atualizar.php" method="POST">
                    <label>Porcentagem da Correção:</label>
                    <input type="number" name="porcentagem" placeholder="Porcentagem - %" class="form-control" required>
                    <label class="mt-3">Adicione o Bônus:</label>
                    <input type="number" name="bonus" placeholder="Bônus - R$" class="form-control" required>
                    <input type="submit" value="Aplicar Correção" name="submit" class="btn btn-primary mt-3">
                </form>
            </div>

            <div class="col-4 text-center">

                <label id="salario">Soma dos Salários:</label>
                <input type="text" id="soma" name="soma" class="form-control" readonly>

                <input type="submit" value="Somar Salários" name="submit" class="btn btn-primary mt-3" onclick="soma();">
                <button class="btn btn-primary mt-3"><a href="somar-salario.html" style="text-decoration: none; color: white;"><a href="somar-salario.html" style="text-decoration: none; color: white;">Editar</button>

            </div>

        </div>
    </div>
</body>
</html>