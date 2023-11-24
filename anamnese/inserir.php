<?php
session_start();
$FK_IdOcorrencia = 80;//$_SESSION["id"];
    
    include("conecta.php");

    $aconteceu = $_POST["aconteceu"];
    $outras  = $_POST["outras"];
    $tempo  = $_POST["tempo"];
    $prob  = $_POST["prob"];
    $quais  = $_POST["quais"];
    $medic  = $_POST["medic"];
    $quais2  = $_POST["quais2"];
    $horario  = $_POST["horario"];
    $alergico  = $_POST["alergico"];
    $espec  = $_POST["espec"];
    $inger  = $_POST["inger"];
    $horas  = $_POST["horas"];


    $comando = $pdo->prepare("INSERT INTO anamnese_medica VALUES ($FK_IdOcorrencia, '$aconteceu', '$outras', '$tempo',
    '$prob', '$quais', '$medic', '$quais2', '$horario',
    '$alergico', '$espec', '$inger', '$horas')");
    $resultado = $comando->execute();


    echo ("{\"resposta\":1}");
    //$_SESSION["id"] = $pdo->lastInsertId();

?>