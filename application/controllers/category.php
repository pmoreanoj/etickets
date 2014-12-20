<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('template');
        $this->load->model('model_category');

        $this->load->helper('form');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->model('model_auth');

        $this->logged_in = $this->model_auth->check(TRUE);
        $this->template->assign('logged_in', $this->logged_in);

        $this->lang->load('db_fields', 'english'); // This is the language file
    }

    /**
     *  LISTS MODEL DATA INTO A TABLE
     */
    function index($page = 0) {
        $this->model_category->pagination(TRUE);
        $data_info = $this->model_category->lister($page);
        $fields = $this->model_category->fields(TRUE);


        $this->template->assign('pager', $this->model_category->pager);
        $this->template->assign('category_fields', $fields);
        $this->template->assign('category_data', $data_info);
        $this->template->assign('table_name', 'Category');
        $this->template->assign('template', 'list_category');

        $this->template->display('frame_admin.tpl');
    }

    /**
     *  SHOWS A RECORD VIEW
     */
    function show($id) {
        $data = $this->model_category->get($id);
        $fields = $this->model_category->fields(TRUE);



        $this->template->assign('id', $id);
        $this->template->assign('category_fields', $fields);
        $this->template->assign('category_data', $data);
        $this->template->assign('table_name', 'Category');
        $this->template->assign('template', 'show_category');
        $this->template->display('frame_admin.tpl');
    }

    /**
     *  SHOWS A FROM, AND HANDLES SAVING IT
     */
    function create($id = false) {
        $this->load->library('form_validation');

        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $fields = $this->model_category->fields();



                $this->template->assign('action_mode', 'create');
                $this->template->assign('category_fields', $fields);
                $this->template->assign('metadata', $this->model_category->metadata());
                $this->template->assign('table_name', 'Category');
                $this->template->assign('template', 'form_category');
                $this->template->display('frame_admin.tpl');
                break;

            /**
             *  Insert data TO category table
             */
            case 'POST':
                $fields = $this->model_category->fields();

                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('category', lang('category'), 'required|max_length[50]');

                $data_post['category'] = $this->input->post('category');

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();




                    $this->template->assign('errors', $errors);
                    $this->template->assign('action_mode', 'create');
                    $this->template->assign('category_data', $data_post);
                    $this->template->assign('category_fields', $fields);
                    $this->template->assign('metadata', $this->model_category->metadata());
                    $this->template->assign('table_name', 'Category');
                    $this->template->assign('template', 'form_category');
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $insert_id = $this->model_category->insert($data_post);

                    redirect('category');
                }
                break;
        }
    }

    /**
     *  DISPLAYS THE POPULATED FORM OF THE RECORD
     *  This method uses the same template as the create method
     */
    function edit($id = false) {
        $this->load->library('form_validation');

        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $this->model_category->raw_data = TRUE;
                $data = $this->model_category->get($id);
                $fields = $this->model_category->fields();




                $this->template->assign('action_mode', 'edit');
                $this->template->assign('category_data', $data);
                $this->template->assign('category_fields', $fields);
                $this->template->assign('metadata', $this->model_category->metadata());
                $this->template->assign('table_name', 'Category');
                $this->template->assign('template', 'form_category');
                $this->template->assign('record_id', $id);
                $this->template->display('frame_admin.tpl');
                break;

            case 'POST':

                $fields = $this->model_category->fields();
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('category', lang('category'), 'required|max_length[50]');

                $data_post['category'] = $this->input->post('category');

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();




                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('errors', $errors);
                    $this->template->assign('category_data', $data_post);
                    $this->template->assign('category_fields', $fields);
                    $this->template->assign('metadata', $this->model_category->metadata());
                    $this->template->assign('table_name', 'Category');
                    $this->template->assign('template', 'form_category');
                    $this->template->assign('record_id', $id);
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $this->model_category->update($id, $data_post);

                    redirect('category/show/' . $id);
                }
                break;
        }
    }

    /**
     *  DELETE RECORD(S)
     *  The 'delete' method of the model accepts int and array  
     */
    function delete($id = FALSE) {
        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $this->model_category->delete($id);
                redirect($_SERVER['HTTP_REFERER']);
                break;

            case 'POST':
                $this->model_category->delete($this->input->post('delete_ids'));
                redirect($_SERVER['HTTP_REFERER']);
                break;
        }
    }

}
