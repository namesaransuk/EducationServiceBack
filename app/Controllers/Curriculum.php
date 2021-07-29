<?php 

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;//ทำAPI
use CodeIgniter\API\ResponseTrait;//จัดเป็น json เอง
use App\Models\CurriculumModel;

use ResourceBundle;

class Curriculum extends ResourceController
{
    use ResponseTrait;

    public function getCurriculum()
    {
        $model = new CurriculumModel();
        $studentdata['curriculum'] = $model->orderBy('id_curriculum')->findAll();
        return $this->respond($studentdata);
    }   
}