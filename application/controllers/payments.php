<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class payments extends CI_Controller {

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

        $this->data = $this->session->userdata('logged_in');
        $this->logged_in = $this->data['valid'];
        $this->name = $this->data['name'];
        $this->role_id = $this->data['role_id'];
        $this->load->model('model_category', "categorias");
        
        $this->data['categorias'] = $this->categorias->lister( );
    }

    public function success() {
        if (!isset($_GET['tx'])){
            return fail();
        }
        
        $tx = $_GET['tx'];

        $request = curl_init();

        curl_setopt_array($request, array
            (
            CURLOPT_URL => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => http_build_query(array
                (
                'cmd' => '_notify-synch',
                'tx' => $tx,
                'at' => 'Ds3punjblX1ILNKSzXJHEcQ3ITxo3DVPZ-i4d5fSPjSJugpzlDXSUsbtPcO',
            )),
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HEADER => FALSE,
            CURLOPT_SSL_VERIFYPEER => TRUE
        ));

        $response = curl_exec($request);
        $status = curl_getinfo($request, CURLINFO_HTTP_CODE);
        curl_close($request);
        
        $aResponse = $this->sortResponse( $response );
        
        $this->data['response']['first-name'] = $aResponse['first_name'];
        $this->data['response']['last-name'] = $aResponse['last_name'];
        $this->data['response']['item-name'] = $aResponse['item_name'];
        $this->data['response']['amount'] = $aResponse['payment_gross'];
        
        $contenido['contenido'] = 'success.php';
        $contenido['data'] = $this->data;
        $this->load->view("template/_layout.php", $contenido);
    }

    private function sortResponse($response) {
        $response = substr($response, 7);

        $response = urldecode($response);

        preg_match_all('/^([^=\s]++)=(.*+)/m', $response, $m, PREG_PATTERN_ORDER);
        $response = array_combine($m[1], $m[2]);

        if (isset($response['charset']) AND strtoupper($response['charset']) !== 'UTF-8') {
            foreach ($response as $key => &$value) {
                $value = mb_convert_encoding($value, 'UTF-8', $response['charset']);
            }
            $response['charset_original'] = $response['charset'];
            $response['charset'] = 'UTF-8';

            ksort($response);
            return $response;
        }
        return NULL;
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */    