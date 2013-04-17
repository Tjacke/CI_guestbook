<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo "$css"?>">

</head>
<div id="container">
    <h1><?php echo $title; ?></h1>
 
    <? echo $menu; ?>
  
   
<? $this->load->helper(array('form','url')); ?>
<? echo anchor('site/deleteAll', "Ta bort alla poster"); ?>
 <p>
<? echo validation_errors(); ?>
<? echo form_open('site/insertValues'); ?>
<? echo $guest		.' <br /> '.form_input($fguest, set_value('guest')); ?></br>
<? echo $message	.' <br /> '.form_textarea($fmessage, set_value('message')); ?></br>
<? echo form_submit('mysubmit','Submit!');  ?>
<? echo form_close(); ?>  
 </p>
<p> 
   <?php 
  
   foreach($result as $row){
       echo '<div class="gb_mess">';
       echo $row->guest . "<br />"; echo $row->date . "<br />";
       echo $row->message . "<br />";
       echo anchor('site/deleteValue/'.$row->id, 'Delete');
       echo "</div><br />";
  }
   
   ?>
   </p>
   
</div>
<? echo $footer; ?>
</body>
</html>