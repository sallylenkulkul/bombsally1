<?php
session_start();
    include("conecta.php");
    $FK_IdOcorrencia = $_SESSION["id"];

    $Observacoes  = $_POST["Observacoes"];
  

    $comando = $pdo->prepare("INSERT INTO obs_importantes VALUES ($FK_IdOcorrencia, '$Observacoes')");
    $resultado = $comando->execute();

    echo ("{\"resposta\":1}");

?>