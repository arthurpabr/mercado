<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
    
class Produtos extends CI_Controller {
    
    public function index(){
        
        //$this->output->enable_profiler(TRUE);
        
        $this->load->model("produtos_model");
        $produtos = $this->produtos_model->buscaTodos();
        
        $dados = array("produtos" => $produtos);
        $this->load->helper(array("currency"));
        $this->load->view("produtos/index.php", $dados);
    }
    
    public function formulario(){
        $this->load->view("produtos/formulario");
    }
    
     public function novo(){
        $usuario_logado = $this->session->userdata("usuario_logado");
        $produto = array(
            "nome" => $this->input->post("nome"),
            "preco" => $this->input->post("preco"),
            "descricao" => $this->input->post("descricao"),
            "usuario_id" => $usuario_logado["id"]
        );
        $this->load->model("produtos_model");
        $this->produtos_model->salva($produto);
        $this->session->set_flashdata("sucess", "Produto salvo com sucesso!");
        redirect("/");
    }
}