<?php

class get_db extends CI_Model{
    function getAll(){
        $query = $this->db->query("SELECT * FROM guestbook ORDER BY id DESC");
        return $query->result();
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
}