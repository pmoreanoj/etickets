<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_reservation extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
 
		$this->load->database();

		// Paginaiton defaults
		$this->pagination_enabled = FALSE;
		$this->pagination_per_page = 10;
		$this->pagination_num_links = 5;
		$this->pager = '';

        /**
		 *    bool $this->raw_data		
		 *    Used to decide what data should the SQL queries retrieve if tables are joined
		 *     - TRUE:  just the field names of the reservation table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false )
	{
        $meta = $this->metadata();
	    $select_statement = ( $this->raw_data ) ? 'id,user_id,event_id,date,state,more' : 'id,user_profile.name AS user_id,user_profile.name AS event_id,date,state,more';
		$this->db->select( $select_statement );
		$this->db->from('reservation');
        $this->db->join( 'user_profile', 'user_id = id', 'left' );


		// Pick one record
		// Field order sample may be empty because no record is requested, eg. create/GET event
		if( $get_one )
        {
            $this->db->limit(1,0);
        }
		else // Select the desired record
        {
            $this->db->where( 'id', $id );
        }

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array( 
	'id' => $row['id'],
	'user_id' => $row['user_id'],
	'event_id' => $row['event_id'],
	'date' => date( 'Y-m-d', $row['date'] ),
	'state' => ( array_search( $row['state'], $meta['state']['enum_values'] ) !== FALSE ) ? $meta['state']['enum_names'][ array_search( $row['state'], $meta['state']['enum_values'] ) ] : '',
	'more' => $row['more'],
 );
		}
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'reservation', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'id', $id );
		$this->db->update( 'reservation', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'id', $id );            
        }
        else
        {
            $this->db->where( 'id', $id );
        }
        $this->db->delete( 'reservation' );
        
	}



	function lister ( $page = FALSE )
	{
        $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'id,user_profile.name AS user_id,user_profile.name AS event_id,date,state,more');
		$this->db->from( 'reservation' );
		//$this->db->order_by( '', 'ASC' );
        $this->db->join( 'user_profile', 'user_id = id', 'left' );


        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results('reservation');
            $config['base_url']    = 'reservation/index/';
            $config['uri_segment'] = 3;
            $config['cur_tag_open'] = '<span class="current">';
            $config['cur_tag_close'] = '</span>';
            $config['per_page']    = $this->pagination_per_page;
            $config['num_links']   = $this->pagination_num_links;

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();
    
            $this->db->limit( $config['per_page'], $page );
        }

        // Get the results
		$query = $this->db->get();
		
		$temp_result = array();

		foreach ( $query->result_array() as $row )
		{
			$temp_result[] = array( 
	'id' => $row['id'],
	'user_id' => $row['user_id'],
	'event_id' => $row['event_id'],
	'date' => date( 'Y-m-d', $row['date'] ),
	'state' => ( array_search( $row['state'], $meta['state']['enum_values'] ) !== FALSE ) ? $meta['state']['enum_names'][ array_search( $row['state'], $meta['state']['enum_values'] ) ] : '',
	'more' => $row['more'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'id,user_profile.name AS user_id,user_profile.name AS event_id,date,state,more');
		$this->db->from( 'reservation' );
        $this->db->join( 'user_profile', 'user_id = id', 'left' );


		// Delete this line after setting up the search conditions 
        die('Please see models/model_reservation.php for setting up the search method.');
		
        /**
         *  Rename field_name_to_search to the field you wish to search 
         *  or create advanced search conditions here
		 */
        $this->db->where( 'field_name_to_search LIKE "%'.$keyword.'%"' );

        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results('reservation');
            $config['base_url']    = '/reservation/search/'.$keyword.'/';
            $config['uri_segment'] = 4;
            $config['per_page']    = $this->pagination_per_page;
            $config['num_links']   = $this->pagination_num_links;
    
            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();
    
            $this->db->limit( $config['per_page'], $page );
        }

		$query = $this->db->get();

		$temp_result = array();

		foreach ( $query->result_array() as $row )
		{
			$temp_result[] = array( 
	'id' => $row['id'],
	'user_id' => $row['user_id'],
	'event_id' => $row['event_id'],
	'date' => date( 'Y-m-d', $row['date'] ),
	'state' => ( array_search( $row['state'], $meta['state']['enum_values'] ) !== FALSE ) ? $meta['state']['enum_names'][ array_search( $row['state'], $meta['state']['enum_values'] ) ] : '',
	'more' => $row['more'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}

	function related_user_profile()
    {
        $this->db->select( 'id AS user_profile_id, name AS user_profile_name' );
        $rel_data = $this->db->get( 'user_profile' );
        return $rel_data->result_array();
    }







    /**
     *  Some utility methods
     */
    function fields( $withID = FALSE )
    {
        $fs = array(
	'id' => lang('id'),
	'user_id' => lang('user_id'),
	'event_id' => lang('event_id'),
	'date' => lang('date'),
	'state' => lang('state'),
	'more' => lang('more')
);

        if( $withID == FALSE )
        {
            unset( $fs[0] );
        }
        return $fs;
    }  
    


    function pagination( $bool )
    {
        $this->pagination_enabled = ( $bool === TRUE ) ? TRUE : FALSE;
    }



    /**
     *  Parses the table data and look for enum values, to match them with language variables
     */             
    function metadata()
    {
        $this->load->library('explain_table');

        $metadata = $this->explain_table->parse( 'reservation' );

        foreach( $metadata as $k => $md )
        {
            if( !empty( $md['enum_values'] ) )
            {
                $metadata[ $k ]['enum_names'] = array_map( 'lang', $md['enum_values'] );                
            } 
        }
        return $metadata; 
    }
}
