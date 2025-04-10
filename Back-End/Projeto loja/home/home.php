<?php
$connect = mysql_connect('localhost', 'root', ''); 
$db      = mysql_select_db('loja'); 
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
            <div id="box">
                <div class="image">
                    <img src="../images/Zé vestimentas!.png" alt="Erro ao carregar a imagem =(" class="img">
                </div>
                <div id="title2">
                    <h1>Zé roupas</h1>
                </div>
            </div>
            <div id="login">
                <h1><a href="../login/login.html">Login</a></h1>
            </div>
        </div>
        <div id="display">
            <div id="filter">
                <div class="filter-options">
                    <div>
                        Categoria
                    </div>
                    <div>
                        <select name="category" id="">
                            <option value="text" selected="selected">Todas as categorias</option>
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
                            <option value="text" selected="selected">Todas as marcas</option>
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
                            <option value="text" selected="selected">Todos os tipos</option>
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
            </div>
            <div id="products">
            <?php
                if (!isset($_POST['search'])) {
                    $sql_produtos = "SELECT descricao, cor, tamanho, preco, foto1 FROM produto ORDER BY codigo DESC LIMIT 8";
                    $result = mysql_query($sql_produtos);

                    if (mysql_num_rows($result) > 0) {
                        echo "<div class='produtos-container'>";
                        while ($dados = mysql_fetch_array($result)) {
                            echo "<div class='produto-item'>";
                            echo "<div>";
                            echo "<img src='../images/products_images/" . htmlspecialchars($dados['foto1']) . "' alt='Imagem 1' class='imagem-produto' />";
                            echo "</div>";
                            echo "<div class='produto-info'>";
                            echo "<p>Descrição: " . htmlspecialchars($dados['descricao']) . "</p>";
                            echo "<p>Cor: " . htmlspecialchars($dados['cor']) . "</p>";
                            echo "<p>Tamanho: " . htmlspecialchars($dados['tamanho']) . "</p>";
                            echo "<p>Preço R$: " . number_format($dados['preco'], 2, ',', '.') . "</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</div>";
                    } else {
                        echo "<h1>Nenhum produto disponível.</h1>";
                    }
                }
                ?>


                <?php
                if (isset($_POST['pesquisar'])) {
                    // Pegando os filtros
                    $brands         = (empty($_POST['marca'])) ? 'null' : $_POST['marca'];
                    $categories     = (empty($_POST['categoria'])) ? 'null' : $_POST['categoria'];
                    $types = (empty($_POST['tipo'])) ? 'null' : $_POST['tipo'];

                    // Construindo a consulta de produtos com base nos filtros
                    $sql_produtos = "SELECT produto.descricao, produto.cor, produto.tamanho, produto.preco, produto.foto1, produto.foto2
                                    FROM produto, marca, categoria, tipo
                                    WHERE produto.codmarca = marca.codigo
                                    AND produto.codcategoria = categoria.codigo
                                    AND produto.codtipo = tipo.codigo";

                    // Adicionando filtros à consulta
                    if ($brands != 'null') {
                        $sql_produtos .= " AND marca.codigo = $brands";
                    }

                    if ($categories != 'null') {
                        $sql_produtos .= " AND categoria.codigo = $categories";
                    }

                    if ($types != 'null') {
                        $sql_produtos .= " AND tipo.codigo = $types";
                    }

                    // Executando a consulta
                    $seleciona_produtos = mysql_query($sql_produtos);

                    // Verificando se a consulta retornou resultados
                    if (mysql_num_rows($seleciona_produtos) == 0) {
                        echo '<h1>Desculpe, mas sua busca não retornou resultados.</h1>';
                    } else {
                        echo "<div class='produtos-container'>";
                        while ($dados = mysql_fetch_object($seleciona_produtos)) {
                            echo "<div class='produto-item'>";
                            echo "<div>";
                            echo "<img src='../imgs/imagensProdutos/" . htmlspecialchars($dados->foto1) . "' alt='Imagem 1' class='imagem-produto' />";
                            echo "</div>"; // .imagens
                            echo "<div class='produto-info'>";
                            echo "<p>Descrição: " . htmlspecialchars($dados->descricao) . "</p>";
                            echo "<p>Cor: " . htmlspecialchars($dados->cor) . "</p>";
                            echo "<p>Tamanho: " . htmlspecialchars($dados->tamanho) . "</p>";
                            echo "<p> Preço R$: " . number_format($dados->preco, 2, ',', '.') . "</p>";
                            echo "</div>"; // .produto-info
                            echo "</div>"; // .produto-item
                        }
                        echo "</div>"; // .produtos-container
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>