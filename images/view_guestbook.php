<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div id="guestbook">

<?
    if($result === null) {
    echo "Tabel saknas!<br />";
    echo anchor('guestbook/createTable', "Skapa en tabell till gästboken"); 
    } else { 
?>
    
<? echo form_open('guestbook/insertValues'); ?>
<? echo form_label($guest, $fguest) . form_input($fguest, set_value('guest')); ?>
<? echo '<div class="form_error">' . form_error('guest') . '</div>'; ?>
<? echo form_label($message, $fmessage) . form_textarea($fmessage, set_value('message'), 'class="textarea"'); ?>
<? echo '<div class="form_error">' . form_error('message') . '</div>'; ?>
<? echo form_submit('mysubmit','Posta!');  ?>
<? echo anchor('guestbook/deleteAll', "Ta bort alla poster"); ?>
<? echo form_close(); ?>  
</div> <!-- End guestbook -->

<div id="guestbook_message">
<?
  foreach($result as $row){
       echo '<div class="gb_mess">';
       echo '<b>' . $row->guest . "</b> - "; echo $row->date . "<br /><hr />";
       echo $row->message . "<br />";
       echo anchor('guestbook/deleteValue/'.$row->id, 'Delete');
       echo "</div><br />";
  }
} //end if
?>

</div> <!-- End guestbook_message -->