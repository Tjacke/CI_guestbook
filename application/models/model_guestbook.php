<?php

class get_db extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    function getAll(){
        if($this->db->table_exists('guestbook') ){
            $query = $this->db->query("SELECT * FROM guestbook ORDER BY id DESC");
            return $query->result();
        }else{
            
        return $noTable = null;
        
        }
    }
    
    function insert($data){
        $this->db->insert("guestbook", $data);
    }
       
    function update($data){
        $this->db->update("guestbook", $data, "id = 2");
    }
    
    function delete($data){
        $this->db->delete("guestbook", $data);
    }
    
    function emptyTable($table){
        $this->db->empty_table($table);        
    }
    function doTable(){
        $this->load->dbforge();
        $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'guest' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '32',
                ),
                'message' => array(
                    'type' => 'TEXT',
                ),
                 'date' => array(
                    'type' => 'DATETIME',
                ),
            );
         
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('guestbook');        
    }
    
}