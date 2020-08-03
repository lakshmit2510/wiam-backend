<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class PurchaseOrders extends REST_Controller
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
        $this->load->model('Purchaseorders_Model');
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

    public function getAllPurchaseorders_get()
    {

        $purchaseorders_list = $this->Purchaseorders_Model->getAllPurchaseorders();

        $this->response($purchaseorders_list, REST_Controller::HTTP_OK);
    }

    public function getPurchaseorderById_get()
    {
        $purchaseorder_id = $this->get('');

        $purchaseorders_list = $this->Purchaseorders_Model->getPurchaseorderById($purchaseorder_id);

        $this->response($purchaseorders_list, REST_Controller::HTTP_OK);
    }

    public function addNewPurchaseorder_post()
    {
        $db_values = array();
        $db_values['PurchaseOrderNumber'] = $this->post('purchaseOrderNumber');
        $db_values['PartsNo'] = $this->post('partsNo');
        $db_values['RequestedQTY'] = $this->post('QTYToBuy');
        $db_values['SupplierName'] = $this->post('vendorName');
        $db_values['UnitPrice'] = $this->post('unitPrice');
        $db_values['PartName'] = $this->post('partsName');
        $db_values['EstimatedDateOfDelivery'] = $this->post('estimatedDateOfDelivery');
        $db_values['CreatedBy'] = $this->userInfo->userID;
        $db_values['CreatedOn'] = date("Y-m-d H:i:s");

        // print_r($db_values);
        // exit;

        $this->Purchaseorders_Model->addNewPurchaseorder($db_values);

        $this->response(["New PurchaseOrder Added Successfully"], REST_Controller::HTTP_OK);
    }

    public function updatePurchaseordersById_put($po_id)
    {
        $data = $this->Purchaseorders_Model->getPurchaseorderById($po_id);
        $db_values = array();
        $db_values['ReceivedDate'] = date("Y-m-d");
        $db_values['Status'] = "Delivered";
        $quantity = explode(",", $data[0]->RequestedQTY);
        $partsNo = explode(",", $data[0]->PartsNo);

        // Update stock count
        foreach ($partsNo as $key => $value) {
            $this->Product_Request_List_Model->updateCancelStock($partsNo[$key], $quantity[$key]);
        }

        $this->Purchaseorders_Model->updatePurchaseordersById($po_id, $db_values);

        $this->response(["Purchaseorder Updated Successfully"], REST_Controller::HTTP_OK);
    }

    public function deletePurchaseorderById_put($po_id)
    {
        $db_values['Active'] = 0;
        $db_values['DeletedOn'] = date("Y-m-d");
        $db_values['Status'] = "Deleted";
        $this->Purchaseorders_Model->updatePurchaseordersById($po_id, $db_values);

        $this->response(["Purchase Order Details Deleted Successfully"], REST_Controller::HTTP_OK);
    }
}
