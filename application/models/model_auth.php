<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_auth extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();

        $this->load->library('session');
        $this->load->model('User_Model', 'user');
    }

    /**
     *  Function check
     *  @return false / user data
     */
    function check($redirect = TRUE) {
        $udata = $this->session->userdata('logged_in');

        if ($udata['valid'] == 'yes') {
            return $udata;
        } else {
            if ($redirect) {
                redirect(base_url());
                die();
            }
            return FALSE;
        }
    }

    /**
     *  Function login
     *  Makes the user logged in, by updating the session     
     */
    function login($compData) {
        $this->session->set_userdata('logged_in', $compData);
    }

    /**
     *  Function logout
     *  Makes the user logged out, by updating the session     
     */
    function logout() {
        $data = array(
            'valid' => 'no',
            'uid' => FALSE,
            'name' => '',
            'role_id' => 0);

        $this->session->set_userdata('logged_in', $data);
    }

    function getUserRole() {
        $udata = $this->session->userdata('logged_in');
        return $udata['role_id'];
    }

    function getRole() {
        $role_id = $this->getUserRole();
        switch ($role_id) {
            case $this->user->getRoleID("admin"):
                return "admin";
            case $this->user->getRoleID("cliente"):
                return "cliente";
        }
    }

}

/* End of file model_auth.php */
/* Location: ./application/models/model_auth.php */