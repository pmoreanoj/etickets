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

        $this->data['categorias'] = $this->categorias->lister();
    }

    public function success() {
        if (!isset($_GET['tx'])) {
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
                'at' => 'WX80QWpDozsx2BWtkMXs0IA7OZv1S3oiAgdVRJbw8mrN_xwOI6UjJEGof60',
            )),
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HEADER => FALSE,
            CURLOPT_SSL_VERIFYPEER => TRUE
        ));

        $response = curl_exec($request);
        $status = curl_getinfo($request, CURLINFO_HTTP_CODE);
        curl_close($request);

        $aResponse = $this->sortResponse($response);

        $this->data['response']['first-name'] = $aResponse['first_name'];
        $this->data['response']['last-name'] = $aResponse['last_name'];
        $this->data['response']['item-name'] = $aResponse['item_name'];
        $this->data['response']['amount'] = $aResponse['payment_gross'];
        $this->data['response']['transactionID'] = $aResponse['txn_id'];
        $this->data['response']['bank'] = 'paypal';
        $this->data['response']['localidad'] = $this->session->userdata('buyInfo');

        $eventInfo = $this->session->userdata('eventInfo');

        $this->data['response']['eventID'] = $eventInfo['currentID'];

        $this->crearReserva();

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

    public function buy() {
        $this->session->set_userdata('buyInfo', $this->input->post('localidad'));
    }

    private function crearReserva() {
        $this->load->model('model_reservation');
        
        $userInfo = $this->session->userdata('logged_in');
        $userID = $userInfo['user_id'];
        $data_post['bank'] = $this->data['response']['bank'];
        $data_post['userID'] = $userID;
        $data_post['eventID'] = $this->data['response']['eventID'];
        $data_post['date'] = time();
        $data_post['state'] = "DELIVERED";
        $data_post['more'] = $this->data['response']['localidad'];
        $data_post['confirmation'] = $this->data['response']['transactionID'];


        $insert_id = $this->model_reservation->insert($data_post);
        $this->data['response']['reserva'] = $insert_id;
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */    