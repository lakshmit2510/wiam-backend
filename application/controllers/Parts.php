<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Parts extends REST_Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }

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
        $directors = array("GET Working");

        $this->response($directors, REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_post()
    {

        $this->response(['POST Working'], REST_Controller::HTTP_OK);
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
        $category = $this->get('category');
        $parts_list = $this->Parts_Model->getAllParts($category);

        $this->response($parts_list, REST_Controller::HTTP_OK);
    }

    public function getPartsById_get($id)
    {

        $parts_list = $this->Parts_Model->getPartsById($id);

        $this->response($parts_list, REST_Controller::HTTP_OK);
    }

    public function addNewPart_post()
    {
        $db_values = array();
        $db_values['PartsName'] = $this->post('partName');
        $db_values['ExpiryDate'] = $this->post('expiryDate');
        $db_values['SKUNo'] = $this->post('location');
        $db_values['ManufacturingDate'] = $this->post('manufaturingDate');
        $db_values['CostPrice'] = $this->post('partCostPrice');
        $db_values['Description'] = $this->post('partDescription');
        $db_values['ItemNumber'] = $this->post('partNumber');
        $db_values['SellingPrice'] = $this->post('partSellingPrice');
        $db_values['Category'] = $this->post('productCategory');
        $db_values['QTYInHand'] = $this->post('quantityInHand');
        $db_values['VendorName'] = $this->post('vendorName');
        $db_values['Model'] = $this->post('Model');
        $db_values['Manufacturer'] = $this->post('Manufacturer');

        // print_r($db_values);
        $this->Parts_Model->addNewPart($db_values);

        $this->response(["New Product Added Successfully"], REST_Controller::HTTP_OK);
    }
    public function updatePartsById_put($partsId)
    {
        // print_r($partsId);
        // exit;
        $db_values = array();
        $db_values['PartsName'] = $this->post('partName');
        $db_values['ExpiryDate'] = $this->post('expiryDate');
        $db_values['SKUNo'] = $this->post('location');
        $db_values['ManufacturingDate'] = $this->post('manufaturingDate');
        $db_values['CostPrice'] = $this->post('partCostPrice');
        $db_values['Description'] = $this->post('partDescription');
        $db_values['ItemNumber'] = $this->post('partNumber');
        $db_values['SellingPrice'] = $this->post('partSellingPrice');
        $db_values['Category'] = $this->post('productCategory');
        $db_values['QTYInHand'] = $this->post('quantityInHand');
        $db_values['VendorName'] = $this->post('vendorName');
        $db_values['Model'] = $this->post('Model');
        $db_values['Manufacturer'] = $this->post('Manufacturer');

        print_r($db_values);
        exit;

        $this->Parts_Model->updatePartsById($partsId, $db_values);

        $this->response(["Parts Updated Successfully"], REST_Controller::HTTP_OK);
    }
    public function deletePartsById_delete($parts_id)
    {

        $this->Parts_Model->deletePartsById($parts_id);

        $this->response(["Part Deleted Successfully"], REST_Controller::HTTP_OK);
    }
}
