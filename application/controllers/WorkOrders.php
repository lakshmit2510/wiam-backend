<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class WorkOrders extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('WorkOrders_Model');

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
    public function getAllWorkOrders_get()
    {

        $work_orders_list = $this->WorkOrders_Model->getAllWorkOrders();

        $this->response($work_orders_list, REST_Controller::HTTP_OK);

    }
    public function getWorkOrdersById_get()
    {
        $work_order_id = $this->get('work_order_id');

        $work_orders_list = $this->WorkOrders_Model->getWorkOrdersById($work_order_id);

        $this->response($work_orders_list, REST_Controller::HTTP_OK);

    }

    public function createWorkOrder_post()
    {
        $db_values = array();
        $db_values['Code'] = $this->post('Code');
        $db_values['Priority'] = $this->post('Priority');
        $db_values['AssetCode'] = $this->post('AssetCode');
        $db_values['PartsID'] = $this->post('PartsID');
        $db_values['AssignedUsers'] = $this->post('AssignedUsers');
        $db_values['WorkType'] = $this->post('WorkType');
        $db_values['CompletedByUsers'] = $this->post('CompletedByUsers');
        $db_values['EstimatedHours'] = $this->post('EstimatedHours');
        $db_values['SpentHours'] = $this->post('SpentHours');
        $db_values['SummaryIssue'] = $this->post('SummaryIssue');
        $db_values['RequestedCompletionDate'] = $this->post('RequestedCompletionDate');
        $db_values['Status'] = $this->post('Status');

        $this->WorkOrders_Model->createWorkOrder($db_values);

        $this->response(["Work Order Created Successfully"], REST_Controller::HTTP_OK);

    }
    public function updateWorkOrdersById_put()
    {
        $db_values = array();
        $ID = $this->put('ID');
        $db_values['Code'] = $this->put('Code');
        $db_values['Priority'] = $this->put('Priority');
        $db_values['AssetCode'] = $this->put('AssetCode');
        $db_values['PartsID'] = $this->put('PartsID');
        $db_values['AssignedUsers'] = $this->put('AssignedUsers');
        $db_values['WorkType'] = $this->put('WorkType');
        $db_values['CompletedByUsers'] = $this->put('CompletedByUsers');
        $db_values['EstimatedHours'] = $this->put('EstimatedHours');
        $db_values['SpentHours'] = $this->put('SpentHours');
        $db_values['SummaryIssue'] = $this->put('SummaryIssue');
        $db_values['RequestedCompletionDate'] = $this->put('RequestedCompletionDate');
        $db_values['Status'] = $this->put('Status');

        $this->WorkOrders_Model->updateWorkOrdersById($ID, $db_values);

        $this->response(["Work Order Updated Successfully"], REST_Controller::HTTP_OK);

    }
    public function deleteWorkOrdersById_delete($work_order_id)
    {

        $this->WorkOrders_Model->deleteWorkOrdersById($work_order_id);

        $this->response(["Work Order Deleted Successfully"], REST_Controller::HTTP_OK);

    }
}
