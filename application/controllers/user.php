<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_user' ); 
		
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
        $this->model_user->pagination( TRUE );
		$data_info = $this->model_user->lister( $page );
        $fields = $this->model_user->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_user->pager );
		$this->template->assign( 'user_fields', $fields );
		$this->template->assign( 'user_data', $data_info );
        $this->template->assign( 'table_name', 'User' );
        $this->template->assign( 'template', 'list_user' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_user->get( $id );
        $fields = $this->model_user->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'user_fields', $fields );
		$this->template->assign( 'user_data', $data );
		$this->template->assign( 'table_name', 'User' );
		$this->template->assign( 'template', 'show_user' );
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
                $fields = $this->model_user->fields();
                $role_set = $this->model_user->related_role();

                $this->template->assign( 'related_role', $role_set );

                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'user_fields', $fields );
                $this->template->assign( 'metadata', $this->model_user->metadata() );
        		$this->template->assign( 'table_name', 'User' );
        		$this->template->assign( 'template', 'form_user' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO user table
             */
            case 'POST':
                $fields = $this->model_user->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'password', lang('password'), 'required|max_length[300]' );
				$this->form_validation->set_rules( 'roleID', lang('roleID'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'name', lang('name'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'email', lang('email'), 'required|max_length[80]' );
				$this->form_validation->set_rules( 'username', lang('username'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'delete', lang('delete'), 'required|max_length[1]|integer' );

				$data_post['password'] = $this->input->post( 'password' );
				$data_post['roleID'] = $this->input->post( 'roleID' );
				$data_post['name'] = $this->input->post( 'name' );
				$data_post['email'] = $this->input->post( 'email' );
				$data_post['username'] = $this->input->post( 'username' );
				$data_post['delete'] = $this->input->post( 'delete' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $role_set = $this->model_user->related_role();

                    $this->template->assign( 'related_role', $role_set );

                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'user_data', $data_post );
            		$this->template->assign( 'user_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_user->metadata() );
            		$this->template->assign( 'table_name', 'User' );
            		$this->template->assign( 'template', 'form_user' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_user->insert( $data_post );
                    
					redirect( 'user' );
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
                $this->model_user->raw_data = TRUE;
        		$data = $this->model_user->get( $id );
                $fields = $this->model_user->fields();
                $role_set = $this->model_user->related_role();

                
                $this->template->assign( 'related_role', $role_set );

                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'user_data', $data );
        		$this->template->assign( 'user_fields', $fields );
                $this->template->assign( 'metadata', $this->model_user->metadata() );
        		$this->template->assign( 'table_name', 'User' );
        		$this->template->assign( 'template', 'form_user' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_user->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'password', lang('password'), 'required|max_length[300]' );
				$this->form_validation->set_rules( 'roleID', lang('roleID'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'name', lang('name'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'email', lang('email'), 'required|max_length[80]' );
				$this->form_validation->set_rules( 'username', lang('username'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'delete', lang('delete'), 'required|max_length[1]|integer' );

				$data_post['password'] = $this->input->post( 'password' );
				$data_post['roleID'] = $this->input->post( 'roleID' );
				$data_post['name'] = $this->input->post( 'name' );
				$data_post['email'] = $this->input->post( 'email' );
				$data_post['username'] = $this->input->post( 'username' );
				$data_post['delete'] = $this->input->post( 'delete' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $role_set = $this->model_user->related_role();

                    $this->template->assign( 'related_role', $role_set );

                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'user_data', $data_post );
            		$this->template->assign( 'user_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_user->metadata() );
            		$this->template->assign( 'table_name', 'User' );
            		$this->template->assign( 'template', 'form_user' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_user->update( $id, $data_post );
				    
					redirect( 'user/show/' . $id );   
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
                $this->model_user->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_user->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
