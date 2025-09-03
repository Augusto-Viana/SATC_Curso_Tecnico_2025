<?php

$conectar = mysql_connect("localhost", "root", "");
$banco    = mysql_select_db("livraria");

if (isset($_POST['entrar'])) {

    $email = $_POST['email'];
    $senha   = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        echo "<script>
            alert('Por favor, preencha o email e a senha.');
            window.location.href='login.php';
        </script>";
        exit();
    }

    $sql = "select email, senha from usuario where email = '$email' and senha = '$senha'";

    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) == 0) {
        echo "<script language='javascript' type='text/javascript'>
            alert('Email e/ou senha incorretos');
            window.location.href='login.php';
        </script>";
        exit();
    } else {
        setcookie('login', $email);
        header('Location:../menu/menu.html');
        exit();
    }
}