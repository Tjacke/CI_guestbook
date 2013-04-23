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
   // echo '<pre>';
   // print_r($this->session->all_userdata());
   // echo '</pre>';
    ?> 
    <p>Vision Njurunda är i en uppbyggnadsfas.</p>
    <p>Innom kort kommer du kunna engagera dig i lokala frågor, projek och händelser nära dig. 
        Vi kommer skicka ut mail till dig om viktiga lokala händelse som berör oss.</p>
    <p>Tills vidare önskar vi att du läser om vad vi vill åstadkomma och gillar du vårt koncept så be dina vänner
    att registrera sig på sidan.</p>
    <p>Tillsamman är vi starka!</p>
   
    <p><a href='<? echo base_url() . "members/logout" ?>'>Logga ut</a></p>

    <br />
</div>  <!-- end right_col -->