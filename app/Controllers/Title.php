<?php 

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;//ทำAPI
use CodeIgniter\API\ResponseTrait;//จัดเป็น json เอง
use App\Models\TitleModel;

use ResourceBundle;

class Title extends ResourceController
{
    use ResponseTrait;

    public function getTitle()
    {
        $model = new TitleModel();
        $studentdata['title'] = $model->orderBy('id_title')->findAll();
        return $this->respond($studentdata);
    }   
}