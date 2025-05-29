<?php

$conectar = mysql_connect("localhost", "root", "");
$banco    = mysql_select_db("livraria");

if (isset($_POST['gravar'])) {
    $nome   = $_POST['nome'];
    $pais   = $_POST['pais'];

    $sql = "insert into autor(nome, pais) values('$nome', '$pais')";

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
    $pais   = $_POST['pais'];

    $sql = "update autor set nome = '$nome', pais = '$pais' where codigo = '$codigo'";

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
    $pais   = $_POST['pais'];

    $sql = "delete from autor where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "Dados excluídos com sucesso!";
    } else {
        echo "Erro ao excluir os dados no banco!";
    }
}

if (isset($_POST['pesquisar'])) {
    $sql = "SELECT * FROM autor";

    $resultado = mysql_query($sql);

    echo "<h3>Autores cadastrados: </h3>";

    echo "<table border=1>
      <tr><td>Codigo</td><td>Nome</td><td>Pais</td></tr>";

    while ($dados = mysql_fetch_array($resultado)) {
        echo "
           <tr>
            <td>" . $dados['codigo'] . "</td>
            <td>" . $dados['nome'] . "</td>
            <td>" . $dados['pais'] . "</td>
           </tr>";
    }
    echo "</table>";
}
?>