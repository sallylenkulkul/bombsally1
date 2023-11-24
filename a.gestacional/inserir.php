<?php
session_start();
$FK_IdOcorrencia = 19;//$_SESSION["id"];
    
    include("conecta.php");

    $periodo = $_POST["periodo"];
    $prenatal  = $_POST["prenatal"];
    $medico  = $_POST["medico"];
    $complic  = $_POST["complic"];
    $filho  = $_POST["filho"];
    $quantos  = $_POST["quantos"];
    $contracoes  = $_POST["contracoes"];
    $duracao  = $_POST["duracao"];
    $intervalo  = $_POST["intervalo"];
    $pressao  = $_POST["pressao"];
    $ruptura  = $_POST["ruptura"];
    $inspecao  = $_POST["inspecao"];
    $parto  = $_POST["parto"];
    $hora  = $_POST["hora"];
    $sexo  = $_POST["sexo"];
    $nome  = $_POST["nome"];

    $comando = $pdo->prepare("INSERT INTO anamnese_gestacional VALUES ($FK_IdOcorrencia, '$periodo', '$prenatal', '$medico',
    '$complic', '$filho', '$quantos', '$contracoes', '$duracao',
    '$intervalo', '$pressao', '$ruptura', '$inspecao', '$parto', 
    '$hora', '$sexo', '$nome' )");
    $resultado = $comando->execute();


    echo ("{\"resposta\":1}");
    //$_SESSION["id"] = $pdo->lastInsertId();

?>