<?php

include("conecta.php");
// Para pegar o texto dos inputs:
$cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$senha = isset($_POST["senha"]) ? md5($_POST["senha"]) : "";
$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
$telefone = isset($_POST["telefone"]) ? $_POST["telefone"] : "";
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";


if (isset($_POST["inserir"])) {

    $comando = $pdo->prepare("INSERT INTO cadastro_bombeiro VALUES (\"$cpf\", \"$email\", \"$senha\", \"$nome\", \"$telefone\", \"$usuario\")");
    $resultado = $comando->execute();
    header("Location: index.php");

}
if (isset($_POST["excluir"])) {

    $comando = $pdo->prepare("DELETE FROM cadastro_bombeiro WHERE cpf=\"$cpf\"");
    $resultado = $comando->execute();
    
    header("Location: index.php");

}

if (isset($_GET["alterar"])) {
    // Recupera os valores do formulário
    $cpfAntigo = $_GET["cpfAntigo"];
    $novoCpf = $_GET["novoCpf"];
    $email = $_GET["email"];
    $senha = $_GET["senha"];
    $nome = $_GET["nome"];
    $telefone = $_GET["telefone"];
    $usuario = $_GET["usuario"];

    // Atualiza os dados no banco de dados
    $comando = $pdo->prepare("UPDATE cadastro_bombeiro SET nome=?, senha=?, cpf=?, email=?, telefone=?, usuario=? WHERE cpf=?");
    $resultado = $comando->execute([$nome, $senha, $novoCpf, $email, $telefone, $usuario, $cpfAntigo]);

    // Verifica se a atualização foi bem-sucedida
    if ($resultado) {
        echo "Atualização bem-sucedida.";
    } else {
        echo "Erro ao atualizar os dados.";
    }
}


try {
    $pdo = new PDO("mysql:host=localhost;dbname=bombeirosbank", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Verifica se o formulário foi enviado com um filtro
if (isset($_GET["listar"])) {
    $filtro = isset($_GET["nome"]) ? $_GET["nome"] : '';
    


    // Use o valor de $filtro na sua consulta SQL
    $comando = $pdo->prepare("SELECT * FROM cadastro_bombeiro WHERE nome LIKE :filtro");
    $comando->execute([':filtro' => "%$filtro%"]);

    

    $dados = []; // Inicializa um array para armazenar os dados.

    while ($linha = $comando->fetch(PDO::FETCH_ASSOC)) {
        // Dentro do loop, você pode adicionar cada linha ao array $dados.
        $dados[] = $linha;
    }

    // Exibir os dados brutos em JSON com formatação personalizada
    $json_texto = json_encode($dados, JSON_PRETTY_PRINT);
    
    // Adiciona uma quebra de linha após cada fechamento de chave
    $json_texto = str_replace('}', "}\n", $json_texto);

    echo $json_texto;
}
        

       
    


?>