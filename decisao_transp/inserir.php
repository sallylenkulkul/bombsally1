<?php
session_start();
    include("conecta.php");
    
    $critico  = isset($_POST["critico"])?1:0;
    $instavel  = isset($_POST["instavel"])?1:0;
    $pot_instavel  = isset($_POST["pot_instavel"])?1:0;
    $estavel  = isset($_POST["estavel"])?1:0;


    $comando = $pdo->prepare("INSERT INTO decisao_transporte VALUES ($critico, $instavel, $pot_instavel, $estavel )");
    $resultado = $comando->execute();

    echo ("{\"resposta\":1}");

?>