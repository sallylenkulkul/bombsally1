<?php
    include("conecta.php");
    $FK_IdOcorrencia = 20; //$_SESSION["id"];

    $forma  = $_POST["forma"];

    $comando = $pdo->prepare("INSERT INTO forma_conducao VALUES ($FK_IdOcorrencia, '$forma')");
    $resultado = $comando->execute();

    echo ("{\"resposta\":1}");

?>