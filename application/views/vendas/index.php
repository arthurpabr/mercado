<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
</head>
<body>
    <div class="container">
        
        <h1>Minhas Vendas</h1>
        <table class="table">
        <?php foreach($produtosVendidos as $produto){ ?>
            <tr>
                <td><?=$produto["nome"]?></td>
                <td><?= character_limiter($produto["descricao"],10)?></td>
                <td><?= numeroEmReais($produto["preco"])?></td>
                <td><?= dataMysqlParaPtBr($produto["data_de_entrega"])?></td>
            </tr>
        <?php } ?>
        </table>        
    </div>
</body>
</html>