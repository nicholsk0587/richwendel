<?php
$this->form_validation->set_rules('title', 'Title', 'trim|required|xxs_clean');
$this->form_validation->set_rules('description', 'Description', 'trim|xxs_clean');
?>