<?php

//Conexão com DB
$conectar = mysql_connect("localhost", "root", "");
$banco    = mysql_select_db("escola");

//Verificar a opção usuario (botão)
if (isset($_POST['gravar'])) {
    //Capturar as variáveis HTML
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $fone  = $_POST['fone'];
    $codcurso = $_POST['codcurso'];

    //Comando SQL para gravar no banco
    $sql = "insert into aluno(codigo, nome, fone, codcurso) values('$codigo', '$nome', '$fone', '$codcurso')";

    //Comando PHP para executar SQL no banco
    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "Dados gravados com sucesso!";
    } else {
        echo "Erro ao gravar os dados no banco!";
    }
}

if (isset($_POST['alterar'])) {
    //Capturar as variáveis HTML
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $fone   = $_POST['fone'];
    $codcurso  = $_POST['codcurso'];

    //Comando SQL para gravar no banco
    $sql = "update aluno set nome = '$nome', fone = '$fone', codcurso = '$codcurso' where codigo = '$codigo'";

    //Comando PHP para executar SQL no banco
    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "Dados alterados com sucesso!";
    } else {
        echo "Erro ao alterar os dados no banco!";
    }
}

if (isset($_POST['excluir'])) {
    //Capturar as variáveis HTML
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $fone   = $_POST['fone'];
    $codcurso  = $_POST['codcurso'];

    //Comando SQL para gravar no banco
    $sql = "delete from aluno where codigo = '$codigo'";

    //Comando PHP para executar SQL no banco
    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "Dados excluídos com sucesso!";
    } else {
        echo "Erro ao excluir os dados no banco!";
    }
}

if (isset($_POST['pesquisar'])) {
    $sql = "SELECT * FROM aluno";

    $resultado = mysql_query($sql);

    echo "<h3>Cursos cadastrados: </h3>";

    echo "<table border=1>
      <tr><td>Codigo</td><td>Nome</td><td>Fone</td><td>Codcurso</td></tr>";

    while ($dados = mysql_fetch_array($resultado)) {
        echo "
           <tr>
            <td>" . $dados['codigo'] . "</td>
            <td>" . $dados['nome'] . "</td>
            <td>" . $dados['fone'] . "</td>
            <td>" . $dados['codcurso'] . "</td>
           </tr>";
    }
    echo "</table>";
}
?>