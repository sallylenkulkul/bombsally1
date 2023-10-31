<?php

$nome  = $_POST["nome"]; // Campos "name" inseridos no <form>
$cpf       = $_POST["cpf"];
$sexo      = $_POST["sexo"];
$sexo  = $_POST["sexo"];
$idade = $_POST["idade"];
$hospital  = $_POST["hospital"];
$acomp     = $_POST["acomp"];
$idade_acomp    = $_POST["idade_acomp"];
$local = $_POST["local"];
$data = $_POST["data"];

$pacientes = [];  // Variável usada para guardar os dados acima no formato JSON.



// O trecho abaixo pode estar dentro de um WHILE para guardar a resposta de um SELECT por exemplo
// Neste exemplo estamos apenas devolvendo o que o usuário digitou no formulário
$resposta = 
      [
         "nome"  => $nome,
         "idade" => $idade,
         "sexo"  => $sexo
      ];

array_push($pacientes, $resposta);
// Até aqui ficaria dentro do WHILE.



// Ao sair do WHILE enviamos de volta para a função JavaScript no formato JSON:
$json_texto = json_encode(["pacientes" => $pacientes]);
echo($json_texto);  // Será retornado para dentro do "success" do arquivo index.html

?>