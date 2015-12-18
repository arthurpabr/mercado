<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendas extends CI_Controller {

    public function nova() {
        $usuario = autoriza();
        $this->load->helper("date");
        $venda = array(
            "produto_id" => $this->input->post("produto_id"),
            "comprador_id" => $usuario["id"],
            "data_de_entrega" =>
            dataPtBrParaMysql($this->input->post("data_de_entrega"))
        );
        $this->load->model(array("vendas_model","produtos_model","usuarios_model"));
        $this->vendas_model->salva($venda);
        
        $this->load->library("email");
        $config["protocol"] = "smtp";
        $config["smtp_host"] = "smtp.gmail.com";
        $config["smtp_user"] = "cursocakephp@gmail.com";
        $config["smtp_pass"] = "x5c2bgwj";
        $config["smtp_port"] = "496";
        $config["charset"] = "utf-8";
        $config["mailtype"] = "html";
        $config["newline"] = "\r\n";
        $this->email->initialize($config);
        
        $produtoVendido = $this->produtos_model->busca($venda["produto_id"]);
        $usuarioVendedor = $this->usuarios_model->busca($produtoVendido["usuario_id"]);
        
        $this->email->from("codeigniteralura@gmail.com", "Sistema Mercado");
        $this->email->to($usuarioVendedor["email"]);
        $this->email->subject("Seu produto {$produtoVendido["nome"]} foi vendido!");
        
        $dados = array("produto" => $produtoVendido);
        $conteudo = $this->load->template("vendas/email.php", $dados, TRUE);
        
        $this->email->message($conteudo);
        $this->email->send();
        
        $this->session->set_flashdata("sucess", "Pedido de compra efetuado com sucesso");
        redirect("/");
    }

    public function index() {
        $usuario = autoriza();
        $this->load->model("produtos_model");
        $produtosVendidos = $this->produtos_model->buscaVendidos($usuario);
        $dados = array("produtosVendidos" => $produtosVendidos);

        $this->load->helper(array("currency", "date"));
        $this->load->template("vendas/index.php", $dados);
    }

}
