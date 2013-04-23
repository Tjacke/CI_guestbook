<h3>Registrerade Medlemmar:</h3>
<h3>32 st</h3>

<div id="login">


    <?
    if ($this->session->userdata('is_logged_in')) {

        echo '<a href="' . base_url() . 'members/logout">Logga ut</a>';
    } else {

        echo form_open('members/login_validation');
        echo '<br />E-Post:';
        echo form_input('email', $this->input->post('email'));
        echo '<br />Lösen:';
        echo form_password('password', 'password');
        echo '<br />';
        echo form_submit('login_submit', 'Logga in');
        echo validation_errors();
        echo form_close();
    }
    ?>

</div> <!-- end login -->


