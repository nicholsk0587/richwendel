<?php
    $this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email|xss_clean');
?>