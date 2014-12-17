<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seat extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_seat' ); 
		
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
        $this->model_seat->pagination( TRUE );
		$data_info = $this->model_seat->lister( $page );
        $fields = $this->model_seat->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_seat->pager );
		$this->template->assign( 'seat_fields', $fields );
		$this->template->assign( 'seat_data', $data_info );
        $this->template->assign( 'table_name', 'Seat' );
        $this->template->assign( 'template', 'list_seat' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_seat->get( $id );
        $fields = $this->model_seat->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'seat_fields', $fields );
		$this->template->assign( 'seat_data', $data );
		$this->template->assign( 'table_name', 'Seat' );
		$this->template->assign( 'template', 'show_seat' );
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
                $fields = $this->model_seat->fields();
                $user_profile_set = $this->model_seat->related_user_profile();

                $this->template->assign( 'related_user_profile', $user_profile_set );

                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'seat_fields', $fields );
                $this->template->assign( 'metadata', $this->model_seat->metadata() );
        		$this->template->assign( 'table_name', 'Seat' );
        		$this->template->assign( 'template', 'form_seat' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO seat table
             */
            case 'POST':
                $fields = $this->model_seat->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'section_id', lang('section_id'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'number_row', lang('number_row'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'number_seat', lang('number_seat'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'occupied', lang('occupied'), 'required|max_length[1]|integer' );

				$data_post['section_id'] = $this->input->post( 'section_id' );
				$data_post['number_row'] = $this->input->post( 'number_row' );
				$data_post['number_seat'] = $this->input->post( 'number_seat' );
				$data_post['occupied'] = ( $this->input->post( 'occupied' ) == FALSE ) ? 0 : $this->input->post( 'occupied' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $user_profile_set = $this->model_seat->related_user_profile();

                    $this->template->assign( 'related_user_profile', $user_profile_set );

                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'seat_data', $data_post );
            		$this->template->assign( 'seat_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_seat->metadata() );
            		$this->template->assign( 'table_name', 'Seat' );
            		$this->template->assign( 'template', 'form_seat' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_seat->insert( $data_post );
                    
					redirect( 'seat' );
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
                $this->model_seat->raw_data = TRUE;
        		$data = $this->model_seat->get( $id );
                $fields = $this->model_seat->fields();
                $user_profile_set = $this->model_seat->related_user_profile();

                
                $this->template->assign( 'related_user_profile', $user_profile_set );

                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'seat_data', $data );
        		$this->template->assign( 'seat_fields', $fields );
                $this->template->assign( 'metadata', $this->model_seat->metadata() );
        		$this->template->assign( 'table_name', 'Seat' );
        		$this->template->assign( 'template', 'form_seat' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_seat->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'section_id', lang('section_id'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'number_row', lang('number_row'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'number_seat', lang('number_seat'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'occupied', lang('occupied'), 'required|max_length[1]|integer' );

				$data_post['section_id'] = $this->input->post( 'section_id' );
				$data_post['number_row'] = $this->input->post( 'number_row' );
				$data_post['number_seat'] = $this->input->post( 'number_seat' );
				$data_post['occupied'] = ( $this->input->post( 'occupied' ) == FALSE ) ? 0 : $this->input->post( 'occupied' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $user_profile_set = $this->model_seat->related_user_profile();

                    $this->template->assign( 'related_user_profile', $user_profile_set );

                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'seat_data', $data_post );
            		$this->template->assign( 'seat_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_seat->metadata() );
            		$this->template->assign( 'table_name', 'Seat' );
            		$this->template->assign( 'template', 'form_seat' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_seat->update( $id, $data_post );
				    
					redirect( 'seat/show/' . $id );   
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
                $this->model_seat->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_seat->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
