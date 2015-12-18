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