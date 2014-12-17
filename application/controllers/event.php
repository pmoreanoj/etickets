<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_event' ); 
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
        $this->model_event->pagination( TRUE );
		$data_info = $this->model_event->lister( $page );
        $fields = $this->model_event->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_event->pager );
		$this->template->assign( 'event_fields', $fields );
		$this->template->assign( 'event_data', $data_info );
        $this->template->assign( 'table_name', 'Event' );
        $this->template->assign( 'template', 'list_event' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_event->get( $id );
        $fields = $this->model_event->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'event_fields', $fields );
		$this->template->assign( 'event_data', $data );
		$this->template->assign( 'table_name', 'Event' );
		$this->template->assign( 'template', 'show_event' );
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
                $fields = $this->model_event->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'event_fields', $fields );
                $this->template->assign( 'metadata', $this->model_event->metadata() );
        		$this->template->assign( 'table_name', 'Event' );
        		$this->template->assign( 'template', 'form_event' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO event table
             */
            case 'POST':
                $fields = $this->model_event->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'placeID', lang('placeID'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'name', lang('name'), 'required|max_length[100]' );
				$this->form_validation->set_rules( 'photo', lang('photo'), '100' );
				$this->form_validation->set_rules( 'dateTime', lang('dateTime'), 'required' );
				$this->form_validation->set_rules( 'delete', lang('delete'), 'required|max_length[1]|integer' );

				$data_post['placeID'] = $this->input->post( 'placeID' );
				$data_post['name'] = $this->input->post( 'name' );
				$data_post['photo'] = ( empty( $_FILES['photo']['name'] ) ) ? $this->input->post( 'photo-original-name' ) : $this->uploader->upload( 'photo' );
				$data_post['dateTime'] = $this->input->post( 'dateTime' );
				$data_post['delete'] = ( $this->input->post( 'delete' ) == FALSE ) ? 0 : $this->input->post( 'delete' );

                if ( $this->form_validation->run() == FALSE || $this->uploader->success == FALSE || $this->uploader->required_empty !== FALSE)
                {
                    $errors = validation_errors();
                    $errors .= ( $this->uploader->success ) ? '' : $this->uploader->response;
					$errors .= $this->uploader->required_empty;
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'event_data', $data_post );
            		$this->template->assign( 'event_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_event->metadata() );
            		$this->template->assign( 'table_name', 'Event' );
            		$this->template->assign( 'template', 'form_event' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_event->insert( $data_post );
                    
					redirect( 'event' );
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
                $this->model_event->raw_data = TRUE;
        		$data = $this->model_event->get( $id );
                $fields = $this->model_event->fields();
                
                
                
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'event_data', $data );
        		$this->template->assign( 'event_fields', $fields );
                $this->template->assign( 'metadata', $this->model_event->metadata() );
        		$this->template->assign( 'table_name', 'Event' );
        		$this->template->assign( 'template', 'form_event' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_event->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'placeID', lang('placeID'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'name', lang('name'), 'required|max_length[100]' );
				$this->form_validation->set_rules( 'photo', lang('photo'), '100' );
				$this->form_validation->set_rules( 'dateTime', lang('dateTime'), 'required' );
				$this->form_validation->set_rules( 'delete', lang('delete'), 'required|max_length[1]|integer' );

				$data_post['placeID'] = $this->input->post( 'placeID' );
				$data_post['name'] = $this->input->post( 'name' );
				$data_post['photo'] = ( empty( $_FILES['photo']['name'] ) ) ? $this->input->post( 'photo-original-name' ) : $this->uploader->upload( 'photo' );
				$data_post['dateTime'] = $this->input->post( 'dateTime' );
				$data_post['delete'] = ( $this->input->post( 'delete' ) == FALSE ) ? 0 : $this->input->post( 'delete' );

                if ( $this->form_validation->run() == FALSE || $this->uploader->success == FALSE || $this->uploader->required_empty !== FALSE)
                {
                    $errors = validation_errors();
                    $errors .= ( $this->uploader->success ) ? '' : $this->uploader->response;
					$errors .= $this->uploader->required_empty;
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'event_data', $data_post );
            		$this->template->assign( 'event_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_event->metadata() );
            		$this->template->assign( 'table_name', 'Event' );
            		$this->template->assign( 'template', 'form_event' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_event->update( $id, $data_post );
				    
					redirect( 'event/show/' . $id );   
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
                $this->model_event->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_event->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
