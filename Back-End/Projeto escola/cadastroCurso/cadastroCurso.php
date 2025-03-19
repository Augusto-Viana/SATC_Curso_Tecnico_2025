<?php

//Conexão com DB
$conectar = mysql_connect("localhost", "root", "");
$banco    = mysql_select_db("escola");

//Verificar a opção usuario (botão)
if (isset($_POST['gravar'])) {
    //Capturar as variáveis HTML
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $coordenador  = $_POST['coordenador'];

    //Comando SQL para gravar no banco
    $sql = "insert into curso(codigo, nome, coordenador) values('$codigo', '$nome', '$coordenador')";

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
    $coordenador  = $_POST['coordenador'];

    //Comando SQL para gravar no banco
    $sql = "update curso set nome = '$nome', coordenador = '$coordenador' where codigo = '$codigo'";

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
    $coordenador  = $_POST['coordenador'];

    //Comando SQL para gravar no banco
    $sql = "delete from curso where codigo = '$codigo'";

    //Comando PHP para executar SQL no banco
    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "Dados excluídos com sucesso!";
    } else {
        echo "Erro ao excluir os dados no banco!";
    }
}

if (isset($_POST['pesquisar'])) {
    //Capturar as variáveis HTML
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $coordenador  = $_POST['coordenador'];

    //Comando SQL para gravar no banco
    $sql = "select from curso where codigo = '$codigo'";

    //Comando PHP para executar SQL no banco
    $resultado = mysql_query($sql);

    echo "<h3>Cursos cadastrados:</h3>";

    echo "<tableborder=1>
<tr><td>Codigo</td><td>Curso</td></td><td>Coordenador</td></tr>";

    while ($dados = mysql_fecth_array($resultado)) {
        echo "
     <tr>
        <td>" . $dados['codigo'] . "</td>
        <td>" . $dados['nome'] . "</td>
        <td>" . $dados['coordenador'] . "</td>
    </tr>";
    }

    echo "</table>";
}
?>