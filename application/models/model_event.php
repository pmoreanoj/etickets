<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_event extends CI_Model {

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
         *     - TRUE:  just the field names of the event table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method		 
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false) {
        $this->db->flush_cache( );
        $select_statement = ( $this->raw_data ) ? 'event_id,event.name,event.photo,dateTime,delete,categoryID,placeID' : 'event_id,event.name,event.photo,dateTime,delete,category.category_id AS categoryID,place.name AS placeID';
        $this->db->select($select_statement);
        $this->db->from('event');
        $this->db->join('category', 'categoryID = category_id', 'left');
        $this->db->join('place', 'placeID = place_id', 'left');


        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else { // Select the desired record
            $this->db->where('event_id', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array(
                'event_id' => $row['event_id'],
                'name' => $row['name'],
                'photo' => $row['photo'],
                'dateTime' => $row['dateTime'],
                'delete' => $row['delete'],
                'categoryID' => $row['categoryID'],
                'placeID' => $row['placeID'],
            );
        } else {
            return array();
        }
    }

    function insert($data) {
        $this->db->insert('event', $data);
        return $this->db->insert_id();
    }

    function update($id, $data) {
        $this->db->where('event_id', $id);
        $this->db->update('event', $data);
    }

    function delete($id) {
        if (is_array($id)) {
            $this->db->where_in('event_id', $id);
        } else {
            $this->db->where('event_id', $id);
        }
        $this->db->delete('event');

        $this->db->where('event_id', $id);
        $this->db->delete('reservation_event');


        $this->db->where('event_id', $id);
        $this->db->delete('reservation_event');


        $this->db->where('event_id', $id);
        $this->db->delete('reservation_event');


        $this->db->where('event_id', $id);
        $this->db->delete('reservation_event');


        $this->db->where('event_id', $id);
        $this->db->delete('reservation_event');


        $this->db->where('event_id', $id);
        $this->db->delete('reservation_event');
    }

    function lister($page = FALSE) {

        $this->db->start_cache();
        $this->db->select('event_id,event.name,event.photo,dateTime,delete,category.category_id AS categoryID,place.name AS placeID');
        $this->db->from('event');
        //$this->db->order_by( '', 'ASC' );
        $this->db->join('category', 'categoryID = category_id', 'left');
        $this->db->join('place', 'placeID = place_id', 'left');


        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results('event');
            $config['base_url'] = 'event/index/';
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
                'event_id' => $row['event_id'],
                'name' => $row['name'],
                'photo' => $row['photo'],
                'dateTime' => $row['dateTime'],
                'delete' => $row['delete'],
                'categoryID' => $row['categoryID'],
                'placeID' => $row['placeID'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }

    function listerCategory($category) {

        $this->db->start_cache();
        $this->db->select('event_id,place.name AS placeID,event.name,event.photo,dateTime,delete');
        $this->db->where('categoryID', $category);
        $this->db->from('event');
        $this->db->join('place', 'placeID = place_id', 'left');
        //$this->db->order_by( '', 'ASC' );
        // Get the results
        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array(
                'event_id' => $row['event_id'],
                'placeID' => $row['placeID'],
                'name' => $row['name'],
                'photo' => $row['photo'],
                'dateTime' => $row['dateTime'],
                'delete' => $row['delete'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }

    function search($keyword, $page = FALSE) {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('event_id,event.name,event.photo,dateTime,delete,category.category_id AS categoryID,place.name AS placeID');
        $this->db->from('event');
        $this->db->join('category', 'categoryID = category_id', 'left');
        $this->db->join('place', 'placeID = place_id', 'left');


        // Delete this line after setting up the search conditions 
        die('Please see models/model_event.php for setting up the search method.');

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
            $config['total_rows'] = $this->db->count_all_results('event');
            $config['base_url'] = '/event/search/' . $keyword . '/';
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
                'event_id' => $row['event_id'],
                'name' => $row['name'],
                'photo' => $row['photo'],
                'dateTime' => $row['dateTime'],
                'delete' => $row['delete'],
                'categoryID' => $row['categoryID'],
                'placeID' => $row['placeID'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }

    function related_category() {
        $this->db->select('category_id AS category_id, category_id AS category_name');
        $rel_data = $this->db->get('category');
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
    function fields($withID = FALSE) {
        $fs = array(
            'event_id' => lang('event_id'),
            'name' => lang('name'),
            'photo' => lang('photo'),
            'dateTime' => lang('dateTime'),
            'delete' => lang('delete'),
            'categoryID' => lang('categoryID'),
            'placeID' => lang('placeID')
        );

        if ($withID == FALSE) {
            unset($fs[0]);
        }
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

        $metadata = $this->explain_table->parse('event');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

}
