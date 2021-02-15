<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="titulo">Excluir2</div>
<?php
require_once "cone.php";
$registros= [];
$conexão= novaConexao();


if($_GET['excluir']) {
    $excluirSQL = "DELETE FROM cadastro WHERE id = ?";
    //usa a função prepare para  evitar  que sujeria ou ataques  de SQL Injection entre na query que sera executada no bando 
    $stmt = $conexão->prepare($excluirSQL);
    $stmt->bind_param("i", $_GET['excluir']);
    $stmt->execute();
}

$sql ="SELECT id,nome,nasicimento,email FROM cadastro";

$resultado=$conexão->query($sql);




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
        <th>ID</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>E-mail</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php foreach($registros as $registro):?>
            <tr>
                <td><?=$registro['id'] ?></td>
                <td><?=$registro['nome'] ?></td>
                <td> <?=date('d/m/Y', strtotime( $registro['nasicimento']))?> </td>
                <td><?=$registro['email'] ?></td>
                <td><a href="exercicio.php?dir=bd&file=excluir2&excluir=<?= $registro['id']?>" class="btn btn-danger">Excluir</a></td>

            </tr>
        <?php endforeach ?>
    </tbody>
</table>
