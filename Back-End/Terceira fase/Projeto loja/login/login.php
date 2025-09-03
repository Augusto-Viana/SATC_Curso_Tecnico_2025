<?php

$conectar = mysql_connect("localhost", "root", "");
$banco    = mysql_select_db("escola");

if (isset($_POST['conectar'])) {

    $email = $_POST['email'];
    $senha   = $_POST['senha'];

    $sql = "select email, senha from usuario where email = '$email' and senha = '$senha'";

    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) == 0) {

        echo "<script language='javascript' type='text/javascript'>
        alert('Email e/ou senha incorretos');
        window.location.href='login.php';
        </script>";
    } else {
        setcookie('login', $login);
        header('Location:menu.html');
    }
}