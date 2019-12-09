<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Assets extends REST_Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('Assets_Model');
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
    public function getAllAssets_get()
    {

        $assets_list = $this->Assets_Model->getAllAssets();

        $this->response($assets_list, REST_Controller::HTTP_OK);
    }
    public function getAssetById_get()
    {
        $asset_id = $this->get('asset_id');

        $assets_list = $this->Assets_Model->getAssetById($asset_id);

        $this->response($assets_list, REST_Controller::HTTP_OK);
    }

    public function addNewAsset_post()
    {
        $db_values = array();
        $db_values['AssetCode'] = $this->post('AssetCode');
        $db_values['AssetName'] = $this->post('AssetName');
        $db_values['Description'] = $this->post('Description');
        $db_values['Manufacturer'] = $this->post('Manufacturer');
        $db_values['Model'] = $this->post('Model');
        $db_values['VendorName'] = $this->post('VendorName');
        $db_values['Location'] = $this->post('Location');
        $db_values['Category'] = $this->post('Category');
        $db_values['StockCount'] = $this->post('StockCount');

        $this->Assets_Model->addNewAsset($db_values);

        $this->response(["New Asset Added Successfully"], REST_Controller::HTTP_OK);
    }
    public function updateAssetsById_put()
    {
        $db_values = array();
        $AssetID = $this->put('AssetID');
        $db_values['AssetCode'] = $this->post('AssetCode');
        $db_values['AssetName'] = $this->post('AssetName');
        $db_values['Description'] = $this->post('Description');
        $db_values['Manufacturer'] = $this->post('Manufacturer');
        $db_values['Model'] = $this->post('Model');
        $db_values['VendorName'] = $this->post('VendorName');
        $db_values['Location'] = $this->post('Location');
        $db_values['Category'] = $this->post('Category');
        $db_values['StockCount'] = $this->post('StockCount');

        $this->Assets_Model->updateAssetsById($AssetID, $db_values);

        $this->response(["Asset Updated Successfully"], REST_Controller::HTTP_OK);
    }
    public function deleteAssetById_delete($asset_id)
    {

        $this->Assets_Model->deleteAssetById($asset_id);

        $this->response(["Asset Deleted Successfully"], REST_Controller::HTTP_OK);
    }
}
