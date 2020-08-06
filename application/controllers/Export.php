<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends REST_Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Cache-Control: max-age=0');

        parent::__construct();
        $this->load->model('Product_Request_List_Model');
        $this->load->model('Parts_Model');
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

    public function workOrderList_get()
    {
        $from = $this->get('from');
        $to = $this->get('to');
        $vNo = $this->get('vNo');
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

        $work_orders_list = $this->Product_Request_List_Model->getListByDateAndVNo($from, $to, $vNo);
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
        $sheet = $spreadsheet->getActiveSheet();
        // add style to the header
        $styleArray = array(
            'font' => array(
                'bold' => true,
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ),
            'borders' => array(
                'bottom' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => array('rgb' => '333333'),
                ),
            ),
            'fill' => array(
                'type'       => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array('rgb' => '0d0d0d'),
                'endColor'   => array('rgb' => 'f2f2f2'),
            ),
        );
        $sheet->getStyle('A1:G1')->applyFromArray($styleArray);
        $partsStyleArray = array(
            'font' => array(
                'bold' => true,
            ),
            'fill' => array(
                'type'       => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array('rgb' => '0d0d0d'),
                'endColor'   => array('rgb' => 'f2f2f2'),
            ),
        );
        // auto fit column to content
        foreach (range('A', 'G') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }


        $sheet->setCellValue('A1', 'RequestId');
        $sheet->setCellValue('B1', 'RequestFormNo');
        $sheet->setCellValue('C1', 'VehicleNo');
        $sheet->setCellValue('D1', 'PartsList');
        $sheet->setCellValue('E1', 'QTYRequested');
        $sheet->setCellValue('F1', 'PartsRequestedDate');
        $sheet->setCellValue('G1', 'CreatedOn');
        // Add some data
        $x = 2;
        foreach ($work_orders_list as $get) {
            $sheet->setCellValue('A' . $x, $get['RequestId']);
            $sheet->setCellValue('B' . $x, $get['RequestFormNo']);
            $sheet->setCellValue('C' . $x, $get['VehicleNo']);
            $sheet->setCellValue('D' . $x, $get['PartsList']);
            $sheet->setCellValue('E' . $x, $get['QTYRequested']);
            $sheet->setCellValue('F' . $x, $get['PartsRequestedDate']);
            $sheet->setCellValue('G' . $x, $get['CreatedOn']);
            $ItemNumberList = explode(',', $get['PartsList']);
            $parts_list = $this->Parts_Model->getPartsInIdSet($ItemNumberList);
            if (count($parts_list) > 0) {
                $x++;
                $sheet->setCellValue('B' . $x, 'PartsName');
                $sheet->setCellValue('D' . $x, 'Part No.');
                $sheet->setCellValue('C' . $x, 'Requested QTY');
                $sheet->getStyle('B' . $x . ':' . 'D' . $x . ':' . 'C' . $x )->applyFromArray($partsStyleArray);
                foreach ($parts_list as $parts_list_get) {
                    $x++;
                    $sheet->setCellValue('B' . $x, $parts_list_get['PartsName']);
                    $sheet->setCellValue('D' . $x, $parts_list_get['ItemNumber']);
                    $sheet->setCellValue('C' . $x, $parts_list_get['QTYInHand']);
                }
            }
            $x++;
        }


        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename = 'work-order-list'; // set filename for excel file to be exported

        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        $writer->save('php://output');    // download file
        exit;
    }
}
