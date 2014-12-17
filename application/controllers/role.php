<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_role' ); 
		
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
        $this->model_role->pagination( TRUE );
		$data_info = $this->model_role->lister( $page );
        $fields = $this->model_role->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_role->pager );
		$this->template->assign( 'role_fields', $fields );
		$this->template->assign( 'role_data', $data_info );
        $this->template->assign( 'table_name', 'Role' );
        $this->template->assign( 'template', 'list_role' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_role->get( $id );
        $fields = $this->model_role->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'role_fields', $fields );
		$this->template->assign( 'role_data', $data );
		$this->template->assign( 'table_name', 'Role' );
		$this->template->assign( 'template', 'show_role' );
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
                $fields = $this->model_role->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'role_fields', $fields );
                $this->template->assign( 'metadata', $this->model_role->metadata() );
        		$this->template->assign( 'table_name', 'Role' );
        		$this->template->assign( 'template', 'form_role' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO role table
             */
            case 'POST':
                $fields = $this->model_role->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'role', lang('role'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'default', lang('default'), 'required|max_length[1]|integer' );

				$data_post['role'] = $this->input->post( 'role' );
				$data_post['default'] = ( $this->input->post( 'default' ) == FALSE ) ? 0 : $this->input->post( 'default' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'role_data', $data_post );
            		$this->template->assign( 'role_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_role->metadata() );
            		$this->template->assign( 'table_name', 'Role' );
            		$this->template->assign( 'template', 'form_role' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_role->insert( $data_post );
                    
					redirect( 'role' );
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
                $this->model_role->raw_data = TRUE;
        		$data = $this->model_role->get( $id );
                $fields = $this->model_role->fields();
                
                
                
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'role_data', $data );
        		$this->template->assign( 'role_fields', $fields );
                $this->template->assign( 'metadata', $this->model_role->metadata() );
        		$this->template->assign( 'table_name', 'Role' );
        		$this->template->assign( 'template', 'form_role' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_role->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'role', lang('role'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'default', lang('default'), 'required|max_length[1]|integer' );

				$data_post['role'] = $this->input->post( 'role' );
				$data_post['default'] = ( $this->input->post( 'default' ) == FALSE ) ? 0 : $this->input->post( 'default' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'role_data', $data_post );
            		$this->template->assign( 'role_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_role->metadata() );
            		$this->template->assign( 'table_name', 'Role' );
            		$this->template->assign( 'template', 'form_role' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_role->update( $id, $data_post );
				    
					redirect( 'role/show/' . $id );   
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
                $this->model_role->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_role->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
