<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_place_has_section extends CI_Model {

    function __construct() {
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
         *     - TRUE:  just the field names of the place_has_section table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method		 
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false) {
        $this->db->flush_cache( );

        $select_statement = ( $this->raw_data ) ? 'placeID,sectionID' : 'place.name AS placeID,section.description AS sectionID';
        $this->db->select($select_statement);
        $this->db->from('place_has_section');
        $this->db->join('section', 'sectionID = section_id', 'left');
        $this->db->join('place', 'placeID = place_id', 'left');


        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else { // Select the desired record
            $this->db->where('placeID', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array(
                'placeID' => $row['placeID'],
                'sectionID' => $row['sectionID'],
            );
        } else {
            return array();
        }
    }

    function insert($data) {
        $this->db->insert('place_has_section', $data);
        return $this->db->insert_id();
    }

    function update($id, $data) {
        $this->db->where('placeID', $id);
        $this->db->update('place_has_section', $data);
    }

    function delete($id) {
        if (is_array($id)) {
            $this->db->where_in('placeID', $id);
        } else {
            $this->db->where('placeID', $id);
        }
        $this->db->delete('place_has_section');
    }

    function lister($page = FALSE) {

        $this->db->start_cache();
        $this->db->select('place.name AS placeID,section.description AS sectionID');
        $this->db->from('place_has_section');
        //$this->db->order_by( '', 'ASC' );
        $this->db->join('section', 'sectionID = section_id', 'left');
        $this->db->join('place', 'placeID = place_id', 'left');


        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results('place_has_section');
            $config['base_url'] = 'place_has_section/index/';
            $config['uri_segment'] = 3;
            $config['cur_tag_open'] = '<span class="current">';
            $config['cur_tag_close'] = '</span>';
            $config['per_page'] = $this->pagination_per_page;
            $config['num_links'] = $this->pagination_num_links;

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $page);
        }

        // Get the results
        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array(
                'placeID' => $row['placeID'],
                'sectionID' => $row['sectionID'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }


    function listerPlaceID($placeID) {

        $this->db->start_cache();
        $this->db->select('placeID,sectionID');
        $this->db->from('place_has_section');
        $this->db->where('placeID', $placeID);

        // Get the results
        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array(
                'placeID' => $row['placeID'],
                'sectionID' => $row['sectionID'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }
    
    function search($keyword, $page = FALSE) {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('place.name AS placeID,section.description AS sectionID');
        $this->db->from('place_has_section');
        $this->db->join('section', 'sectionID = section_id', 'left');
        $this->db->join('place', 'placeID = place_id', 'left');


        // Delete this line after setting up the search conditions 
        die('Please see models/model_place_has_section.php for setting up the search method.');

        /**
         *  Rename field_name_to_search to the field you wish to search 
         *  or create advanced search conditions here
         */
        $this->db->where('field_name_to_search LIKE "%' . $keyword . '%"');

        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results('place_has_section');
            $config['base_url'] = '/place_has_section/search/' . $keyword . '/';
            $config['uri_segment'] = 4;
            $config['per_page'] = $this->pagination_per_page;
            $config['num_links'] = $this->pagination_num_links;

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $page);
        }

        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array(
                'placeID' => $row['placeID'],
                'sectionID' => $row['sectionID'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }

    function related_section() {
        $this->db->select('section_id AS section_id, description AS section_name');
        $rel_data = $this->db->get('section');
        return $rel_data->result_array();
    }
    
    function related_place() {
        $this->db->select('place_id AS place_id, name AS place_name');
        $rel_data = $this->db->get('place');
        return $rel_data->result_array();
    }

    /**
     *  Some utility methods
     */
    function fields( ) {
        $fs = array(
            'placeID' => lang('placeID'),
            'sectionID' => lang('sectionID')
        );
        return $fs;
    }

    function pagination($bool) {
        $this->pagination_enabled = ( $bool === TRUE ) ? TRUE : FALSE;
    }

    /**
     *  Parses the table data and look for enum values, to match them with language variables
     */
    function metadata() {
        $this->load->library('explain_table');

        $metadata = $this->explain_table->parse('place_has_section');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

}
