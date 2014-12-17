<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
    
	    $this->load->database();
		$this->load->library( 'template' );
		$this->load->helper( 'url' );

        $this->rootUser = 'root';
        $this->rootPass = 'root';

        // Quick logged in test, if check() recieves true, then it redirects to the index page
		$this->load->model( 'model_auth' );
                $this->load->model( 'User_Model', 'user');
		$this->template->assign( 'logged_in', $this->model_auth->check( FALSE ) );
	}

	function index( $error = FALSE )
	{
        if( $error )
        {
            $this->template->assign( 'error', TRUE );
        }
        $this->template->assign( 'template', 'form_login' );
        $this->template->display( 'frame_admin.tpl' );
    }


    /**
     *  Validate login
     */
    function validate()
    {
        $user = $this->input->post( 'user' );
        $pass = $this->input->post( 'pass' ); 
        
        $data = $this->user->login( $user, $pass );
        
        if( isset( $data )  ) //log correcto
        {
            $this->model_auth->login( array( 'valid' => 'yes' ) );
            if( $data['role_id'] == $this->user->getAdminRole( ) )
            {
                redirect( base_url() . '/dashboard' );
            }
            else
            {
                redirect( base_url() );
            }
            die();
        }
        else
        {
            $this->model_auth->login( array('valid' => 'no') );
            $this->index( TRUE );
        }
    }


	function logout()
	{
        $this->model_auth->logout();
        redirect( base_url() . '/login' );
    }
}
