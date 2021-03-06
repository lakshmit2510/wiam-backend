<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Users extends REST_Controller
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
        $this->load->model('Users_Model');
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
    public function index_post($id = 0)
    {
        $directors = array("GET Working");

        $this->response($directors, REST_Controller::HTTP_OK);
    }

    public function login_post()
    {
        $userName = $this->post('username');
        $pass = $this->post('password');

        $userDetails = $this->Users_Model->getUser($userName, $pass);
        $res = array();
        if ($userDetails) {
            $res['status'] = "ok";
            $res['message'] = "User authenticated sucessfully";
        } else {
            $res['status'] = "error";
            $res['message'] = "Incorrect Username or Password";
        }

        $this->response($res, REST_Controller::HTTP_OK);
    }
}
