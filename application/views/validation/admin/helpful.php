<?php
$this->form_validation->set_rules('title', 'Title', 'trim|required|xxs_clean');
$this->form_validation->set_rules('url', 'Url', 'trim|required|xxs_clean');
?>