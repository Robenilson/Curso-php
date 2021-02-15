<div class="titulo">Inserir</div>

<?php
   require_once "cone.php";
   $sql="INSERT INTO cadastro
   (nome,nasicimento,email,site,filhos,salario)
   VALUES(
       'carlos',
       '2019-10-29',
       'carlos123@email.com.br',
       'https://foda-se.com.br',
       2,
       1300.87)";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso :)";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();

