<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\FacultyModel;

class Faculty extends ResourceController
{
    use ResponseTrait;

    //+createFaculty(FacultyName) : Faculty
    //+updateFaculty(updateAttr,updatedata): boolean

    public function index()
    {
        $model = new FacultyModel();
        $data['faculty'] = $model->orderBy('id_Faculty', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function getFacultyAll()
    {
        $model = new FacultyModel();
        $data['faculty'] = $model->orderBy('id_Faculty', 'DESC')->findAll();
        return $this->respond($data);
    }
    
    public function getFaculty($id = null){

        $model = new FacultyModel();
        $data = $model->where('id_Faculty',$id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Product Found');
        }

    }

    public function createFaculty()
    {
        //-faculty_id : int
        //-faculty_name :string

        $faculty = new FacultyModel();
        $data = [
            "id_faculty" => $this->request->getvar('id_university'),
            "name_faculty" => $this->request->getvar('name_faculty')
        ];

        $checkfac = $faculty->where('name_faculty',$data['name_faculty'])->first();
        if ($checkfac === null) {
            $faculty->insert($data);
            $response = [
                'satatus' => 201,
                'error' => null,
                'meessage' => [
                    'success' => 'เพิ่มคณะสำเร็จ'
                ]
            ];
        } else{
            $response = [
                'satatus' => 202,
                'error' => null,
                'meessage' => [
                    'success' => 'คณะนี้มีข้อมูลอยู่แล้ว'
                ]
            ];
        }

        return $this->respond($response);
    }

    public function updateFaculty($id = null)
    {

        $model = new FacultyModel();
        $data = [
            "name_faculty" => $this->request->getvar('name_faculty')
        ];

        $model->update($id, $data);
        $response = [
            'satatus' => 201,
            'error' => null,
            'meessage' => [
                'success' => 'Faculty create successfully'
            ]
        ];
        return $this->respond($response);
    }
}
