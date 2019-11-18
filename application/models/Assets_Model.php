<?php

class Assets_Model extends CI_Model
{

    public function getAllAssets()
    {
        $query = $this->db->get('assets');

        return $query->result();
    }

    public function getAssetById($asset_id)
    {

        $query = $this->db->get_where('assets', array('AssetID' => $asset_id));

        return $query->result();
    }

    public function updateAssetsById($asset_id, $data)
    {

        $this->db->where('AssetID', $asset_id);
        $this->db->update('assets', $data);

    }

    public function addNewAsset($data)
    {

        $this->db->insert('assets', $data);

    }
    public function deleteAssetById($asset_id)
    {

        $this->db->delete('assets', array('AssetID' => $asset_id));

    }

}
