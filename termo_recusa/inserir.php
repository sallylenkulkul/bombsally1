<?php
session_start();
$FK_IdOcorrencia = $_SESSION["id"];
    
    include("conecta.php");

    $disturbio = $_POST["disturbio"]
    
   


    $comando = $pdo->prepare("INSERT INTO av_cinematica VALUES ($FK_IdOcorrencia, $disturbio, $capacete, 
    $cinto, $parabrisa, $camin, $painel, $volante)");
    $resultado = $comando->execute();


    echo ("{\"resposta\":1}");
    $_SESSION["id"] = $pdo->lastInsertId();

?>