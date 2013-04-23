<?php if (!defined('BASEPATH')) exit ('No direct script access allowed'); ?>

<div id="left_col"><? $this->load->view('view_login'); ?></div>
    <div id="right_col">
        
    
        
        <?
        if($this->session->userdata('error')) {
            echo $this->session->userdata('error');
            $this->session->set_userdata('error');
        } else {
        
        
        echo '<h2>Du har inte loggat in!</h2>';
        echo '<p>';
        echo 'Är du inte medlem skapa ett användarkonto!';
        echo '</p>';
        echo '<p><a href="' .base_url() .'members/signup">Sign up</a></p>';
        }
        ?>
        
       
        
        
    <br />
   </div>  <!-- end right_col -->