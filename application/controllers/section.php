<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Section extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_section' ); 
		
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
        $this->model_section->pagination( TRUE );
		$data_info = $this->model_section->lister( $page );
        $fields = $this->model_section->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_section->pager );
		$this->template->assign( 'section_fields', $fields );
		$this->template->assign( 'section_data', $data_info );
        $this->template->assign( 'table_name', 'Section' );
        $this->template->assign( 'template', 'list_section' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_section->get( $id );
        $fields = $this->model_section->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'section_fields', $fields );
		$this->template->assign( 'section_data', $data );
		$this->template->assign( 'table_name', 'Section' );
		$this->template->assign( 'template', 'show_section' );
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
                $fields = $this->model_section->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'section_fields', $fields );
                $this->template->assign( 'metadata', $this->model_section->metadata() );
        		$this->template->assign( 'table_name', 'Section' );
        		$this->template->assign( 'template', 'form_section' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO section table
             */
            case 'POST':
                $fields = $this->model_section->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'rows', lang('rows'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'seats_per_rows', lang('seats_per_rows'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'price', lang('price'), 'required|numeric' );

				$data_post['rows'] = $this->input->post( 'rows' );
				$data_post['seats_per_rows'] = $this->input->post( 'seats_per_rows' );
				$data_post['price'] = $this->input->post( 'price' );
				$data_post['description'] = $this->input->post( 'description' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'section_data', $data_post );
            		$this->template->assign( 'section_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_section->metadata() );
            		$this->template->assign( 'table_name', 'Section' );
            		$this->template->assign( 'template', 'form_section' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_section->insert( $data_post );
                    
					redirect( 'section' );
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
                $this->model_section->raw_data = TRUE;
        		$data = $this->model_section->get( $id );
                $fields = $this->model_section->fields();
                
                
                
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'section_data', $data );
        		$this->template->assign( 'section_fields', $fields );
                $this->template->assign( 'metadata', $this->model_section->metadata() );
        		$this->template->assign( 'table_name', 'Section' );
        		$this->template->assign( 'template', 'form_section' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_section->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'rows', lang('rows'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'seats_per_rows', lang('seats_per_rows'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'price', lang('price'), 'required|numeric' );

				$data_post['rows'] = $this->input->post( 'rows' );
				$data_post['seats_per_rows'] = $this->input->post( 'seats_per_rows' );
				$data_post['price'] = $this->input->post( 'price' );
				$data_post['description'] = $this->input->post( 'description' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'section_data', $data_post );
            		$this->template->assign( 'section_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_section->metadata() );
            		$this->template->assign( 'table_name', 'Section' );
            		$this->template->assign( 'template', 'form_section' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_section->update( $id, $data_post );
				    
					redirect( 'section/show/' . $id );   
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
                $this->model_section->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_section->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
