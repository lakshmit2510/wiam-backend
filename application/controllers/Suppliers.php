<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Suppliers extends REST_Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('Suppliers_Model');
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
        // $db_values['AssetCode'] = $this->post('AssetCode');
        $db_values['SupplierName'] = $this->post('SupplierName');
        $db_values['EmailAdress'] = $this->post('EmailAdress');
        $db_values['PhoneNumber'] = $this->post('PhoneNumber');
        $db_values['WebsiteName'] = $this->post('WebsiteName');
        $db_values['Country'] = $this->post('Country');
        $db_values['BusinessType'] = $this->post('BusinessType');
        // $db_values['Category'] = $this->post('Category');
        // $db_values['StockCount'] = $this->post('StockCount');

        $this->Suppliers_Model->addNewSupplier($db_values);

        $this->response(["New Supplier Added Successfully"], REST_Controller::HTTP_OK);
    }

    public function updateSuppliersById_put()
    {
        $db_values = array();
        $SupplierID = $this->put('SupplierID');
        $db_values['SupplierName'] = $this->post('SupplierName');
        $db_values['EmailAdress'] = $this->post('EmailAdress');
        $db_values['PhoneNumber'] = $this->post('PhoneNumber');
        $db_values['WebsiteName'] = $this->post('WebsiteName');
        $db_values['Country'] = $this->post('Country');
        $db_values['BusinessType'] = $this->post('BusinessType');

        $this->Suppliers_Model->updateSuppliersById($SupplierID, $db_values);

        $this->response(["Supplier Updated Successfully"], REST_Controller::HTTP_OK);
    }

    public function deleteSupplierById_delete($supplier_id)
    {

        $this->Suppliers_Model->deleteSupplierById($supplier_id);

        $this->response(["Supplier Deleted Successfully"], REST_Controller::HTTP_OK);
    }
}
