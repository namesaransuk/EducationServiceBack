<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RoundModel;
use ResourceBundle;

class Round extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new RoundModel();
        $rounddata['round'] = $model->orderBy('id_round', 'DESC')->findAll();
        return $this->respond($rounddata);
    }
   
    public function getEducatioById($id = null)
    {
        $model = new RoundModel();
        $rounddata = $model->where('id_round',$id)->first();
        if($rounddata){
            return $this->respond($rounddata);
        }else{
            return $this->failNotFound('Not found');
        }
    }

  
}
