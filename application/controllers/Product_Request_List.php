<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Product_Request_List extends REST_Controller
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
        $this->load->model('Product_Request_List_Model');
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
    public function getAllRequests_get()
    {

        $Product_Request_list = $this->Product_Request_List_Model->getAllRequestsList();

        $this->response($Product_Request_list, REST_Controller::HTTP_OK);
    }


    public function saveRequestForm_post()
    {

        $db_values = array();
        $booked = $this->Product_Request_List_Model->getMax();
        $db_values['RequestFormNo'] = 'FORM' . date('Y') . str_pad($booked, 4, '0', STR_PAD_LEFT);
        $db_values['VehicleNo'] = $this->post('vehicleNo');
        $db_values['Model'] = $this->post('vehicleModel');
        $db_values['PartsList'] = $this->post('partsList');
        $db_values['QTYRequested'] = $this->post('qtyRequested');
        $db_values['PartsIssueDate'] = null;
        $db_values['CreatedBy'] = 0;
        $this->Product_Request_List_Model->addRequestForm($db_values);
        $this->response(["Parts requested form created successfully."], REST_Controller::HTTP_OK);
    }
}
