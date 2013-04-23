<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Guestbook extends CI_Controller {
          
    public function __construct() {
    parent::__construct();
           
     }
     public function index() {
        $this->guestbook();           
    }
    public function pageMenu($a){
        $this->load->library('v_menu');
  	$menu = new v_menu;
  	return $menu->show_menu($a);
    }
 
   function home(){
        $data['main_content'] = 'view_guestbook';
        $data['menu'] = $this->pageMenu($a = "guestbook");
        $data['title'] = "Gästboken!";
        
// Form input
        $data['guest'] = 'Gäst';
        $data['message'] = 'Meddelande';
        $data['fguest'] = array('name' => 'guest');
        $data['fmessage'] = array('name' => 'message',
            'rows'  => 4);
        
// Load Model
        $data['result'] = $this->model_guestbook->getAll();
        
// Load View
        $this->load->view('includes/template', $data);
    }
    
    function insertValues(){
        $this->load->library('form_validation');
        $newRow = $data = array(
            
        'guest'         => $this->input->post('guest'),
        'message'       => $this->input->post('message'),
        'date'          => date("Y-m-d H:i:s")     
              
        );
        $this->form_validation->set_rules('guest', 'Gäst', 'required|trim|xss_clean');
        $this->form_validation->set_rules('message', 'Meddelande', 'required|trim');
        
        if($this->form_validation->run() === TRUE){
            $this->model_guestbook->insert($newRow);
            redirect('/guestbook/home/', 'refresh');
            
        }else {
            $this->home();
        }
    }
    
    function updateValues(){
        $newRow = array(
            
        );   
        
        $this->model_guestbook->update($newRow);
       
    }
    
    function deleteValue($id){
        $oldRow = array(
            "id" => $id
        );
        
        $this->model_guestbook->delete($oldRow);
        $this->home();;
    }
    
    function deleteAll(){
        $oldRow = "guestbook";
        $this->model_guestbook->emptyTable($oldRow);
        $this->home();
    }
    
    public function createTable(){
        $this->model_guestbook->doTable();
        $this->home();
        
    }
}
