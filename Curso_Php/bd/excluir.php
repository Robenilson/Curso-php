<div class="titulo">Excluir</div>
<?php
require_once "cone.php";
 
$sql= "DELETE FROM cadastro WHERE id =1";
$conexão= novaConexao();;
$resultado= $conexão->query($sql);


if($resultado){
    echo"Registro Excluido";
}else{

    echo"Erro: ".$conexão->error;
}

$conexão->close();
