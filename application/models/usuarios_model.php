<?php
class Usuarios_model extends CI_Model {
    
    public function salva($usuario){
        $this->db->insert("usuarios",$usuario);
    }
    
    public function buscarPorEmailESenha($email, $senha){
        $this->db->where("email", $email);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("usuarios")->row_array();
        return $usuario;
    }
    
     public function busca($id){
        return $this->db->get_where("usuarios",array(
            "id" =>$id
        ))->row_array();
    }
}