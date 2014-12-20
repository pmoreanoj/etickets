<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class etickets extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('model_category', "categorias");
        
        $this->data = $this->session->userdata('logged_in');
        
        $this->data['categorias'] = $this->categorias->lister( );
     }

    public function index() {
        $contenido['contenido'] = "index.php";
        $contenido['data'] = $this->data;
        $this->load->view("template/_layout.php", $contenido);
    }

    public function nosotros() {
        $contenido['contenido'] = "aboutus.php";
        $contenido['data'] = $this->data;
        $this->load->view("template/_layout.php", $contenido);
    }

    public function contacto() {
        $contenido['contenido'] = "contact.php";
        $contenido['data'] = $this->data;
        $this->load->view("template/_layout.php", $contenido);
    }

    public function login() {
        $contenido['contenido'] = "login.php";
        $contenido['data'] = $this->data;
        $this->load->view("template/_layout.php", $contenido);
    }

    public function socios() {
        $contenido['contenido'] = "partners.php";
        $contenido['data'] = $this->data;
        $this->load->view("template/_layout.php", $contenido);
    }

    public function condiciones() {
        $contenido['contenido'] = "terms_conditions.php";
        $contenido['data'] = $this->data;
        $this->load->view("template/_layout.php", $contenido);
    }

    public function shop() {
        $contenido['contenido'] = "shoppingcart.php";
        $contenido['data'] = $this->data;
        $this->load->view("template/_layout.php", $contenido);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */