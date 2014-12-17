<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user_profile extends CI_Model 
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
		 *     - TRUE:  just the field names of the user_profile table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false )
	{
        
	    $select_statement = ( $this->raw_data ) ? 'profile_id,userID,address,city,province,zipcode,phone,celular' : 'profile_id,user.name AS userID,address,city,province,zipcode,phone,celular';
		$this->db->select( $select_statement );
		$this->db->from('user_profile');
        $this->db->join( 'user', 'userID = user_id', 'left' );


		// Pick one record
		// Field order sample may be empty because no record is requested, eg. create/GET event
		if( $get_one )
        {
            $this->db->limit(1,0);
        }
		else // Select the desired record
        {
            $this->db->where( 'profile_id', $id );
        }

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array( 
	'profile_id' => $row['profile_id'],
	'userID' => $row['userID'],
	'address' => $row['address'],
	'city' => $row['city'],
	'province' => $row['province'],
	'zipcode' => $row['zipcode'],
	'phone' => $row['phone'],
	'celular' => $row['celular'],
 );
		}
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'user_profile', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'profile_id', $id );
		$this->db->update( 'user_profile', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'profile_id', $id );            
        }
        else
        {
            $this->db->where( 'profile_id', $id );
        }
        $this->db->delete( 'user_profile' );
        
	}



	function lister ( $page = FALSE )
	{
        
	    $this->db->start_cache();
		$this->db->select( 'profile_id,user.name AS userID,address,city,province,zipcode,phone,celular');
		$this->db->from( 'user_profile' );
		//$this->db->order_by( '', 'ASC' );
        $this->db->join( 'user', 'userID = user_id', 'left' );


        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results('user_profile');
            $config['base_url']    = 'user_profile/index/';
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
	'profile_id' => $row['profile_id'],
	'userID' => $row['userID'],
	'address' => $row['address'],
	'city' => $row['city'],
	'province' => $row['province'],
	'zipcode' => $row['zipcode'],
	'phone' => $row['phone'],
	'celular' => $row['celular'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'profile_id,user.name AS userID,address,city,province,zipcode,phone,celular');
		$this->db->from( 'user_profile' );
        $this->db->join( 'user', 'userID = user_id', 'left' );


		// Delete this line after setting up the search conditions 
        die('Please see models/model_user_profile.php for setting up the search method.');
		
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
            $config['total_rows']  = $this->db->count_all_results('user_profile');
            $config['base_url']    = '/user_profile/search/'.$keyword.'/';
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
	'profile_id' => $row['profile_id'],
	'userID' => $row['userID'],
	'address' => $row['address'],
	'city' => $row['city'],
	'province' => $row['province'],
	'zipcode' => $row['zipcode'],
	'phone' => $row['phone'],
	'celular' => $row['celular'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}

	function related_user()
    {
        $this->db->select( 'user_id AS user_id, name AS user_name' );
        $rel_data = $this->db->get( 'user' );
        return $rel_data->result_array();
    }







    /**
     *  Some utility methods
     */
    function fields( $withID = FALSE )
    {
        $fs = array(
	'profile_id' => lang('profile_id'),
	'userID' => lang('userID'),
	'address' => lang('address'),
	'city' => lang('city'),
	'province' => lang('province'),
	'zipcode' => lang('zipcode'),
	'phone' => lang('phone'),
	'celular' => lang('celular')
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

        $metadata = $this->explain_table->parse( 'user_profile' );

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
