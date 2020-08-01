<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Suppliers extends REST_Controller
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
        $this->load->model('Suppliers_Model');
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

    public function getAllSuppliers_get()
    {

        $suppliers_list = $this->Suppliers_Model->getAllSuppliers();

        $this->response($suppliers_list, REST_Controller::HTTP_OK);
    }

    public function getSuppliersById_get()
    {
        $supplier_id = $this->get('supplier_id');

        $suppliers_list = $this->Suppliers_Model->getSuppliersById($supplier_id);

        $this->response($suppliers_list, REST_Controller::HTTP_OK);
    }

    public function addNewSupplier_post()
    {
        $db_values = array();
        $db_values['SupplierName'] = $this->post('supplierName');
        $db_values['EmailAdress'] = $this->post('primaryEmail');
        $db_values['PhoneNumber'] = $this->post('contactNumber');
        $db_values['WebsiteName'] = $this->post('websiteName');
        $db_values['Country'] = $this->post('country');
        $db_values['CreatedBy'] = $this->userInfo->userID;
        $db_values['CreatedOn'] = date("Y-m-d H:i:s");
        // $db_values['BusinessType'] = $this->post('BusinessType');
        // $db_values['Category'] = $this->post('Category');
        // $db_values['StockCount'] = $this->post('StockCount');

        $this->Suppliers_Model->addNewSupplier($db_values);

        $this->response(["New Supplier Added Successfully"], REST_Controller::HTTP_OK);
    }

    public function deleteSupplierById_put($supplier_id)
    {
        $db_values['Active'] = 0;
        $db_values['DeletedOn'] = date("Y-m-d");
        $this->Suppliers_Model->updateSuppliersById($supplier_id,$db_values);

        $this->response(["Supplier Deleted Successfully"], REST_Controller::HTTP_OK);
    }
}
