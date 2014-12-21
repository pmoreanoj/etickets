<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model_reservation extends CI_Model {

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
         *     - TRUE:  just the field names of the reservation table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method		 
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false) {
        $meta = $this->metadata();
        $select_statement = ( $this->raw_data ) ? 'confirmation,bank,reservation_id,userID,eventID,date,state,more' : 'confirmation,bank,reservation_id,user.username AS userID,event.name AS eventID,date,state,more';
        $this->db->select($select_statement);
        $this->db->from('reservation');
        $this->db->join('user', 'userID = user_id', 'left');
        $this->db->join('event', 'eventID = event_id', 'left');


        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else { // Select the desired record
            $this->db->where('reservation_id', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array(
                'confirmation' => $row['confirmation'],
                'bank' => $row['bank'],
                'reservation_id' => $row['reservation_id'],
                'userID' => $row['userID'],
                'eventID' => $row['eventID'],
                'date' => $row['date'],
                'state' => ( array_search($row['state'], $meta['state']['enum_values']) !== FALSE ) ? $meta['state']['enum_names'][array_search($row['state'], $meta['state']['enum_values'])] : '',
                'more' => $row['more'],
            );
        } else {
            return array();
        }
    }

    function insert($data) {
        $this->db->insert('reservation', $data);
        return $this->db->insert_id();
    }

    function update($id, $data) {
        $this->db->where('confirmation', $id);
        $this->db->update('reservation', $data);
    }

    function delete($id) {
        if (is_array($id)) {
            $this->db->where_in('confirmation', $id);
        } else {
            $this->db->where('confirmation', $id);
        }
        $this->db->delete('reservation');
    }

    function lister($page = FALSE) {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('confirmation,bank,reservation_id,user.username AS userID,event.name AS eventID,date,state,more');
        $this->db->from('reservation');
        //$this->db->order_by( '', 'ASC' );
        $this->db->join('user', 'userID = user_id', 'left');
        $this->db->join('event', 'eventID = event_id', 'left');


        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results('reservation');
            $config['base_url'] = 'reservation/index/';
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
                'confirmation' => $row['confirmation'],
                'bank' => $row['bank'],
                'reservation_id' => $row['reservation_id'],
                'userID' => $row['userID'],
                'eventID' => $row['eventID'],
                'date' => date('Y-m-d', $row['date']),
                'state' => ( array_search($row['state'], $meta['state']['enum_values']) !== FALSE ) ? $meta['state']['enum_names'][array_search($row['state'], $meta['state']['enum_values'])] : '',
                'more' => $row['more'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }

    function search($keyword, $page = FALSE) {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('confirmation,bank,reservation_id,user.username AS userID,event.name AS eventID,date,state,more');
        $this->db->from('reservation');
        $this->db->join('user', 'userID = user_id', 'left');
        $this->db->join('event', 'eventID = event_id', 'left');


        // Delete this line after setting up the search conditions 
        die('Please see models/model_reservation.php for setting up the search method.');

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
            $config['total_rows'] = $this->db->count_all_results('reservation');
            $config['base_url'] = '/reservation/search/' . $keyword . '/';
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
                'confirmation' => $row['confirmation'],
                'bank' => $row['bank'],
                'reservation_id' => $row['reservation_id'],
                'userID' => $row['userID'],
                'eventID' => $row['eventID'],
                'date' => date('Y-m-d', $row['date']),
                'state' => ( array_search($row['state'], $meta['state']['enum_values']) !== FALSE ) ? $meta['state']['enum_names'][array_search($row['state'], $meta['state']['enum_values'])] : '',
                'more' => $row['more'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }

    function related_user() {
        $this->db->select('user_id AS user_id, username AS user_name');
        $rel_data = $this->db->get('user');
        return $rel_data->result_array();
    }

    function related_event() {
        $this->db->select('event_id AS event_id, name AS event_name');
        $rel_data = $this->db->get('event');
        return $rel_data->result_array();
    }

    /**
     *  Some utility methods
     */
    function fields($withID = FALSE) {
        $fs = array(
            'confirmation' => lang('confirmation'),
            'bank' => lang('bank'),
            'reservation_id' => lang('reservation_id'),
            'userID' => lang('userID'),
            'eventID' => lang('eventID'),
            'date' => lang('date'),
            'state' => lang('state'),
            'more' => lang('more')
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

        $metadata = $this->explain_table->parse('reservation');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

}
