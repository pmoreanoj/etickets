<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Place_has_section extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_place_has_section' ); 
		
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
        $this->model_place_has_section->pagination( TRUE );
		$data_info = $this->model_place_has_section->lister( $page );
        $fields = $this->model_place_has_section->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_place_has_section->pager );
		$this->template->assign( 'place_has_section_fields', $fields );
		$this->template->assign( 'place_has_section_data', $data_info );
        $this->template->assign( 'table_name', 'Place_has_section' );
        $this->template->assign( 'template', 'list_place_has_section' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_place_has_section->get( $id );
        $fields = $this->model_place_has_section->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'place_has_section_fields', $fields );
		$this->template->assign( 'place_has_section_data', $data );
		$this->template->assign( 'table_name', 'Place_has_section' );
		$this->template->assign( 'template', 'show_place_has_section' );
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
                $fields = $this->model_place_has_section->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'place_has_section_fields', $fields );
                $this->template->assign( 'metadata', $this->model_place_has_section->metadata() );
        		$this->template->assign( 'table_name', 'Place_has_section' );
        		$this->template->assign( 'template', 'form_place_has_section' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO place_has_section table
             */
            case 'POST':
                $fields = $this->model_place_has_section->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'sectionID', lang('sectionID'), 'required|max_length[11]|integer' );

				$data_post['sectionID'] = $this->input->post( 'sectionID' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'place_has_section_data', $data_post );
            		$this->template->assign( 'place_has_section_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_place_has_section->metadata() );
            		$this->template->assign( 'table_name', 'Place_has_section' );
            		$this->template->assign( 'template', 'form_place_has_section' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_place_has_section->insert( $data_post );
                    
					redirect( 'place_has_section' );
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
                $this->model_place_has_section->raw_data = TRUE;
        		$data = $this->model_place_has_section->get( $id );
                $fields = $this->model_place_has_section->fields();
                
                
                
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'place_has_section_data', $data );
        		$this->template->assign( 'place_has_section_fields', $fields );
                $this->template->assign( 'metadata', $this->model_place_has_section->metadata() );
        		$this->template->assign( 'table_name', 'Place_has_section' );
        		$this->template->assign( 'template', 'form_place_has_section' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_place_has_section->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'sectionID', lang('sectionID'), 'required|max_length[11]|integer' );

				$data_post['sectionID'] = $this->input->post( 'sectionID' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'place_has_section_data', $data_post );
            		$this->template->assign( 'place_has_section_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_place_has_section->metadata() );
            		$this->template->assign( 'table_name', 'Place_has_section' );
            		$this->template->assign( 'template', 'form_place_has_section' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_place_has_section->update( $id, $data_post );
				    
					redirect( 'place_has_section/show/' . $id );   
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
                $this->model_place_has_section->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_place_has_section->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
