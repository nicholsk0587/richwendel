<?php
$this->form_validation->set_rules('title', 'Title', 'trim|required|xxs_clean');
$this->form_validation->set_rules('author', 'Author', 'trim|required|xxs_clean');
$this->form_validation->set_rules('body', 'Body', 'trim|required|xxs_clean');
$this->form_validation->set_rules('published_date', 'published_date', 'trim|required|xxs_clean');
?>