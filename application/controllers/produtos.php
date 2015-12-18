<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
    
class Produtos extends CI_Controller {
    
    public function index(){
        //$this->output->enable_profiler(TRUE);
        $this->load->model("produtos_model");
        $this->load->helper(array("currency"));
        $produtos = $this->produtos_model->buscaTodos();
        $dados = array("produtos" => $produtos);
        $this->load->view("produtos/index.php", $dados);
    }
    
    public function formulario(){
        $this->load->view("produtos/formulario");
    }
    
     public function novo(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("nome", "nome", "required|min_length[5]|max_length[100]|callback_nao_tenha_a_palavra_produto");
        $this->form_validation->set_rules("preco", "preco", "required");
        $this->form_validation->set_rules("descricao", "descricao", "trim|required|min_length[10]");
        
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
        
        $sucesso = $this->form_validation->run();
         
        if($sucesso){
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
            
        } else {
            $this->load->view("produtos/formulario");
        }
    }
    
    public function nao_tenha_a_palavra_produto($str) {
        $posicao = strpos($str, 'produto');
        if($posicao == FALSE){
            return TRUE;
            
        } else {
            $this->form_validation->set_message("nao_tenha_a_palavra_produto","O campo %s não pode conter a palavra 'produto'"); 
            return FALSE;
        }
    }


    public function mostra($id){
        $this->load->model("produtos_model");
        $this->load->helper("typography");
        $produto = $this->produtos_model->busca($id);
        $dados = array("produto" => $produto);
        $this->load->view("produtos/mostra",$dados);
    }
}