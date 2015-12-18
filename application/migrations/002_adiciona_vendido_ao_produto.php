<?php
class Migration_Adiciona_Vendido_ao_Produto extends CI_Migration {
    
    public function up(){
        $this->dbforge->add_column('produtos', array(
            'vendido' => array(
                'type' => 'boolean',
                'default' => '0'
            )
        ));
        
    }
    
    public function down(){
        $this->dbforge->drop_column('produtos', 'vendido');
    }
    
}