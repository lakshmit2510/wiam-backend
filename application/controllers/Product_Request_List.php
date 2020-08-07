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
        $this->userInfo = json_decode(base64_decode($this->input->get_request_header('Authorization')));
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

    public function getRequestListById_get()
    {
        $request_id = $this->get('requestId');
        $request_list = $this->Product_Request_List_Model->getRequestsListById($request_id);

        $this->response($request_list, REST_Controller::HTTP_OK);
    }

    public function getVehicleNoList_get()
    {
        $request_list = $this->Product_Request_List_Model->getVNos();
        $this->response($request_list, REST_Controller::HTTP_OK);
    }

    public function getRequestListByDate_get()
    {
        $from = $this->get('from');
        $to = $this->get('to');
        $vNo = $this->get('vNo');
        $Status = $this->get('statusType');
        if (isset($from) && !empty($from)) {
            $from = date("Y-m-d H:i:s", $from);
        } else {
            $from = null;
        }
        if (isset($to) && !empty($to)) {
            $to = date("Y-m-d H:i:s",  $to);
        } else {
            $to = null;
        }
        if ($vNo === 'all') {
            $vNo = null;
        }
        $request_list = $this->Product_Request_List_Model->getListByDateAndVNo($from, $to, $vNo, $Status);
        $this->response($request_list, REST_Controller::HTTP_OK);
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
        $db_values['PartsRequestedDate'] = date("Y-m-d H:i:s");;
        $db_values['PartsIssueDate'] = null;
        $db_values['Brand'] = $this->post('brand');
        $db_values['CreatedBy'] = $this->userInfo->userID;
        $db_values['CreatedOn'] = date("Y-m-d H:i:s");
        $partsIdList = explode(",", $db_values['PartsList']);
        $partsCount = explode(",", $db_values['QTYRequested']);
        // Update stock count
        foreach ($partsIdList as $key => $value) {
            $this->Product_Request_List_Model->updateStock($partsIdList[$key], $partsCount[$key]);
        }

        $insertId = $this->Product_Request_List_Model->addRequestForm($db_values);
        $res = array();
        $res['insertId'] = $insertId;
        $res['status']  = 'ok';
        $res['message'] = "Parts requested form created successfully.";
        $this->response($res, REST_Controller::HTTP_OK);
    }

    public function cancelRequestById_put($id)
    {
        $data = $this->Product_Request_List_Model->getRequestsListById($id);
        $partsIdList = explode(",", $data[0]->PartsList);
        $partsCount = explode(",", $data[0]->QTYRequested);
        $db_values['Active'] = 0;
        $db_values['Status'] = "Cancelled";
        $db_values['CancelledOn'] = date("Y-m-d H:i:s");
        // Update stock count
        foreach ($partsIdList as $key => $value) {
            $this->Product_Request_List_Model->updateCancelStock($partsIdList[$key], $partsCount[$key]);
        }
        $this->Product_Request_List_Model->updateRequestsListById($id, $db_values);

        $this->response(["Request Form Deleted Successfully"], REST_Controller::HTTP_OK);
    }

    public function updateRequestFormById_put($id)
    {
        $db_values['Status'] = "Delivered";
        $db_values['PartsIssueDate'] = date("Y-m-d H:i:s");
        $this->Product_Request_List_Model->updateRequestsListById($id, $db_values);

        $this->response(["Request Form status updated Successfully"], REST_Controller::HTTP_OK);
    }
    public function updateEditedFormById_put($id)
    {
        $data = $this->Product_Request_List_Model->getRequestsListById($id);
        $partsIdList = explode(",", $data[0]->PartsList);
        $partsCount = explode(",", $data[0]->QTYRequested);
        foreach ($partsIdList as $key => $value) {
            $this->Product_Request_List_Model->updateCancelStock($partsIdList[$key], $partsCount[$key]);
        }
        
        $db_values = array();
        $db_values['VehicleNo'] = $this->put('vehicleNo');
        $db_values['Model'] = $this->put('vehicleModel');
        $db_values['PartsList'] = $this->put('partsList');
        $db_values['QTYRequested'] = $this->put('qtyRequested');
        $db_values['ServiceType'] = $this->put('serviceType');
        $db_values['TechnicianName'] = $this->put('technicianName');
        $db_values['PartsRequestedDate'] = date("Y-m-d H:i:s");;
        $db_values['PartsIssueDate'] = null;
        $db_values['Brand'] = $this->put('brand');
        $partsIdList = explode(",", $db_values['PartsList']);
        $partsCount = explode(",", $db_values['QTYRequested']);
        // Update stock count
        foreach ($partsIdList as $key => $value) {
            $this->Product_Request_List_Model->updateStock($partsIdList[$key], $partsCount[$key]);
        }

        $insertId = $this->Product_Request_List_Model->updateRequestsListById($id, $db_values);
        $res = array();
        $res['insertId'] = $insertId;
        $res['status']  = 'ok';
        $res['message'] = "Parts requested form created successfully.";
        $this->response($res, REST_Controller::HTTP_OK);

    }

}
