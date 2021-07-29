<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\GroupMajorModel;

class GroupMajor extends ResourceController
{
    use ResponseTrait;

    //+createGroupMajor(groupmajor_id, groupmajor_name):GroupMajor
    //+updateGroup(updateAttr,updatedata): boolean


    public function index()
    {
        $major = new GroupMajorModel();
        $data['major'] = $major->orderBy('id_major', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function getGroupMajor($id = null){

        $major = new GroupMajorModel();
        $data = $major->where('id_major',$id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Product Found');
        }

    }

    public function createGroupMajor()
    {

        //-groupmajor_id : int
        //-groupmajor_name :string


        $major = new GroupMajorModel();
        $data = [
            "id_major" => $this->request->getvar('id_major'),
            "name_major" => $this->request->getvar('name_major')
        ];

        $checkmajor = $major->where('name_major',$data['name_major'])->first();
        if ($checkmajor === null) {
            $major->insert($data);
            $response = [
                'satatus' => 201,
                'error' => null,
                'meessage' => [
                    'success' => 'เพิ่มกลุ่มสาขาสำเร็จ !!'
                ]
            ];
            return $this->respond($response);
        } else {
            $response = [
                'satatus' => 202,
                'error' => null,
                'meessage' => [
                    'success' => 'กลุ่มสาขานี้ มีข้อมูลอยู่แล้ว !!'
                ]
            ];

            return $this->respond($response);
        }
    }

    public function updateGroupMajor($id = null)
    {

        $major = new GroupMajorModel();
        $data = [
            "name_major" => $this->request->getvar('name_major')
        ];

        $major->update($id, $data);
        $response = [
            'satatus' => 201,
            'error' => null,
            'meessage' => [
                'success' => 'Group Major Update successfully'
            ]
        ];
        return $this->respond($response);
    }
}
