<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {
          
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
        
        $data['menu'] = $this->pageMenu($a = "members");
        $data['title'] = "Medlemssida!";
        
        if($this->session->userdata('is_logged_in')){
                   
        $data['main_content'] = 'view_members';
        // Load View
        $this->load->view('includes/template', $data);
    } else {
        $data['main_content'] = 'view_restricted';
        // Load View
        $this->load->view('includes/template', $data);
    }
    }
    
    
    public function login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-Post', 'required|trim|xss_clean|callback_validate_credentials');
        $this->form_validation->set_rules('password', 'Lösen', 'required|md5|trim');
        
        if($this->form_validation->run()){
            $data = array(
                'email' => $this->input->post('email'),
                'is_logged_in' => 1
            );
                
            $this->session->set_userdata($data);
            redirect("/members/home/");
        } else {
          // Load View
          $this->home();
        }
    } 
    
    public function validate_credentials(){
        
        if($this->model_users->can_login()){
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials', 'Felaktigt 
                lösenord/E-Post.');
            return false;
        }
    }
    public function signup(){
        
            $data['menu'] = $this->pageMenu($a = "members");
            $data['title'] = "Registrering!";
            $data['main_content'] = 'view_signup';
            // Load View
            $this->load->view('includes/template', $data);
    }
    
    public function signup_validation(){
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-Post', 
                'required|trim|valid_email|is_unique[users.email]');
                
        $this->form_validation->set_rules('password', 'Lösen', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Bekräfta Lösen', 'required|trim|matches[password]');
        
        $this->form_validation->set_message('is_unique','E-Postadressen används redan.');
        
        if($this->form_validation->run()) {
            //tjacke@hotmail.com
            //generate a random key
            $key = md5(uniqid());
            $this->load->library('email',array('mailtype'=>'html'));
            $this->load->model('model_users');
            
            $this->email->from('info@visionnjurunda.se', "Bekräftelse - Vision Njurunda");
            $this->email->to($this->input->post('email'));
            $this->email->subject("Bekräfta ditt konto.");
           
            $message = "<p>Tack för att du registrerar dig!</p>";
            $message .= "<p><a href='".base_url()."members/register_user/$key'>Klicka här</a> för att slutföra registreringen</p>";
                    
            $this->email->message($message);
            
            //send and email to the user
            if($this->model_users->add_temp_user($key)){
                if($this->email->send()){
                    $data = array(
                'error'         => '<h2>Tack!</h2><p>En bekräftelse är skickad till din E-Post.<br />Logga in på din mail för att slutföra registreringen.</p>'
                );
                $this->session->set_userdata($data);
                $this->home();
                
                } else { 
                $data = array(
                'error'         => '<h2>Något gick fel!</h2><p>Kunde inte skicka E-Posten, vänligen försök igen.</p>'
                );
                $this->session->set_userdata($data);
                $this->home();
                }
            } else {
                $data = array(
                'error'         => '<h2>Något gick fel!</h2><p>Problem med databasen. Vänligen försök igen.</p>'
                );
                $this->session->set_userdata($data);
                $this->home();
            }
                        
            //add temp_user to db
            
        } else {
            $this->signup();
        }
        
    }
    
    public function register_user($key) {
        $this->load->model('model_users');

        if ($this->model_users->is_key_valid($key)) {
            if ($newemail = $this->model_users->add_user($key)) {
                $data = array(
                'email'         => $newemail,
                'is_logged_in'  => 1,
                'error'         => '<h2>Tack för din registrering!</h2>'
                );
                $this->session->set_userdata($data);
                $this->home();
            } else {
                $data = array(
                'error'         => '<h2>Något gick fel!</h2><p>Registreringen misslyckades, vänligen försök igen!</p>'
                );
                $this->session->set_userdata($data);
                $this->home();
            }
        } else {
            $data = array(
                'error'         => '<h2>Något gick fel!</h2><p>Ogiltigt konto eller E-Post, Du kanske redan är registrerar.<br />Prova logga in eller registrera dig igen och logga in på din mail!</p>'
                );
                $this->session->set_userdata($data);
                $this->home();            
        }
    }

    public function logout(){
            $this->session->sess_destroy();
           
            $data['menu'] = $this->pageMenu($a = "members");
            $data['title'] = "Medlemssida!";
            $data['main_content'] = 'view_logout';
            // Load View
            $this->load->view('includes/template', $data);
        }
}
