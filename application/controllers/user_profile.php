<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_profile extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_user_profile' ); 
		
		$this->load->helper( 'form' );
		$this->load->helper( 'language' ); 
		$this->load->helper( 'url' );
        $this->load->model( 'model_auth' );

        $this->logged_in = $this->model_auth->check( TRUE );
        $this->template->assign( 'logged_in', $this->logged_in );

		$this->lang->load( 'db_fields', 'english' ); // This is the language file
	}



    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function index( $page = 0 )
    {
        $this->model_user_profile->pagination( TRUE );
		$data_info = $this->model_user_profile->lister( $page );
        $fields = $this->model_user_profile->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_user_profile->pager );
		$this->template->assign( 'user_profile_fields', $fields );
		$this->template->assign( 'user_profile_data', $data_info );
        $this->template->assign( 'table_name', 'User_profile' );
        $this->template->assign( 'template', 'list_user_profile' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_user_profile->get( $id );
        $fields = $this->model_user_profile->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'user_profile_fields', $fields );
		$this->template->assign( 'user_profile_data', $data );
		$this->template->assign( 'table_name', 'User_profile' );
		$this->template->assign( 'template', 'show_user_profile' );
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A FROM, AND HANDLES SAVING IT
     */         
    function create( $id = false )
    {
		$this->load->library('form_validation');
        
		switch ( $_SERVER ['REQUEST_METHOD'] )
        {
            case 'GET':
                $fields = $this->model_user_profile->fields();
                $user_set = $this->model_user_profile->related_user();

                $this->template->assign( 'related_user', $user_set );

                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'user_profile_fields', $fields );
                $this->template->assign( 'metadata', $this->model_user_profile->metadata() );
        		$this->template->assign( 'table_name', 'User_profile' );
        		$this->template->assign( 'template', 'form_user_profile' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO user_profile table
             */
            case 'POST':
                $fields = $this->model_user_profile->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'userID', lang('userID'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'address', lang('address'), 'required|max_length[80]' );
				$this->form_validation->set_rules( 'city', lang('city'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'province', lang('province'), 'required|max_length[40]' );
				$this->form_validation->set_rules( 'zipcode', lang('zipcode'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'phone', lang('phone'), 'required|max_length[20]' );
				$this->form_validation->set_rules( 'celular', lang('celular'), 'required|max_length[20]' );

				$data_post['userID'] = $this->input->post( 'userID' );
				$data_post['address'] = $this->input->post( 'address' );
				$data_post['city'] = $this->input->post( 'city' );
				$data_post['province'] = $this->input->post( 'province' );
				$data_post['zipcode'] = $this->input->post( 'zipcode' );
				$data_post['phone'] = $this->input->post( 'phone' );
				$data_post['celular'] = $this->input->post( 'celular' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $user_set = $this->model_user_profile->related_user();

                    $this->template->assign( 'related_user', $user_set );

                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'user_profile_data', $data_post );
            		$this->template->assign( 'user_profile_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_user_profile->metadata() );
            		$this->template->assign( 'table_name', 'User_profile' );
            		$this->template->assign( 'template', 'form_user_profile' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_user_profile->insert( $data_post );
                    
					redirect( 'user_profile' );
                }
            break;
        }
    }



    /**
     *  DISPLAYS THE POPULATED FORM OF THE RECORD
     *  This method uses the same template as the create method
     */
    function edit( $id = false )
    {
        $this->load->library('form_validation');

        switch ( $_SERVER ['REQUEST_METHOD'] )
        {
            case 'GET':
                $this->model_user_profile->raw_data = TRUE;
        		$data = $this->model_user_profile->get( $id );
                $fields = $this->model_user_profile->fields();
                $user_set = $this->model_user_profile->related_user();

                
                $this->template->assign( 'related_user', $user_set );

                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'user_profile_data', $data );
        		$this->template->assign( 'user_profile_fields', $fields );
                $this->template->assign( 'metadata', $this->model_user_profile->metadata() );
        		$this->template->assign( 'table_name', 'User_profile' );
        		$this->template->assign( 'template', 'form_user_profile' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_user_profile->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'userID', lang('userID'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'address', lang('address'), 'required|max_length[80]' );
				$this->form_validation->set_rules( 'city', lang('city'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'province', lang('province'), 'required|max_length[40]' );
				$this->form_validation->set_rules( 'zipcode', lang('zipcode'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'phone', lang('phone'), 'required|max_length[20]' );
				$this->form_validation->set_rules( 'celular', lang('celular'), 'required|max_length[20]' );

				$data_post['userID'] = $this->input->post( 'userID' );
				$data_post['address'] = $this->input->post( 'address' );
				$data_post['city'] = $this->input->post( 'city' );
				$data_post['province'] = $this->input->post( 'province' );
				$data_post['zipcode'] = $this->input->post( 'zipcode' );
				$data_post['phone'] = $this->input->post( 'phone' );
				$data_post['celular'] = $this->input->post( 'celular' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $user_set = $this->model_user_profile->related_user();

                    $this->template->assign( 'related_user', $user_set );

                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'user_profile_data', $data_post );
            		$this->template->assign( 'user_profile_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_user_profile->metadata() );
            		$this->template->assign( 'table_name', 'User_profile' );
            		$this->template->assign( 'template', 'form_user_profile' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_user_profile->update( $id, $data_post );
				    
					redirect( 'user_profile/show/' . $id );   
                }
            break;
        }
    }



    /**
     *  DELETE RECORD(S)
     *  The 'delete' method of the model accepts int and array  
     */
    function delete( $id = FALSE )
    {
        switch ( $_SERVER ['REQUEST_METHOD'] )
        {
            case 'GET':
                $this->model_user_profile->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_user_profile->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
