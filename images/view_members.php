<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="left_col"><? $this->load->view('view_login'); ?></div>
<div id="right_col">
    <h1>Välkommen!</h1>
    
    <p> <?
        if ($this->session->userdata('error')) {
            echo $this->session->userdata('error');
            $this->session->set_userdata('error');
        }
        ?> </p>

    <?
   echo '<pre>';
   print_r($this->session->all_userdata());
   echo '</pre>';
    ?> 
    <p>Textflöde...</p>
       
    <p><a href='<? echo base_url() . "members/logout" ?>'>Logga ut</a></p>
	
	
	
    <br />
</div>  <!-- end right_col -->