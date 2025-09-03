<?php

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
if (!$conectar) {
   die('Conexão falhou: ' . mysqli_connect_error());
}

if (isset($_POST['gravar'])) {
   $codigo = mysqli_real_escape_string($conectar, $_POST['codigo']);
   $titulo = mysqli_real_escape_string($conectar, $_POST['titulo']);
   $paginas = mysqli_real_escape_string($conectar, $_POST['paginas']);
   $ano = mysqli_real_escape_string($conectar, $_POST['ano']);
   $codautor = mysqli_real_escape_string($conectar, $_POST['codautor']);
   $codcategoria = mysqli_real_escape_string($conectar, $_POST['codcategoria']);
   $codeditora = mysqli_real_escape_string($conectar, $_POST['codeditora']);
   $resenha = mysqli_real_escape_string($conectar, $_POST['resenha']);
   $preco = mysqli_real_escape_string($conectar, $_POST['preco']);

   $diretorio = "../images/books_images/";

   $extensao1 = strtolower(pathinfo($_FILES['foto1']['name'], PATHINFO_EXTENSION));
   $extensao2 = strtolower(pathinfo($_FILES['foto2']['name'], PATHINFO_EXTENSION));

   $tipos_permitidos = array('jpg', 'jpeg', 'png', 'gif');

   if (in_array($extensao1, $tipos_permitidos) && in_array($extensao2, $tipos_permitidos)) {

      $capa1 = md5(time() . $_FILES['foto1']['name']) . '.' . $extensao1;
      $capa2 = md5(time() . $_FILES['foto2']['name']) . '.' . $extensao2;

      move_uploaded_file($_FILES['foto1']['tmp_name'], $diretorio . $capa1);
      move_uploaded_file($_FILES['foto2']['tmp_name'], $diretorio . $capa2);

      $sql = "INSERT INTO livro (codigo, titulo, paginas, ano, codautor, codcategoria, codeditora, resenha, preco, foto1, foto2)
                VALUES ('$codigo', '$titulo', '$paginas', '$ano', '$codautor', '$codcategoria', '$codeditora', '$resenha', '$preco', '$capa1', '$capa2')";

      if (mysqli_query($conectar, $sql)) {
         echo "Dados cadastrados com sucesso!";
      } else {
         echo "Erro: " . mysqli_error($conectar);
      }
   } else {
      echo "Por favor, envie imagens com extensões válidas (JPG, JPEG, PNG, GIF).";
   }
}

if (isset($_POST['excluir'])) {
   $codigo = mysqli_real_escape_string($conectar, $_POST['codigo']);

   $sql = "DELETE FROM livro WHERE codigo = '$codigo'";

   if (mysqli_query($conectar, $sql)) {
      echo 'Dados excluídos com sucesso!';
   } else {
      echo 'Erro ao excluir dados: ' . mysqli_error($conectar);
   }
}

if (isset($_POST['alterar'])) {
   $codigo = mysqli_real_escape_string($conectar, $_POST['codigo']);
   $resenha = mysqli_real_escape_string($conectar, $_POST['descricao']);
   $preco = mysqli_real_escape_string($conectar, $_POST['preco']);

   $sql = "UPDATE livro SET resenha = '$resenha', preco = '$preco' WHERE codigo = '$codigo'";

   if (mysqli_query($conectar, $sql)) {
      echo 'Dados alterados com sucesso.';
   } else {
      echo 'Erro ao alterar dados: ' . mysqli_error($conectar);
   }
}

if (isset($_POST['pesquisar'])) {
   $sql = mysqli_query($conectar, "SELECT codigo, titulo, paginas, ano, codautor, codcategoria, codeditora, resenha, preco, foto1, foto2 FROM livro");

   if (mysqli_num_rows($sql) == 0) {
      echo "Desculpe, mas sua pesquisa não retornou resultados.";
   } else {
      echo "<b>Livros Cadastrados:</b><br><br>";
      while ($dados = mysqli_fetch_object($sql)) {
         echo "Código    : " . $dados->codigo . "  ";
         echo "Título    : " . $dados->titulo . " ";
         echo "Páginas   : " . $dados->paginas . " ";
         echo "Ano       : " . $dados->ano . " ";
         echo "Autor     : " . $dados->codautor . "<br>";
         echo "Categoria : " . $dados->codcategoria . " ";
         echo "Editora   : " . $dados->codeditora . " ";
         echo "Resenha   : " . $dados->resenha . "<br>";
         echo "Preço     : " . $dados->preco . "<br>";
         echo '<img src="../images/books_images/' . $dados->foto1 . '" height="200" width="200" />' . "  ";
         echo '<img src="../images/books_images/' . $dados->foto2 . '" height="200" width="200" />' . "<br><br>  ";
      }
   }
}