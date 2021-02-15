

<?php

function novaConexao($banco = ' ') {
  $servidor =' ';
  $usuario = ' ';
    $senha = ' ';
  //$servidor = 'mysql:host=localhost';
    

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error) {
        die('Erro: ' . $conexao->connect_error);
   
      }
   

    return $conexao;
}

