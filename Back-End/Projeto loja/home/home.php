<?php
session_start();
$connect = mysql_connect('localhost', 'root', ''); 
$db      = mysql_select_db('loja'); 

$status="";

if (isset($_POST['codigo']) && $_POST['codigo']!=""){
   $codigo = $_POST['codigo'];
   $resultado = mysql_query("SELECT descricao, preco, foto1 FROM produto WHERE codigo = '$codigo'");
   $row = mysql_fetch_assoc($resultado);
   $descricao = $row['descricao'];
   $preco = $row['preco'];
   $foto1 = $row['foto1'];

   $cartArray = array($codigo=>array('descricao'=>$descricao, 'preco'=>$preco, 'quantity'=>1, 'foto'=>$foto1, 'codigo'=>$codigo));

   if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Produto foi add ao carrinho !</div>";
    }
    else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);

   if(in_array($codigo, $array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Produto foi adicionado ao carrinho!</div>";
    }
    else {
    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
    $status = "<div class='box'>Produto  foi add ao carrinho!</div>";
	}

	}
}
?>

<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title> Zé roupas.com.br | Roupas de qualidade para toda a família!</title>
    <link rel="icon" href="../images/Zé.png">
</head>
<body id="bodyHome">
    <div class="page">
        <div id="line">
                <h5>Época de luta corpo a corpo com os peixes! 40% off em botas impermeáveis!</h5>
        </div>
        <div class="header">
            <div class="box">
                <div class="image">
                    <img src="../images/Zé vestimentas!.png" alt="Erro ao carregar a imagem =(" class="img">
                </div>
                <div class="title2">
                    <h1>Zé roupas</h1>
                </div>
                <div class="cart">
                <?php
                    if(!empty($_SESSION["shopping_cart"])) {
                        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>
                    <div class="cart_div">
                    <a href="./cart.php"><img src="../images/cart.png" height=50 width=50 alt="Erro!"/>Carrinho<span>
                    <?php echo $cart_count; ?></span></a>
                    </div>
                    <?php
                    }
                ?>                
                </div>
            </div>
            <div class="login">
                <h1><a href="../login/login.html">Login</a></h1>
            </div>
        </div>
        <div id="display">
            <div id="filter">
                <form name="form" method="post" action="home.php">
                    <div class="filter-options">
                        <div>
                            Categoria
                        </div>
                        <div>
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
                    </div>
                    <div class="filter-options">
                        <div>
                            Marca
                        </div>
                        <div>
                            <select name="brand" id="">
                                <option value="" selected="selected">Todas as marcas</option>
                                <?php
                                    $query = mysql_query("SELECT codigo, nome FROM marca");
                                    while ($brands = mysql_fetch_array($query)) { ?>
                                        <option value="<?php echo $brands['codigo']; ?>">
                                            <?php echo $brands['nome']; ?>
                                        </option>
                                    <?php }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="filter-options">
                        <div>
                            Tipo
                        </div>
                        <div>
                            <select name="type" id="">
                                <option value="" selected="selected">Todos os tipos</option>
                                <?php
                                    $query = mysql_query("SELECT codigo, nome FROM tipo");
                                    while ($types = mysql_fetch_array($query)) { ?>
                                        <option value="<?php echo $types['codigo']; ?>">
                                            <?php echo $types['nome']; ?>
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
            <div id="products">
                <?php

                $brands     = !empty($_POST['brand'])     ? $_POST['brand']     : '';
                $categories = !empty($_POST['category'])  ? $_POST['category']  : '';
                $types      = !empty($_POST['type'])      ? $_POST['type']      : '';

                $sql_products = "
                    SELECT p.codigo, p.descricao, p.cor, p.tamanho, p.preco, p.foto1, p.foto2
                    FROM produto p
                    JOIN marca    m ON p.codmarca     = m.codigo
                    JOIN categoria c ON p.codcategoria = c.codigo
                    JOIN tipo     t ON p.codtipo      = t.codigo
                    WHERE 1=1
                ";
                if ($brands     !== '')    $sql_products .= " AND m.codigo = " . intval($brands);
                if ($categories !== '')    $sql_products .= " AND c.codigo = " . intval($categories);
                if ($types      !== '')    $sql_products .= " AND t.codigo = " . intval($types);

                $select_products = mysql_query($sql_products);

                if (mysql_num_rows($select_products) == 0) {
                    echo '<h1>Desculpe, mas sua busca não retornou resultados.</h1>';
                } else {
                    echo "<div class='products-rows'>";
                    while ($data = mysql_fetch_object($select_products)) {
                        echo "<div class='items'>";
                        echo "<form method='post' action='home.php'>";
                            echo "<input type='hidden' name='codigo' value='" . htmlspecialchars($data->codigo) . "' />";
                            echo "<div>";
                            echo "<img src='../images/products_images/" . htmlspecialchars($data->foto1) . "' class='products-images'/>";
                            echo "</div>";
                            echo "<div class='product-info'>";
                            echo "<p>Descrição: " . htmlspecialchars($data->descricao) . "</p>";
                            echo "<p>Cor: "       . htmlspecialchars($data->cor)       . "</p>";
                            echo "<p>Tamanho: "   . htmlspecialchars($data->tamanho)   . "</p>";
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