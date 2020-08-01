<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    public function index_post()
    {
        $directors = array("GET Working");

        $this->response($directors, REST_Controller::HTTP_OK);
    }

    public function login_post()
    {
        $email = $this->post('email');
        $pass = $this->post('password');

        $userDetails = $this->Users_Model->getUser($email, $pass);

        $token = array();
        $token['email'] = $userDetails[0]->Email;
        $token['userID'] = $userDetails[0]->UserID;
        $token['date'] = new DateTime();

        if ($userDetails[0]->Role === '1') {
            $token['role'] = 'Admin';
        } else {
            $token['role'] = 'Customer';
        }
        $res = array();
        if ($userDetails) {
            $res['status'] = "ok";
            $res['token'] = base64_encode(json_encode($token));
            $res['message'] = "User authenticated sucessfully";
        } else {
            $res['status'] = "error";
            $res['message'] = "Incorrect Username or Password";
        }

        $this->response($res, REST_Controller::HTTP_OK);
    }

    public function getAllUsersList_get()
    {
        $users_list = $this->Users_Model->getAllUsers();

        $this->response($users_list, REST_Controller::HTTP_OK);
    }
    public function addNewUser_post()
    {
        $db_values = array();
        $db_values['FirstName'] = $this->post('firstName');
        $db_values['LastName'] = $this->post('lastName');
        $db_values['Email'] = $this->post('email');
        $db_values['Password'] = $this->post('password');
        $db_values['PhoneNumber'] = $this->post('phoneNumber');
        $db_values['PhoneNumberPrefix'] = $this->post('phoneNumberPrefix');
        $db_values['CompanyName'] = $this->post('companyName');
        $db_values['CompanyAddress'] = $this->post('companyAddress');
        $db_values['CreatedOn'] = date("Y-m-d H:i:s");
        $db_values['Role'] = 2;
        $db_values['Active'] = 1;
        $res = array();
        if ($this->Users_Model->isUserExists($db_values['Email']) > 0) {
            $res['status'] = "error";
            $res['message'] = "The email entered is already exists.";
            $this->response($res, REST_Controller::HTTP_OK);
        } else {
            $this->Users_Model->saveUser($db_values);
            $res['status'] = "ok";
            $res['message'] = "User created sucessfully";
            $this->response($res, REST_Controller::HTTP_OK);
        }
    }

    public function deleteUserById_put($user_id)
    {
        $db_values['Active'] = 0;
        $db_values['DeletedOn'] = date("Y-m-d");
        $this->Users_Model->updateUsersById($user_id, $db_values);

        $this->response(["User Details Deleted Successfully"], REST_Controller::HTTP_OK);
    }
}
