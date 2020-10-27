<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cron extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        // $this->load->config('email');
        $this->load->model('Vehicles_List_Model');
        $this->load->library('email');
    }
    public function index()
    {
        
    }

    public function Send_Cron()
    {
        $currentDate = $this->Vehicles_List_Model->getVehicleEmailByDate();

        if (!empty($currentDate)){
            foreach ($currentDate as $key => $value) {
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_crypto' => "ssl",
                    'smtp_host' => 'smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'lakshmi.t2510@gmail.com',
                    'smtp_pass' => 'lovelylakshmi',
                    'mailtype'  => 'text', 
                    'charset'   => 'iso-8859-1'
                );
                $this->email->initialize($config);
                $this->email->to('lakshmi.t2510@gmail.com');
                $this->email->from("lakshmi.t2510@gmail.com");
                $this->email->subject("Appointment Reminder");
                $this->email->message("You have an appointment tomorrow");
                $this->email->set_newline("\r\n");
                
                // Set to, from, message, etc.
                
                $result = $this->email->send();
        
                if($result){
                    echo 'Email Sent.';
                    return;
                }else{
                    echo 'Email Sent Failed.';
                    return;
                }
            }
        }
        // if(!$this->input->is_cli_request())
        //     {
        //         echo "This script can only be accessed via the command line";
        //         return;
        //     }
        //     $this->email->to('lakshmi.t2510@gmail.com');
        //     $this->email->from("lakshmi.t2510@gmail.com");
        //     $this->email->subject("Appointment Reminder");
        //     $this->email->message("You have an appointment tomorrow");
        //     $this->email->send();
        //     if($this->email->send()){
        //         echo 'Email Sent.';
        //         return;
        //     }else{
        //         echo 'Email Sent Failed.';
        //         return;
        //     }

        // $config = Array(
        //     'protocol' => 'smtp',
        //     'smtp_crypto' => "ssl",
        //     'smtp_host' => 'smtp.googlemail.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => 'lakshmi.t2510@gmail.com',
        //     'smtp_pass' => 'lovelylakshmi',
        //     'mailtype'  => 'text', 
        //     'charset'   => 'iso-8859-1'
        // );
        // $this->email->initialize($config);
        // $this->email->to('lakshmi.t2510@gmail.com');
        // $this->email->from("lakshmi.t2510@gmail.com");
        // $this->email->subject("Appointment Reminder");
        // $this->email->message("You have an appointment tomorrow");
        // $this->email->set_newline("\r\n");
        
        // // Set to, from, message, etc.
        
        // $result = $this->email->send();

        // if($result){
        //     echo 'Email Sent.';
        //     return;
        // }else{
        //     echo 'Email Sent Failed.';
        //     return;
        // }
               
    }
}
