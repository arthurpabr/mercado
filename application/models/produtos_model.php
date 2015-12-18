<?php 
class Produtos_model extends CI_Model {
 
    public function salva($produto){
        $this->db->insert("produtos",$produto);
    }
    
    public function buscaTodos() {
        //return $this->db->get("produtos")->result_array();
        return $this->db->get_where("produtos",array(
            "vendido" =>0
        ))->result_array();
    }
    
    public function busca($id){
        return $this->db->get_where("produtos",array(
            "id" =>$id
        ))->row_array();
    }
    
    public function buscaVendidos($usuario){
        $id_usuario = $usuario["id"];
        $this->db->select("produtos.*, vendas.data_de_entrega");
        $this->db->from("produtos");
        $this->db->join("vendas", "vendas.produto_id = produtos.id");
        $this->db->where("vendido", 1);
        $this->db->where("usuario_id", $id_usuario);
        return $this->db->get()->result_array();
    }
    
}