<div>
    <h1><?= $produto["nome"] ?></h1>
    <p><?= $produto["preco"] ?></p>
    <p><?= auto_typography(html_escape($produto["descricao"])) ?></p>
</div>


<h2>Compre agora mesmo!</h2>
<?php
echo form_open("vendas/nova");

echo form_hidden("produto_id", $produto["id"]);

echo form_label("Data de Entrega", "data_de_entrega");
echo form_input(array(
    "name" => "data_de_entrega",
    "id" => "data_de_entrega",
    "class" => "form-control",
    "maxlenght" => "255",
    "value" => set_value("data_de_entrega", "")
));
echo form_error("data_de_entrega");

echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Comprar",
    "type" => "submit"
));

echo form_close();
?>
