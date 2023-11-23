<?php 
session_start();
$FK_IdOcorrencia = 18;//$_SESSION["id"];

include("conecta.php");

$comando = $pdo->prepare("SELECT * FROM carimbo where FK_IdOcorrencia = $FK_IdOcorrencia");
$resultado = $comando->execute();
$galeria = "";
while( $linhas = $comando->fetch() )
{
    $dados_imagem = $linhas["arquivo"];
    $i = base64_encode($dados_imagem);

    $id =  $linhas["id"];
    $arquivo =  $linhas["arquivo"];
    $galeria .="<img src='data:image/jpeg;base64,$i' width='100px'> <br> <br> ";
   
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="carimbo.css">
    <title>Carimbo</title>
</head>

<body>
    <div class="cabecalho">
        <img src="menu.png" width="350px" class="menu">
    </div>

    <div class="titulo">
        Profissional da Saúde <br>Receptor - Carimbo CR
    </div>

    <div class="profile3">
        <div class="selecao">
            <div class="galeria" id="galeria">
                <?php echo($galeria); ?>
            </div>

            <h3>Importe a foto do carimbo aqui</h3>

            <div id="image-container" class="img">
            </div>
            <form action="salvar_imagem.php" method="post" enctype="multipart/form-data">
                <input type="file" id="image-input" name="arquivo" accept="image/.jpeg" class="envimg"><br>
                <br>
                <div class="botao">
                    <button type="submit" class="prox">Gravar</button>
                </div>
                <br><br>
                <br>
        <button href="../menu/menu.html" class="prox"> Voltar para Menu</button>
            </form>


        </div>
        <br>



    </div>
</body>



</html>