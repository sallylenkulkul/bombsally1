<?php
session_start();
    include("conecta.php");

    $critico  = $_POST["critico"];
    $instavel   = $_POST["instavel"];
    $pot_instavel = $_POST["pot_instavel"];
    $estavel = $_POST["estavel"];



    $comando = $pdo->prepare("INSERT INTO decisao_transporte VALUES ('$critico','$instavel', '$pot_instavel', '$estavel,' )");
    $resultado = $comando->execute();

    $_SESSION["id"] = $pdo->lastInsertId();

    echo ("{\"resposta\":1}");

?>