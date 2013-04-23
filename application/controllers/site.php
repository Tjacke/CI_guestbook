<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
           
    public function __construct() {
    parent::__construct();
    
     }
    
    public function index() {
        $this->home();           
    }
    
    public function pageMenu($a){
        $this->load->library('v_menu');
  	$menu = new v_menu;
  	return $menu->show_menu($a);
    }
   
    public function home(){
        $data['main_content'] = 'view_home';
        $data['menu'] = $this->pageMenu("home");
        $data['title'] = "Välkommen!";
        $data['valid'] = empty($a) ? "" : $a;
                
// Load View
     $this->load->view('includes/template', $data); 
    }    
    
    function about(){
        $data['main_content'] = 'view_about';
        $data['menu'] = $this->pageMenu($a = "about");
        $data['title'] = "Om oss!";
        
// Load view
        $this->load->view('includes/template', $data);
    }
}
