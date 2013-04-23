<?php if (!defined('BASEPATH')) exit ('No direct script access allowed'); ?>
<div id="left_col"><p>Sponsorer...</p></div>
<div id="right_col">
    
        <h2>Skapa ett användar konto!</h2>
    
        <?
        echo form_open('members/signup_validation');
        echo '<p>E-Post:';
        echo form_input('email', $this->input->post('email'));
        echo '</p>';
        
        echo '<p>Lösen:';
        echo form_password('password');
        echo '</p>';
        
        echo '<p>Bekräfta Lösen:';
        echo form_password('cpassword');
        echo '</p>';
        echo '<p>';
        echo form_submit('signup_submit','Registrera');
        echo '</p>';
        
       echo validation_errors();
        
        ?>
</div> <!-- End right_col -->