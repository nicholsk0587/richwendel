<?php
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('from', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('subject', 'Subject', 'trim');
        $this->form_validation->set_rules('message', 'Message', 'trim');
?>