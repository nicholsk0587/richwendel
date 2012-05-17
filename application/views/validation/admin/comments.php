<?php
$this->form_validation->set_rules('author_name', 'Author', 'trim|required|xss_clean');
$this->form_validation->set_rules('author_email', 'Email', 'trim|required|xxs_clean|valid_email');
$this->form_validation->set_rules('body', 'Body', 'trim|required|xxs_clean');
$this->form_validation->set_rules('blog_id', 'Blog ID', 'required');
?>