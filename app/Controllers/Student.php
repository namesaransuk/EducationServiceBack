<?php 
//https://github.com/Sorrawit055/EducationServiceBack2.git
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;//ทำAPI
use CodeIgniter\API\ResponseTrait;//จัดเป็น json เอง
use App\Models\StudentModel;
use App\Models\EducationModel;
use App\Models\TitleModel;

use ResourceBundle;

class Student extends ResourceController
{
    use ResponseTrait;

    public function getAllStudent()
    {
        $model = new StudentModel();
        $studentdata['student'] = $model->orderBy('id_stu','DESC')->findAll();
        return $this->respond($studentdata);
    }

    public function getStudent($studentID = null){
        $stumodel = new StudentModel();
        $studentdata = $stumodel->join('title', 'title.id_title = student.id_title')
        ->join('curriculum', 'curriculum.id_curriculum = student.id_curriculum')
        ->select('title.name_title')
        ->select('curriculum.name_curriculum')
        ->select('student.*')
        ->where('student.id_stu',$studentID)->first();
        return $this->respond($studentdata);
    }

//     public function addStudent(){
//         $model = new StudentModel();
//         $studentdata =[
//             "id_stu"=> $this->request->getvar('id_stu'),
//             "id_title"=> $this->request->getvar('id_title'),
//             "fname_stu"=> $this->request->getvar('fname_stu'),
//             "lname_stu"=> $this->request->getvar('lname_stu'),
//             "id_curriculum"=> $this->request->getvar('id_curriculum'),
//             "GPA_stu"=> $this->request->getvar('GPA_stu'),
//             "year_class"=> $this->request->getvar('year_class'),
//             "class"=> $this->request->getvar('class'),
//             "year_stu"=> $this->request->getvar('year_stu'),
//             "password_stu"=> $this->request->getvar('password_stu'),

//         ];
//         $check = $model->where('id_stu',$studentdata['id_stu'])->first();

//         if($check === null){
//         $model->insert($studentdata);
//         $response=[
//             'satatus'=>201,
//             'error'=>null,
//             'meessage'=>[
//                 'success' => 'สมัครสำเร็จ'
//             ]
//         ];
//         return $this->respond($response);
//     }else{
//         $response=[
//             'satatus'=>400,
//             'error'=>null,
//             'meessage'=>[
//                 'success' => 'ข้อมูลมีอยู่เเล้ว'
//             ]
//         ];
//         return $this->respond($response);

//     } 

// }
    public function updateProfileStudent($studentID = null)
    {
        $model = new StudentModel();
        $studentdata =[
            "id_title "=> $this->request->getvar('id_title'),
            "fname_stu"=> $this->request->getvar('fname_stu'),
            "lname_stu"=> $this->request->getvar('lname_stu'),
            "id_curriculum"=> $this->request->getvar('id_curriculum'),
            "GPA_stu"=> $this->request->getvar('GPA_stu'),
            "year_class"=> $this->request->getvar('year_class'),
            "class"=> $this->request->getvar('class'),
            "year_stu"=> $this->request->getvar('year_stu'),
            "password_stu"=> $this->request->getvar('password_stu'),
        ];

        $model->update($studentID,$studentdata);
        $response=[
            'satatus'=>201,
            'error'=>null,
            'meessage'=>[
                'success' => 'อัพเดตข้อมูลส่วนตัวเสร็จสิ้น'
            ]
        ];
            return $this->respond($response);
    } 

    // public function InsertEducationStudent($studentID = null){
    //     $model = new StudentModel();
    //     $model = new EducationModel();
    //     $studentdata = $model->where('id_stu',$studentID)->first();
    //     $studentdata =[
    //         "id_stu"=> $this->request->getvar('id_stu'),
    //         "id_university"=> $this->request->getvar('id_university'),
    //         "id_faculty"=> $this->request->getvar('id_faculty'),
    //         "id_course"=> $this->request->getvar('id_course'),
    //         "id_major"=> $this->request->getvar('id_major'),
    //     ];
    //     $model->insert($studentdata,);
    //     $response=[
    //         'satatus'=>201,
    //         'error'=>null,
    //         'meessage'=>[
    //             'success' => 'สมัครสำเร็จ'
    //         ]
    //     ];
    //         return $this->respond($response);
    // } 
}