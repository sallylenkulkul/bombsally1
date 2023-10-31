<?php
    include("conecta.php");

    $nome  = $_POST["nome"];
    $cpf   = $_POST["cpf"];
    $sexo  = $_POST["sexo"];
    $sexo  = $_POST["sexo"];
    $idade = $_POST["idade"];
    $hospital  = $_POST["hospital"];
    $acomp     = $_POST["acomp"];
    $idade_acomp = $_POST["idade_acomp"];
    $local = $_POST["local"];
    $data = $_POST["data"];


    $comando = $pdo->prepare("INSERT INTO ficha_paciente VALUES('$NomePaciente',$CPF, '$Sexo', $Telefone, $IdadePaciente, '$NomeHospital',
    '$NomeAcomp', '$IdadeAcomp', '$LocalOcorrencia', '$DataOcorrencia' )VALUES (:NomePaciente, :CPF, :Sexo, :Telefone, :IdadePaciente, :NomeHospital, :NomeAcomp, :IdadeAcomp, :LocalOcorrencia, :DataOcorrencia)" );
    $resultado = $comando->execute();

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }


    // Para voltar no formulário:
    header("Location: paciente.html");


?>