<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
    
     public function __construct() {
     parent::__construct();
    
     }
    
    public function index() {
        $this->home();           
    }
    
    public function myMenu(){
        $this->load->library('MyMenu');
  	$menu = new MyMenu;
  	return $menu->show_menu();
    }
    
    public function header(){
        $base = base_url('application/css/');
        $css = $this->config->item('css');
        return "$base/$css";
    }
    
    public function footer(){
        $footer = "Copyright &copy " . date("Y") . " Vision";
       
        return "$footer";
    }
    
    public function home(){
        $this->load->helper('url');
        $data['css'] = $this->header();
        $data['footer'] = $this->footer();
        $data['title'] = "Välkommen!";
        $data['menu'] = $this->myMenu();
        
// Load View
        $this->load->view('view_home', $data);
    }    
    
    function about(){
        $this->load->helper('url');
        $data['css'] = $this->header();
        $data['footer'] = $this->footer();
        $data['menu'] = $this->myMenu();
        $data['title'] = "Om oss!";
        
// Load view
        $this->load->view('view_about', $data);
    }
    
    function getValues(){
        $this->load->helper('url');
        $data['css'] = $this->header();
        $data['menu'] = $this->myMenu();
        $data['footer'] = $this->footer();
        $data['title'] = "Gästboken!";
        
// Form input
        $data['guest'] = 'Gäst';
        $data['message'] = 'Meddelande';
        $data['fguest'] = array('name' => 'guest',
            'size' => 30
        );
        $data['fmessage'] = array('name' => 'message',
            'rows'  => 4,
            'cols'  => 30
        );
        
// Load Model
        $this->load->model("get_db");
        $data['result'] = $this->get_db->getAll();
        
// Load View
        $this->load->view("view_db", $data);
    }
    
    function insertValues(){
        $this->load->model("get_db");
        $this->load->helper('url');
        $this->load->library('form_validation');
        $newRow = $data = array(
            
        'guest'         => $this->input->post('guest'),
        'message'       => $this->input->post('message'),
        'date'          => date("Y-m-d H:i:s")     
              
        );
        $this->form_validation->set_rules('guest', 'Gäst', 'required|trim|xss_clean');
        $this->form_validation->set_rules('message', 'Meddelande', 'required|trim');
        
        if($this->form_validation->run() === TRUE){
            $this->get_db->insert($newRow);
            redirect('/site/getValues/', 'refresh');
            
        }else {
            $this->getValues();
            
        }
    }
    
    function updateValues(){
        $this->load->model("get_db");
        
        $newRow = array(
            
        );   
        
        $this->get_db->update($newRow);
       
    }
    
    function deleteValue($id){
        $this->load->helper('url');
        $this->load->model("get_db");
        $oldRow = array(
            "id" => $id
        );
        
        $this->get_db->delete($oldRow);
        redirect('/site/getValues/', 'refresh');
    }
    
    function deleteAll(){
        $this->load->helper('url');
        $this->load->model("get_db");
        $oldRow = "guestbook";
        $this->get_db->emptyTable($oldRow);
        redirect('/site/getValues/', 'refresh');
    }
    
    public function createTable(){
        $this->load->helper('url');
        $this->load->model("get_db");
        $this->get_db->doTable();
        redirect('/site/getValues/', 'refresh');
        
    }
}
