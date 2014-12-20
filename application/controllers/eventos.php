<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class eventos extends CI_Controller {

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
     
     public function categoria()
     {
        $this->load->model('model_event', "eventos");
        $this->data['eventos'] = $this->eventos->listerCategory( $this->input->get('id') );
        
        
        $contenido['contenido'] = 'categoria.php';
        $contenido['data'] = $this->data;
        $this->load->view("template/_layout.php", $contenido);
     }
     
     public function evento( )
     {
        $this->load->model('model_event', "eventos");
        $this->load->model('model_place', "lugares");
        $this->load->model('model_place_has_section', "place_has_section");
        $this->load->model('model_section', "secciones");
        $this->eventos->raw_data = TRUE;
        $evento = $this->eventos->get($this->input->get('id'));
        $placeID = $evento['placeID'];
        
        $this->lugares->raw_data = TRUE;
        $lugar = $this->lugares->get($placeID);
        
        $this->place_has_section->raw_data = TRUE;
        $sectionsArray = $this->place_has_section->listerPlaceID($placeID);
        
        $sections = array();
        
        foreach( $sectionsArray as $sectionArray )
        {
            $section = $this->secciones->get($sectionArray['sectionID']);
            array_push( $sections, $section );
        }
        
        $this->data['lugar'] = $lugar;
        $this->data['secciones'] = $sections;
        $this->data['evento'] = $evento;
        
        $contenido['contenido'] = 'evento.php';
        $contenido['data']      = $this->data;
        
        $this->load->view('template/_layout.php', $contenido);
        
     }
     

}