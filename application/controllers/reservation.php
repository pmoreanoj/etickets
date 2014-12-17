<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservation extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_reservation' ); 
		
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
        $this->model_reservation->pagination( TRUE );
		$data_info = $this->model_reservation->lister( $page );
        $fields = $this->model_reservation->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_reservation->pager );
		$this->template->assign( 'reservation_fields', $fields );
		$this->template->assign( 'reservation_data', $data_info );
        $this->template->assign( 'table_name', 'Reservation' );
        $this->template->assign( 'template', 'list_reservation' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_reservation->get( $id );
        $fields = $this->model_reservation->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'reservation_fields', $fields );
		$this->template->assign( 'reservation_data', $data );
		$this->template->assign( 'table_name', 'Reservation' );
		$this->template->assign( 'template', 'show_reservation' );
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
                $fields = $this->model_reservation->fields();
                $user_profile_set = $this->model_reservation->related_user_profile();

                $this->template->assign( 'related_user_profile', $user_profile_set );

                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'reservation_fields', $fields );
                $this->template->assign( 'metadata', $this->model_reservation->metadata() );
        		$this->template->assign( 'table_name', 'Reservation' );
        		$this->template->assign( 'template', 'form_reservation' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO reservation table
             */
            case 'POST':
                $fields = $this->model_reservation->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'user_id', lang('user_id'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'event_id', lang('event_id'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'date', lang('date'), 'required' );
				$this->form_validation->set_rules( 'state', lang('state'), 'required' );

				$data_post['user_id'] = $this->input->post( 'user_id' );
				$data_post['event_id'] = $this->input->post( 'event_id' );
				$data_post['date'] = ( $this->input->post( 'date' ) == '' ) ? time() : strtotime( $this->input->post( 'date' ) );
				$data_post['state'] = $this->input->post( 'state' );
				$data_post['more'] = $this->input->post( 'more' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $user_profile_set = $this->model_reservation->related_user_profile();

                    $this->template->assign( 'related_user_profile', $user_profile_set );

                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'reservation_data', $data_post );
            		$this->template->assign( 'reservation_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_reservation->metadata() );
            		$this->template->assign( 'table_name', 'Reservation' );
            		$this->template->assign( 'template', 'form_reservation' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_reservation->insert( $data_post );
                    
					redirect( 'reservation' );
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
                $this->model_reservation->raw_data = TRUE;
        		$data = $this->model_reservation->get( $id );
                $fields = $this->model_reservation->fields();
                $user_profile_set = $this->model_reservation->related_user_profile();

                
                $this->template->assign( 'related_user_profile', $user_profile_set );

                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'reservation_data', $data );
        		$this->template->assign( 'reservation_fields', $fields );
                $this->template->assign( 'metadata', $this->model_reservation->metadata() );
        		$this->template->assign( 'table_name', 'Reservation' );
        		$this->template->assign( 'template', 'form_reservation' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_reservation->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'user_id', lang('user_id'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'event_id', lang('event_id'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'date', lang('date'), 'required' );
				$this->form_validation->set_rules( 'state', lang('state'), 'required' );

				$data_post['user_id'] = $this->input->post( 'user_id' );
				$data_post['event_id'] = $this->input->post( 'event_id' );
				$data_post['date'] = ( $this->input->post( 'date' ) == '' ) ? time() : strtotime( $this->input->post( 'date' ) );
				$data_post['state'] = $this->input->post( 'state' );
				$data_post['more'] = $this->input->post( 'more' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $user_profile_set = $this->model_reservation->related_user_profile();

                    $this->template->assign( 'related_user_profile', $user_profile_set );

                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'reservation_data', $data_post );
            		$this->template->assign( 'reservation_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_reservation->metadata() );
            		$this->template->assign( 'table_name', 'Reservation' );
            		$this->template->assign( 'template', 'form_reservation' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_reservation->update( $id, $data_post );
				    
					redirect( 'reservation/show/' . $id );   
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
                $this->model_reservation->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_reservation->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
