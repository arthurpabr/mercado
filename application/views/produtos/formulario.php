<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
</head>
<body>
    <div class="container">
    <h1>Cadastro de novo produto</h1>
        <?php
            echo form_open("produtos/novo");

            echo form_label("Nome", "nome");
            echo form_input(array(
                "name" => "nome",
                "id" => "nome",
                "class" => "form-control",
                "maxlenght" => "255"
            ));

            echo form_label("Preço", "preco");
            echo form_input(array(
                "name" => "preco",
                "id" => "preco",
                "class" => "form-control",
                "maxlenght" => "255",
                "type" => "number"
            ));
            
            echo form_label("Descrição", "descricao");
            echo form_textarea(array(
                "name" => "descricao",
                "id" => "descricao",
                "class" => "form-control"        
            ));

            echo form_button(array(
                "class" => "btn btn-primary",
                "content" => "Cadastrar",
                "type" => "submit"
            ));

            echo form_close();
        ?>
    </div>
</body>
</html>