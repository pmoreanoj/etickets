<?php
	$this->load->view("template/_header.php", $data); 
	$this->load->view($contenido, $data); 
	$this->load->view("template/_footer.php", $data); 
?>