<?php
session_start();
$connect = mysql_connect('localhost', 'root', ''); 
$db      = mysql_select_db('livraria'); 

$status="";

if (isset($_POST['codigo']) && $_POST['codigo'] != ""){
   $codigo    = $_POST['codigo'];
   $resultado = mysql_query("SELECT titulo, paginas, ano, preco, foto1 FROM livro WHERE codigo = '$codigo'");
   $row       = mysql_fetch_assoc($resultado);
   $titulo    = $row['titulo'];
   $paginas   = $row['paginas'];
   $ano       = $row['ano'];
   $preco     = $row['preco'];
   $foto1     = $row['foto1'];

   $cartArray = array($codigo=>array('titulo' => $titulo, 'paginas' => $paginas, 'ano' => $ano ,'preco' =>$preco, 'quantity'=>1, 'foto'=>$foto1, 'codigo'=>$codigo));

   if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>O livro foi adicionado ao carrinho!</div>";
    }
    else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);

   if(in_array($codigo, $array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Este livro já está no carrinho!</div>";
    }
    else {
    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
    $status = "<div class='box'>Este livro foi adicionado ao carrinho!</div>";
	}

	}
}
?>

<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title> LivrariaDoSeuZé.com.br | Conhecimento e entreterimento de todos os tipos ao seu dispor!</title>
    <link rel="icon" href="../images/Zé Livros.png">
</head>
<body id="bodyHome">
    <div class="page">
        <div id="line">
                <h5>DESCONTO ZÉPICO!!! Livros SELECIONADOS da categoria mistério em 80% off!</h5>
        </div>
        <div class="header">
            <div class="box">
                <div class="image">
                    <img src="../images/Livraria do Seu Zé.png" alt="Erro ao carregar a imagem =(" class="img">
                </div>
                <div class="cart">
                <?php
                    if(!empty($_SESSION["shopping_cart"])) {
                        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>
                    <div class="cart_div">
                    <a href="./cart.php"><img src="" height=50 width=50 alt="Erro!"/>Carrinho<span>
                    <?php echo $cart_count; ?></span></a>
                    </div>
                    <?php
                    }
                ?>                
                </div>
            </div>
            <div class="login">
                <a href="../login/login.html">Login</a>
            </div>
        </div>
        <div id="display">
            <div class="filter">
                <form name="form" method="post" action="home.php">
                    <div class="filters">
                        <div class="filter-options">
                            <select name="category" id="">
                                <option value="" selected="selected">Todas as categorias</option>
                                <?php
                                    $query = mysql_query("SELECT codigo, nome FROM categoria");
                                    while ($categories = mysql_fetch_array($query)) { ?>
                                        <option value="<?php echo $categories['codigo']; ?>">
                                            <?php echo $categories['nome']; ?>
                                        </option>
                                    <?php }
                                    ?>
                            </select>
                        </div>
                        <div class="filter-options">
                            <select name="author" id="">
                                <option value="" selected="selected">Todas os autores</option>
                                <?php
                                    $query = mysql_query("SELECT codigo, nome FROM autor");
                                    while ($authors = mysql_fetch_array($query)) { ?>
                                        <option value="<?php echo $authors['codigo']; ?>">
                                            <?php echo $authors['nome'];?>
                                        </option>
                                    <?php }
                                    ?>
                            </select>
                        </div>
                        <div class="filter-options">
                            <select name="country" id="">
                                <option value="" selected="selected">Todos os países</option>
                                <?php
                                    $query = mysql_query("SELECT DISTINCT codigo, pais FROM autor ORDER BY pais");
                                    while ($countries = mysql_fetch_array($query)) { ?>
                                        <option value="<?php echo $countries['pais']; ?>">
                                            <?php echo $countries['pais'];?>
                                        </option>
                                    <?php }
                                    ?>
                            </select>
                        </div>
                        <div class="filter-options">
                            <select name="publisher" id="">
                                <option value="" selected="selected">Todas as editoras</option>
                                <?php
                                    $query = mysql_query("SELECT codigo, nome FROM editora");
                                    while ($publishers = mysql_fetch_array($query)) { ?>
                                        <option value="<?php echo $publishers['codigo']; ?>">
                                            <?php echo $publishers['nome']; ?>
                                        </option>
                                    <?php }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="search">
                        <input type="submit" name="search" value="PESQUISAR">                        
                    </div>
                </form>
            </div>
            <div class="books">
                <?php

                $authors    = !empty($_POST['author'])     ? $_POST['author']     : '';
                $countries  = !empty($_POST['country'])    ? $_POST['country']    : '';
                $categories = !empty($_POST['category'])   ? $_POST['category']   : '';
                $publishers = !empty($_POST['publisher'])  ? $_POST['publisher']  : '';

                $sql_books= "
                    SELECT l.codigo, l.titulo, l.paginas, l.ano, l.preco, l.foto1, l.foto2
                    FROM livro l
                    JOIN categoria c ON l.codcategoria = c.codigo
                    JOIN autor     a ON l.codautor     = a.codigo
                    JOIN editora   e ON l.codeditora      = e.codigo
                    WHERE 1=1
                ";
                if ($authors    !== '') $sql_books .= " AND a.codigo = " . intval($authors);
                if ($countries  !== '') $sql_books .= " AND a.pais   = " . intval($countries);
                if ($categories !== '') $sql_books .= " AND c.codigo = " . intval($categories);
                if ($publishers !== '') $sql_books .= " AND e.codigo = " . intval($publishers);

                $select_books = mysql_query($sql_books);

                if (mysql_num_rows($select_books) == 0) {
                    echo '<h1>Desculpe, mas sua busca não retornou resultados.</h1>';
                } else {
                    echo "<div class='products-rows'>";
                    while ($data = mysql_fetch_object($select_books)) {
                        echo "<div class='items'>";
                        echo "<form method='post' action='home.php'>";
                            echo "<input type='hidden' name='codigo' value='" . htmlspecialchars($data->codigo) . "' />";
                            echo "<div>";
                            echo "<img src='../images/books_images/" . htmlspecialchars($data->foto1) . "' class='products-images'/>";
                            echo "</div>";
                            echo "<div class='product-info'>";
                            echo "<p>Título: " . htmlspecialchars($data->titulo) . "</p>";
                            echo "<p>Páginas: "       . htmlspecialchars($data->paginas)       . "</p>";
                            echo "<p>Ano: "   . htmlspecialchars($data->ano)   . "</p>";
                            echo "<p>Preço R$: "  . number_format($data->preco,2,',','.') . "</p>";
                            echo "<div class='button-info'>";
                                echo "<button type='submit' class='buy'>COMPRAR</button>";
                            echo "</div>";
                            echo "</div>";
                        echo "</form>";
                        echo "</div>";
                    }
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>