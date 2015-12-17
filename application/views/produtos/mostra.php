<html>
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">        
    </head>
    <body>
        <div>
            <h1><?=$produto["nome"]?></h1>
            <p><?=$produto["preco"]?></p>
            <p><?= auto_typography(html_escape($produto["descricao"]))?></p>
        </div>
    </body>
</html>