<?php
        // ATENÇÃO: o tipo da coluna na tabela deve ser MEDIUMBLOB
        include("conecta3.php");

        $id_foto = $_POST["id_foto"];
        $arquivo = $_POST["arquivo"];

        // Lê o conteúdo do arquivo de imagem e armazena na variável $imagem
		$imagem = file_get_contents($_FILES["foto"]["tmp_name"]);
		
		$comando = $pdo->prepare("UPDATE INTO fotos_acidente(id_foto,arquivo) VALUES(:id_foto,:arquivo)");
        $comando->bindParam(":id_foto", $id_foto);
        $comando->bindParam(":arquivo", $arquivo, PDO::PARAM_LOB);
		$resultado = $comando->execute();
        
        // As linhas abaixo você usará sempre que quiser mostrar a imagem

        $comando = $pdo->prepare("SELECT * FROM alunos");
		$resultado = $comando->execute();
        while( $linhas = $comando->fetch() )
        {
            $dados_imagem = $linhas["foto"];
            $i = base64_encode($dados_imagem);

            $id_foto =  $linhas["id_foto"];
            $arquivo =  $linhas["arquivo"];

            echo("ID_FOTO: $id_foto ARQUIVO: $arquivo  <br>");
            echo(" <img src='data:image/jpeg;base64,$i' width='100px'> <br> <br> ");
        }
		
?>
