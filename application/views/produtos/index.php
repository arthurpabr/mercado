<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
</head>
<body>
    <div class="container">
        
        <?php if($this->session->flashdata("sucess")) : ?>
        <p class="alert alert-success"><?= $this->session->flashdata("sucess") ?></p>
        <?php endif ?>
        
        <?php if($this->session->flashdata("danger")) : ?>
        <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
        <?php endif ?>
        
        <h1>Produtos</h1>
        <table class="table">
        <?php foreach($produtos as $produto){ 
            //if($produto["vendido"] == 0){    
        ?>
            <tr>
                <td>
                    <?=anchor("produtos/".$produto["id"], $produto["nome"])?>
                </td>
                <td><?= character_limiter($produto["descricao"],10)?></td>
                <td><?= numeroEmReais($produto["preco"])?></td>
            </tr>
        <?php 
            //} 
        }?>
        </table>
        
        <?php if($this->session->userdata("usuario_logado")) : ?>
        
            <?= anchor('produtos/formulario', 'Incluir novo produto', array('class' => 'btn btn-primary')) ?>
            <?= anchor('login/logout', 'Sair do sistema', array('class' => 'btn btn-primary')) ?>

        <?php else : ?>
        <h1>Login</h1>
        <?php
            echo form_open("login/autenticar");
            echo form_label("Email", "email");
            echo form_input(array(
                "name" => "email",
                "id" => "email",
                "class" => "form-control",
                "maxlenght" => "255"
            ));

            echo form_label("Senha", "senha");
            echo form_password(array(
                "name" => "senha",
                "id" => "senha",
                "class" => "form-control",
                "maxlenght" => "255"
            ));

            echo form_button(array(
                "class" => "btn btn-primary",
                "content" => "Login",
                "type" => "submit"
            ));

            echo form_close();
        ?>
        
        <h1>Cadastro</h1>
        <?php
            echo form_open("usuarios/novo");
            echo form_label("Nome", "nome");
            echo form_input(array(
                "name" => "nome",
                "id" => "nome",
                "class" => "form-control",
                "maxlenght" => "255"
            ));

            echo form_label("Email", "email");
            echo form_input(array(
                "name" => "email",
                "id" => "email",
                "class" => "form-control",
                "maxlenght" => "255"
            ));

            echo form_label("Senha", "senha");
            echo form_password(array(
                "name" => "senha",
                "id" => "senha",
                "class" => "form-control",
                "maxlenght" => "255"
            ));

            echo form_button(array(
                "class" => "btn btn-primary",
                "content" => "Cadastrar",
                "type" => "submit"
            ));

            echo form_close();
        ?>
        <?php endif; ?>
        
    </div>
</body>
</html>