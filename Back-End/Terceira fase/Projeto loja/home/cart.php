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
    <link rel="icon" href="../images/Zé.png">
    <title>MeuCarrinhoDeComprasZéRoupas.com.br</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(255, 255, 255);
            color: #fff;
            margin: 20px;
        }

        .cart {
            background-color: rgb(0, 40, 240);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #fff;
        }

        .table th {
            background-color: rgb(0, 75, 240);
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
            background-color:rgb(255, 8, 0);
            color: white;
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
            background-color:rgb(170, 0, 0);
        }

        .quantity {
            padding: 8px;
            border: 1px solidrgb(255, 255, 255);
            border-radius: 4px;
            width: 60px;
            background-color: black;
            color: white;
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
            color: #fff;
        }

        .empty-cart a {
            color: white;
        }

        .empty-cart a:hover {
            color: black;
        }

        .message-box {
            margin-top: 20px;
            padding: 15px;
            border-radius: 4px;
        }

        .message-box.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #155724;
        }

        .message-box.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #721c24;
        }

        .cart-actions {
            margin-top: 20px;
            margin-bottom: 25px;
            text-align: right;
        }

        .button {
            background-color: #007bff;
            color: white;
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
            background-color: #0056b3;
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
            <th>Item</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Total</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($_SESSION["shopping_cart"] as $product){
        ?>
        <tr>
            <td><img src='<?php echo "../images/products-images".$product['foto1']; ?>' alt="<?php echo $product["descricao"]; ?>" /></td>
            <td><?php echo $product["descricao"]; ?></td>
            <td>
                <form method='post' action=''>
                    <input type='hidden' name='codigo' value="<?php echo $product["codigo"]; ?>" />
                    <input type='hidden' name='action' value="change" />
                    <select name='quantity' class='quantity' onChange="this.form.submit()">
                        <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
                        <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
                        <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
                        <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
                        <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
                    </select>
                </form>
            </td>
            <td><?php echo "R$".$product["preco"]; ?></td>
            <td><?php echo "R$".$product["preco"]*$product["quantity"]; ?></td>
            <td>
                <form method='post' action=''>
                    <input type='hidden' name='codigo' value="<?php echo $product["codigo"]; ?>" />
                    <input type='hidden' name='action' value="remove" />
                    <button type='submit' class='remove'>Remover</button>
                </form>
            </td>
        </tr>
        <?php
        $total_price += ($product["preco"]*$product["quantity"]);
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="total-price"><strong>TOTAL:</strong></td>
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
        echo "<div class='empty-cart'><h3>Não tem nada aqui, por enquanto :)</h3><p><a href='./home.php'>Voltar para a Zé Roupas</a></p></div>";
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
