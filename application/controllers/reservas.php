<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reservas extends CI_Controller {

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
        $this->load->model('model_reservation', "reservas");
        $this->load->model('model_category', "categorias");

        $this->data = $this->session->userdata('logged_in');

        $this->data['categorias'] = $this->categorias->lister();
    }

    public function reserva() {

        $this->reservas->raw_data = TRUE;
        $reserva = $this->reservas->get($this->input->get('id'));

        $this->load->model('model_event', "eventos");

        $evento = $this->eventos->get($reserva['eventID']);

        $this->data['reserva'] = $reserva;
        $this->data['evento'] = $evento;

        $contenido['contenido'] = 'reserva.php';
        $contenido['data'] = $this->data;

        $this->load->view('template/_layout.php', $contenido);
    }

}
