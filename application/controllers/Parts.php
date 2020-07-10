<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

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
        $db_values = array();
        $db_values['PartsName'] = $this->put('partName');
        $db_values['ExpiryDate'] = $this->put('expiryDate');
        $db_values['SKUNo'] = $this->put('location');
        $db_values['ManufacturingDate'] = $this->put('manufaturingDate');
        $db_values['CostPrice'] = $this->put('partCostPrice');
        $db_values['Description'] = $this->put('partDescription');
        $db_values['ItemNumber'] = $this->put('partNumber');
        $db_values['SellingPrice'] = $this->put('partSellingPrice');
        $db_values['Category'] = $this->put('productCategory');
        $db_values['QTYInHand'] = $this->put('quantityInHand');
        $db_values['VendorName'] = $this->put('vendorName');
        $db_values['Model'] = $this->put('Model');
        $db_values['Manufacturer'] = $this->put('Manufacturer');

        $this->Parts_Model->updatePartsById($partsId, $db_values);

        $this->response(["Parts Updated Successfully"], REST_Controller::HTTP_OK);
    }
    public function deletePartsById_delete($parts_id)
    {

        $this->Parts_Model->deletePartsById($parts_id);

        $this->response(["Part Deleted Successfully"], REST_Controller::HTTP_OK);
    }

    public function upload_file_post()
    {

        if (!empty($_FILES['avatar']['name'])) {
            $root_folder = $this->config->item('upload_file_path');
            $root_extensions = $this->config->item('upload_file_extensions');
            $root_file_size = $this->config->item('upload_file_size');
            $config = array(
                'upload_path' => $root_folder,
                'allowed_types' => $root_extensions,
                'overwrite' => TRUE,
                'remove_spaces' => FALSE,
                'max_size' => $root_file_size,
            );

            $this->load->library('upload', $config);
            //            $this->upload->initialize($config);
            if ($this->upload->do_upload('avatar')) {
                $fileData = $this->upload->data();
                // if ($fileData) {
                //     $uploadData['file_path'] = $sub_folder . '/' . $_FILES[$name]['name'];
                // }
                $this->response(["Uploaded Successfully."], REST_Controller::HTTP_OK);
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->response($error, REST_Controller::HTTP_OK);
            }
        }
    }
}
