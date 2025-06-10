<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action'] === "remove") {
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $index => $item) {
            if ($item['codigo'] == $_POST['codigo']) {
                unset($_SESSION["shopping_cart"][$index]);
                $status = "<div class='message-box error'>
                    O produto foi removido do carrinho com sucesso!
                </div>";
                break; 
            }
        }

        if (empty($_SESSION["shopping_cart"])) {
            unset($_SESSION["shopping_cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action']=="change"){
    foreach($_SESSION["shopping_cart"] as &$value){
        if($value['codigo'] === $_POST["codigo"]){
            $value['quantity'] = $_POST["quantity"];
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../images/Zé Livros.png">
    <title>MeuCarrinhoDeComprasLivrariaDoSeuZé.com.br</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111111;
            color: #fff;
            margin: 20px;
        }

        .cart {
            background-color: #000000;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ff6b00;
            box-shadow: 0 2px 4px #000000;
            height: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            color: #ff6b00;
        }

        .table {
            width: 1240px;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ff6b00;
        }

        .table th {
            background-color: #222222;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table img {
            height: 50px;
            width: 50px;
            vertical-align: middle;
            margin-right: 10px;
            border-radius: 4px;
        }

        .remove {
            background-color: #ff6b00;
            color: #000000;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .remove:hover {
            background-color: #ff7832;
        }

        .quantity {
            padding: 8px;
            border: 1px solid #ff6b00;
            border-radius: 4px;
            width: 60px;
            background-color: black;
            color: #ff6b00;
        }

        .total-price {
            text-align: right;
            font-size: 1.2em;
            font-weight: bold;
        }

        .empty-cart {
            text-align: center;
            padding: 20px;
            font-style: italic;
            animation: changeColor 0.5s infinite alternate;
        }

        .empty-cart a {
            color: #ff6b00;
        }

        .empty-cart a:hover {
            color: #ff7832;
        }

        .message-box {
            margin-top: 20px;
            padding: 15px;
            border-radius: 4px;
        }

        .message-box.success {
            background-color:rgb(0, 0, 0);
            color:rgb(0, 255, 60);
            border: 1px solid rgb(0, 255, 60);
        }

        .message-box.error {
            background-color:rgb(0, 0, 0);
            color:rgb(255, 0, 25);
            border: 1px solid rgb(255, 0, 25);
        }

        .cart-actions {
            margin-top: 20px;
            margin-bottom: 25px;
            text-align: right;
        }

        .button {
            background-color: #ff6b00;
            color: #000000;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }

        .button:hover {
            background-color: #ff7832;
        }

        @keyframes changeColor {
            0%   { color: rgb(108, 2, 170); }
            20%  { color: red; }
            40%  { color: orange; }
            60%  { color: yellow; }
            80%  { color: rgb(0, 255, 0); }
            100% { color: rgb(0, 238, 255); }
        }

    </style>
</head>
<body>

<div class="cart">
    
    <h1>MEU CARRINHO</h1>
    <?php
    if(isset($_SESSION["shopping_cart"])){
        $total_price = 0;
    ?>
    <table class="table">
        <thead>
        <tr>
            <th>Livro selecionado</th>
            <th>Título</th>
            <th>Quantidade</th>
            <th>Preço por unidade</th>
            <th>Total a pagar</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($_SESSION["shopping_cart"] as $book){
        ?>
        <tr>
            <td><img src='<?php echo "../images/books_images".$book['foto1']; ?>' alt="<?php echo $book["titulo"]; ?>" /></td>
            <td><?php echo $book["titulo"]; ?></td>
            <td>
                <form method='post' action=''>
                    <input type='hidden' name='codigo' value="<?php echo $book["codigo"]; ?>" />
                    <input type='hidden' name='action' value="change" />
                    <select name='quantity' class='quantity' onChange="this.form.submit()">
                        <option <?php if($book["quantity"]==1) echo "selected";?> value="1">1</option>
                        <option <?php if($book["quantity"]==2) echo "selected";?> value="2">2</option>
                        <option <?php if($book["quantity"]==3) echo "selected";?> value="3">3</option>
                        <option <?php if($book["quantity"]==4) echo "selected";?> value="4">4</option>
                        <option <?php if($book["quantity"]==5) echo "selected";?> value="5">5</option>
                    </select>
                </form>
            </td>
            <td><?php echo "R$".$book["preco"]; ?></td>
            <td><?php echo "R$".$book["preco"]*$book["quantity"]; ?></td>
            <td>
                <form method='post' action=''>
                    <input type='hidden' name='codigo' value="<?php echo $book["codigo"]; ?>" />
                    <input type='hidden' name='action' value="remove" />
                    <button type='submit' class='remove'>Remover</button>
                </form>
            </td>
        </tr>
        <?php
        $total_price += ($book["preco"]*$book["quantity"]);
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="total-price"><strong>TOTAL A PAGAR:</strong></td>
            <td class="total-price"><strong><?php echo "R$".$total_price; ?></strong></td>
            <td></td>
        </tr>
        </tfoot>
       <div class="cart-actions">
        <a href="home.php" class="button">Continuar Comprando</a>
        <button class="button" onclick="alert('Implementar Checkout!')">Finalizar Compra</button>

    </table>
    <?php
    } else {
        echo "<div class='empty-cart'><h3>Não tem nada aqui, por enquanto :)</h3><p><a href='./home.php'>Voltar para a Livraria do Seu Zé</a></p></div>";
    }
    ?>
</div>

<div class="message-box-container">
    <?php if($status != ""){
        echo $status;
    } ?>
</div>

</body>
</html>
