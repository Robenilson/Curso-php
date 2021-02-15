<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="titulo">Consultar</div>
<?php
require_once "cone.php";
$sql ="SELECT id,nome,nasicimento,email FROM cadastro";

$conexão= novaConexao();
$resultado=$conexão->query($sql);

$registros= [];

if($resultado->num_rows > 0){
    while( $row = $resultado->fetch_assoc()){
        $registros[]= $row;

    }
}elseif($conexão->error){
    echo"Err". $conexão->error;
}
$conexão->close();
?>

<table class="table">
    <thead>
        <th>Código</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>E-mail</th>
    </thead>
    <tbody>
        <?php foreach($registros as $registro):?>
            <tr>
                <td><?=$registro['id'] ?></td>
                <td><?=$registro['nome'] ?></td>
                <td> <?=date('d/m/Y', strtotime( $registro['nasicimento']))?> </td>
                <td><?=$registro['email'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

