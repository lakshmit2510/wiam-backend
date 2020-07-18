<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Product_Request_List extends REST_Controller
{
    protected $userInfo;
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
        $this->userInfo = base64_decode($this->input->get_request_header('Authorization'));
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

    public function getAllVehicleModels_get()
    {

        $vehicle_Models_List = $this->Product_Request_List_Model->getAllVehicleModels();

        $this->response($vehicle_Models_List, REST_Controller::HTTP_OK);
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
        $db_values['ServiceType'] = $this->post('serviceType');
        $db_values['TechnicianName'] = $this->post('technicianName');
        $db_values['PartsIssueDate'] = null;
        $db_values['CreatedBy'] = 1;
        $partsIdList = explode(",", $db_values['PartsList']);
        $partsCount = explode(",", $db_values['QTYRequested']);
        // Update stock count
        foreach ($partsIdList as $key => $value) {
            $this->Product_Request_List_Model->updateStock($partsIdList[$key], $partsCount[$key], $db_values['Model']);
        }

        $this->Product_Request_List_Model->addRequestForm($db_values);
        $this->response(["Parts requested form created successfully."], REST_Controller::HTTP_OK);
    }

    public function cancelRequestById_put($id)
    {
        $db_values['Active'] = 0;
        $db_values['Status'] = "Cancelled";
        $this->Product_Request_List_Model->deleteRequestListById($id, $db_values);

        $this->response(["Request Form Deleted Successfully"], REST_Controller::HTTP_OK);
    }

    public function updateRequestFormById_put($id)
    {
        // $db_values['Active'] = 0;
        $db_values['Status'] = "Delivered";
        $db_values['PartsIssueDate'] = date("Y-m-d H:i:s");
        // print_r($db_values);
        // exit;
        $this->Product_Request_List_Model->deleteRequestListById($id, $db_values);

        $this->response(["Request Form Deleted Successfully"], REST_Controller::HTTP_OK);
    }
}
