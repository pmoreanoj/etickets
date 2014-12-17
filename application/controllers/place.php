<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Place extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_place' ); 
		$this->load->model( 'uploader' );
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
        $this->model_place->pagination( TRUE );
		$data_info = $this->model_place->lister( $page );
        $fields = $this->model_place->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_place->pager );
		$this->template->assign( 'place_fields', $fields );
		$this->template->assign( 'place_data', $data_info );
        $this->template->assign( 'table_name', 'Place' );
        $this->template->assign( 'template', 'list_place' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_place->get( $id );
        $fields = $this->model_place->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'place_fields', $fields );
		$this->template->assign( 'place_data', $data );
		$this->template->assign( 'table_name', 'Place' );
		$this->template->assign( 'template', 'show_place' );
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
                $fields = $this->model_place->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'place_fields', $fields );
                $this->template->assign( 'metadata', $this->model_place->metadata() );
        		$this->template->assign( 'table_name', 'Place' );
        		$this->template->assign( 'template', 'form_place' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO place table
             */
            case 'POST':
                $fields = $this->model_place->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'name', lang('name'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'photo', lang('photo'), '100' );

				$data_post['name'] = $this->input->post( 'name' );
				$data_post['photo'] = ( empty( $_FILES['photo']['name'] ) ) ? $this->input->post( 'photo-original-name' ) : $this->uploader->upload( 'photo' );
				$data_post['description'] = $this->input->post( 'description' );

                if ( $this->form_validation->run() == FALSE || $this->uploader->success == FALSE || $this->uploader->required_empty !== FALSE)
                {
                    $errors = validation_errors();
                    $errors .= ( $this->uploader->success ) ? '' : $this->uploader->response;
					$errors .= $this->uploader->required_empty;
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'place_data', $data_post );
            		$this->template->assign( 'place_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_place->metadata() );
            		$this->template->assign( 'table_name', 'Place' );
            		$this->template->assign( 'template', 'form_place' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_place->insert( $data_post );
                    
					redirect( 'place' );
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
                $this->model_place->raw_data = TRUE;
        		$data = $this->model_place->get( $id );
                $fields = $this->model_place->fields();
                
                
                
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'place_data', $data );
        		$this->template->assign( 'place_fields', $fields );
                $this->template->assign( 'metadata', $this->model_place->metadata() );
        		$this->template->assign( 'table_name', 'Place' );
        		$this->template->assign( 'template', 'form_place' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_place->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'name', lang('name'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'photo', lang('photo'), '100' );

				$data_post['name'] = $this->input->post( 'name' );
				$data_post['photo'] = ( empty( $_FILES['photo']['name'] ) ) ? $this->input->post( 'photo-original-name' ) : $this->uploader->upload( 'photo' );
				$data_post['description'] = $this->input->post( 'description' );

                if ( $this->form_validation->run() == FALSE || $this->uploader->success == FALSE || $this->uploader->required_empty !== FALSE)
                {
                    $errors = validation_errors();
                    $errors .= ( $this->uploader->success ) ? '' : $this->uploader->response;
					$errors .= $this->uploader->required_empty;
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'place_data', $data_post );
            		$this->template->assign( 'place_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_place->metadata() );
            		$this->template->assign( 'table_name', 'Place' );
            		$this->template->assign( 'template', 'form_place' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_place->update( $id, $data_post );
				    
					redirect( 'place/show/' . $id );   
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
                $this->model_place->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_place->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
