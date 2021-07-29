<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\StudentModel;
use App\Models\StaffModel;


use ResourceBundle;

class Login extends ResourceController
{
    use ResponseTrait;
    //get all product
    public function index()
    {
        $stumodel = new StudentModel();
        $staffmodel = new StaffModel();

        $logs = [
            "id_stu" =>  $this->request->getVar('id_user '),
            "password_stu" =>  $this->request->getVar('password_user')
        ];
        $logstaff = [
            "phone_staff" =>  $this->request->getVar('id_user '),
            "password_staff" =>  $this->request->getVar('password_user')
        ];
        $logadmin = [
            "id_staff" =>  $this->request->getVar('id_user'),
            "password_staff" =>  $this->request->getVar('password_user')
        ];
        $checks = $stumodel->where($logs)->findAll();
        $checkstaff = $staffmodel->where($logstaff)->findAll();
        $checkadmin = $staffmodel->where($logadmin)->findAll();

        if (count($checks) == 1) {
            foreach ($checks as $row) {
                $id = $row['id_stu'];
                $fname = $row['fname_stu'];
                $lname = $row['lname_stu'];
            }
            $response = [
                'id' => $id,
                'fname' => $fname,
                'lname' => $lname,
                'message' =>  'Student'
            ];
            return $this->respond($response);
            
        } elseif (count($checkstaff) == 1) {
            foreach ($checkstaff as $row) {
                $id = $row['id_staff'];
                // $fname = $row['fname_staff'];
                // $lname = $row['lname_staff'];
                // $id_staff = $row['id_staff'];
                $fname_staff = $row['fname_staff'];
                $lname_staff = $row['lname_staff'];
            }
            $response = [
                'id' => $id,
                // 'fname_staff' => $fname,
                // 'lname_staff' => $lname,
                // 'id_staff' => $id_staff,
                'fname_staff' => $fname_staff,
                'lname_staff' => $lname_staff,
                'message' =>  'Teacher'
            ];

            return $this->respond($response);
            
        } elseif (count($checkadmin) == 1) {
            foreach ($checkadmin as $row) {
                $id = $row['id_staff'];
                // $fname = $row['fname_staff'];
                // $lname = $row['lname_staff'];
                // $id_staff = $row['id_staff'];
                $fname_admin = $row['fname_staff'];
                $lname_admin = $row['lname_staff'];
            }
            $response = [
                'id' => $id,
                // 'fname_staff' => $fname,
                // 'lname_staff' => $lname,
                // 'id_staff' => $id_staff,
                'fname_admin' => $fname_admin,
                'lname_admin' => $lname_admin,
                'message' =>  'Admin'
            ];

            return $this->respond($response);





        } else {
            $response = [

                'message' =>  'fail'
            ];
            return $this->respond($response);
        }
    }
}
