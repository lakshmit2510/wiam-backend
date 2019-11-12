<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class WorkOrder extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

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
        $directors = array("Alfred Hitchcock", "Stanley Kubrick", "Martin Scorsese", "Fritz Lang");

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
    public function getWorkOrdersById($work_order_id = 0)
    {
        $directors = array("Alfred Hitchcock", "Stanley Kubrick", "Martin Scorsese", "Fritz Lang");
        if (!empty($work_order_id)) {
            // $data = $this->db->get_where("items", ['id' => $id])->row_array();
        } else {
            // $data = $this->db->get("items")->result();
        }

        $this->response($directors, REST_Controller::HTTP_OK);

    }
}
