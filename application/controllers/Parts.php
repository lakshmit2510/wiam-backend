<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Parts extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Parts_Model');

    }
    public function index()
    {
        $this->load->view('welcome_message');
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_get($id = 0)
    {
        $directors = array("Alfred Hitchcock");

        $this->response($directors, REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_post()
    {

        $this->response(['Post Working'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_put($id)
    {

        $this->response(['Put Working'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_delete($id)
    {

        $this->response(['Delete working'], REST_Controller::HTTP_OK);
    }
    public function getAllParts_get()
    {

        $parts_list = $this->Parts_Model->getAllParts();

        $this->response($parts_list, REST_Controller::HTTP_OK);

    }
    public function getPartsById_get()
    {
        $parts_id = $this->get('parts_id');

        $parts_list = $this->Parts_Model->getPartsById($parts_id);

        $this->response($parts_list, REST_Controller::HTTP_OK);

    }

    public function addNewPart_post()
    {
        $db_values = array();
        $db_values['PartsName'] = $this->post('PartsName');
        $db_values['ItemNumber'] = $this->post('ItemNumber');
        $db_values['SKUNo'] = $this->post('SKUNo');
        $db_values['Description'] = $this->post('Description');
        $db_values['QTYInHand'] = $this->post('QTYInHand');
        $db_values['MinQTY'] = $this->post('MinQTY');
        $db_values['Manufacturer'] = $this->post('Manufacturer');
        $db_values['Model'] = $this->post('Model');
        $db_values['VendorName'] = $this->post('VendorName');

        $this->Parts_Model->addNewPart($db_values);

        $this->response(["New Part Added Successfully"], REST_Controller::HTTP_OK);

    }
    public function updatePartsById_put()
    {
        $db_values = array();
        $PartsID = $this->put('PartsID');
        $db_values['PartsName'] = $this->post('PartsName');
        $db_values['ItemNumber'] = $this->post('ItemNumber');
        $db_values['SKUNo'] = $this->post('SKUNo');
        $db_values['Description'] = $this->post('Description');
        $db_values['QTYInHand'] = $this->post('QTYInHand');
        $db_values['MinQTY'] = $this->post('MinQTY');
        $db_values['Manufacturer'] = $this->post('Manufacturer');
        $db_values['Model'] = $this->post('Model');
        $db_values['VendorName'] = $this->post('VendorName');

        $this->Parts_Model->updatePartsById($PartsID, $db_values);

        $this->response(["Parts Updated Successfully"], REST_Controller::HTTP_OK);

    }
    public function deletePartsById_delete($parts_id)
    {

        $this->Parts_Model->deletePartsById($parts_id);

        $this->response(["Part Deleted Successfully"], REST_Controller::HTTP_OK);

    }
}