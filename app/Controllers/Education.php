<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\EducationModel;
use ResourceBundle;

class Education extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new EducationModel();
        $educationdata['education'] = $model->orderBy('id_education', 'DESC')->findAll();
        return $this->respond($educationdata);
    }
    public function getEducation()
    {
        $model = new EducationModel();
        $educationdata = $model->join('round', 'round.id_round = education.id_round')
        ->join('university', 'university.id_university = education.id_university')
        ->select('round.name_round')
        ->select('university.name_uni')
        ->select('education.*')
        ->orderBy('education.id_education')->findAll();
            if($educationdata){
                return $this->respond($educationdata);
            }else{
                return $this->failNotFound('Not found');
            }
    }
    public function getEducatioById($id = null)
    {
        $model = new EducationModel();
        $educationdata = $model->join('round', 'round.id_round = education.id_round')
        ->join('university', 'university.id_university = education.id_university')
        ->select('round.name_round')
        ->select('university.name_uni')
        ->select('education.*')
        ->orderBy('education.id_education')
        ->where('id_education',$id)->first();
        if($educationdata){
            return $this->respond($educationdata);
        }else{
            return $this->failNotFound('Not found');
        }
    }

    public function createEducation()
    {

        $model = new EducationModel();
        $educationdata = [
            "year_edu" => $this->request->getVar('year_edu'),
            "id_round" => $this->request->getVar('id_round'),
            "id_university" => $this->request->getVar('id_university'),
            "tcas" => $this->request->getVar('tcas'),
            "open_date" => $this->request->getVar('open_date'),
            "close_date" => $this->request->getVar('close_date'),
            "list_day" => $this->request->getVar('list_day'),
            "general" => $this->request->getVar('general'),
            "doculment_edu" => $this->request->getVar('doculment_edu'),
            "note_edu" => $this->request->getVar('note_edu'),
            "url_doculment" => $this->request->getVar('url_doculment')
        ];
        $model->insert($educationdata);
        $response = [
            'satatus' => 201,
            'error' => null,
            'meessage' => [
                'success' => 'เพิ่มข้อมูลการศึกษาต่อสำเร็จ'
            ],
            'data' => $educationdata
        ];
        return $this->respond($response);
    }

    public function updateEducation($id = null)
    {
        $model = new EducationModel();
        $educationdata = [
            "year_edu" => $this->request->getVar('year_edu'),
            "id_round" => $this->request->getVar('id_round'),
            "id_university" => $this->request->getVar('id_university'),
            "tcas" => $this->request->getVar('tcas'),
            "open_date" => $this->request->getVar('open_date'),
            "close_date" => $this->request->getVar('close_date'),
            "list_day" => $this->request->getVar('list_day'),
            "general" => $this->request->getVar('general'),
            "doculment_edu" => $this->request->getVar('doculment_edu'),
            "note_edu" => $this->request->getVar('note_edu'),
            "url_doculment" => $this->request->getVar('url_doculment')
        ];

        $model->update($id, $educationdata);
        $response = [
            'satatus' => 201,
            'error' => null,
            'meessage' => [
                'success' => 'แก้ไขข้อมูลการศึกษาต่อสำเร็จ'
            ]
        ];
        return $this->respond($response);

    }

    

    public function deletedEducation($id = null)
    {
        $model = new EducationModel();
        $educationdata = $model->delete($id);
        if ($educationdata) {
            $model->delete($id);
            $response = [
                'satatus' => 200,
                'error' => null,
                'meessage' => [
                    'success' => 'ลบข้อมูลการศึกษาต่อสำเร็จ'
                ]
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('No');
        }
    }
}
