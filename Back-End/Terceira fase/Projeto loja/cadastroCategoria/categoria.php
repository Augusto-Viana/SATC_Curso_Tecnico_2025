<?php

$conectar = mysql_connect("localhost", "root", "");
$banco    = mysql_select_db("loja");

if (isset($_POST['gravar'])) {
    $nome   = $_POST['nome'];

    $sql = "insert into categoria(nome) values('$nome')";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "Dados gravados com sucesso!";
    } else {
        echo "Erro ao gravar os dados no banco!";
    }
}

if (isset($_POST['alterar'])) {
    $codigo =  $_POST['codigo'];
    $nome   = $_POST['nome'];

    $sql = "update categoria set nome = '$nome' where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "Dados alterados com sucesso!";
    } else {
        echo "Erro ao alterar os dados no banco!";
    }
}

if (isset($_POST['excluir'])) {
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];

    $sql = "delete from categoria where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "Dados excluídos com sucesso!";
    } else {
        echo "Erro ao excluir os dados no banco!";
    }
}

if (isset($_POST['pesquisar'])) {
    $sql = "SELECT * FROM categoria";

    $resultado = mysql_query($sql);

    echo "<h3>Categorias cadastradas: </h3>";

    echo "<table border=1>
      <tr><td>Codigo</td><td>Nome</td><td>Fone</td><td>Codcurso</td></tr>";

    while ($dados = mysql_fetch_array($resultado)) {
        echo "
           <tr>
            <td>" . $dados['codigo'] . "</td>
            <td>" . $dados['nome'] . "</td>
           </tr>";
    }
    echo "</table>";
}
?>