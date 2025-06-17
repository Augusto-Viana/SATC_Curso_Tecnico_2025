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
<body class="bodyHome">
    <div class="page">
        <div class="line">
                <h5>DESCONTO ZÉPICO!!! Livros SELECIONADOS da categoria mistério em 80% off!</h5>
        </div>
        <div class="header">
            <div class="cart">
                <?php
                    $cart_count = 0;
                    if(!empty($_SESSION["shopping_cart"])) {
                        $cart_count = count($_SESSION["shopping_cart"]);
                    }
                ?>
                <div class="cart_div">
                    <a href="./cart.php">
                        <img src="../images/cartO.png" height=50 width=50 alt="Erro!"/>Carrinho
                        <span><?php echo $cart_count; ?></span>
                    </a>
                </div>              
            </div>
                <div class="image">
                    <img src="../images/Livraria do Seu Zé.png" alt="Erro ao carregar a imagem =(" class="img">
                </div>
            <div class="login">
                <a href="../login/login.html">Login</a>
            </div>
        </div>
        <div class="display">
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
                                    $query = mysql_query("SELECT DISTINCT pais FROM autor WHERE pais != '' ORDER BY pais");
                                    while ($countries = mysql_fetch_array($query)) { ?>
                                        <option value="<?php echo $countries['pais']; ?>">
                                            <?php echo htmlspecialchars($countries['pais']);?>
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
                <div class="banner">
                    <div class="slide fade">
                        <img src="../images/banner1.png" alt="Imagem 1">
                    </div>
                    <div class="slide fade">
                        <img src="../images/banner2.png" alt="Imagem 2">
                    </div>
                    <div class="slide fade">
                        <img src="../images/banner3.png" alt="Imagem 3">
                    </div>
                </div>
            </div>
            <div class="books">
                <?php

                $authors    = !empty($_POST['author'])     ? $_POST['author']     : '';
                $countries  = !empty($_POST['country'])    ? $_POST['country']    : '';
                $categories = !empty($_POST['category'])   ? $_POST['category']   : '';
                $publishers = !empty($_POST['publisher'])  ? $_POST['publisher']  : '';

                $filter = array_filter(array(
                    'author'    => $authors,
                    'country'   => $countries,
                    'category'  => $categories,
                    'publisher' => $publishers
                ));

                $sql_books= "
                    SELECT l.codigo, l.titulo, l.paginas, l.ano, l.preco, l.foto1, l.foto2, a.nome AS autor, e.nome AS editora, c.nome AS categoria, a.pais AS pais
                    FROM livro l
                    JOIN categoria c ON l.codcategoria = c.codigo
                    JOIN autor     a ON l.codautor     = a.codigo
                    JOIN editora   e ON l.codeditora      = e.codigo
                    WHERE 1=1
                ";

                if ($authors !== '') {
                    $sql_books .= " AND a.codigo = " . intval($authors);
                    $filter++;
                }

                if ($countries !== '') {
                    $sql_books .= " AND a.pais = '" . mysql_real_escape_string($countries) . "'";
                    $filter++;
                }

                if ($categories !== '') {
                    $sql_books .= " AND c.codigo = " . intval($categories);
                    $filter++;
                }

                if ($publishers !== '') {
                    $sql_books .= " AND e.codigo = " . intval($publishers);
                    $filter++;
                }

                if ($filter > 0) {
                    $select_books = mysql_query($sql_books);
                } else {
                    $select_books = mysql_query("
                        SELECT l.codigo, l.titulo, l.paginas, l.ano, l.preco, l.foto1, l.foto2
                        FROM livro l
                        JOIN categoria c ON l.codcategoria = c.codigo
                        JOIN autor     a ON l.codautor     = a.codigo
                        JOIN editora   e ON l.codeditora   = e.codigo
                    ");
                }
                if (mysql_num_rows($select_books) == 0) {
                    echo '<h1>Desculpe, mas sua busca não retornou resultados.</h1>';
                } else {
                    echo "<div class='books-rows'>";
                    while ($data = mysql_fetch_object($select_books)) {
                        echo "<div class='items'>";
                        echo "<form method='post' action='home.php'>";
                            echo "<input type='hidden' name='codigo' value='" . htmlspecialchars($data->codigo) . "' />";
                            echo "<div>";
                            echo "<img src='../images/books_images/" . htmlspecialchars($data->foto1) . "' class='books-images'/>";
                            echo "</div>";
                            echo "<div class='books-info'>";
                            echo "<p>Título: " . htmlspecialchars($data->titulo) . "</p>";
                            echo "<p>Autor(a): " . htmlspecialchars($data->autor) . "</p>";
                            echo "<p>País: " . htmlspecialchars($data->pais) . "</p>";
                            echo "<p>Categoria: " . htmlspecialchars($data->categoria) . "</p>";
                            echo "<p>Editora: " . htmlspecialchars($data->editora) . "</p>";
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

<script>
    let selectedSlide = 0;
    showSlides();

    function showSlides() {
        const slide = document.getElementsByClassName("slide");
        for (let i = 0; i < slide.length; i++) {
            slide[i].style.display = "none";
        }

        selectedSlide++;
        if (selectedSlide > slide.length) { 
            selectedSlide = 1 
        }

        slide[selectedSlide - 1].style.display = "block";
        setTimeout(showSlides, 5000); 
    }

    function changeSlide(n) {
        selectedSlide += n - 1;
        const slide = document.getElementsByClassName("slide");
        if (selectedSlide > slide.length) selectedSlide = 1;
        if (selectedSlide < 1) selectedSlide = slide.length;
        for (let i = 0; i < slide.length; i++) {
            slide[i].style.display = "none";
        }
        slide[selectedSlide - 1].style.display = "block";
    }
</script>

</html>