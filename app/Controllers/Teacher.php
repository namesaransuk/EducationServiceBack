<?php 
//https://github.com/Sorrawit055/EducationServiceBack2.git
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;//ทำAPI
use CodeIgniter\API\ResponseTrait;//จัดเป็น json เอง
use App\Models\StudentModel;
use App\Models\EducationModel;
use App\Models\TitleModel;

use ResourceBundle;

class Teacher extends ResourceController
{
    use ResponseTrait;

    public function getYear()
    {
        $model = new StudentModel();
        $studentdata['year'] = $model->distinct();
        $studentdata['year'] = $model->select('year_stu')->findAll();
        return $this->respond($studentdata);
    }
    public function getClass()
    {
        $model = new StudentModel();
        $studentdata['class'] = $model->distinct();
        $studentdata['class'] = $model->groupBy('class' , 'year_class')->findAll();
        return $this->respond($studentdata);
    }


    public function getStudentClass($classID = null){
        $stumodel = new StudentModel();
        $studentdata = $stumodel->where('class',$classID)->GroupBy('year_stu','class')
        ->findAll();
        return $this->respond($studentdata);
        // $stumodel = new StudentModel();
        // $studentdata = $stumodel->where('student.class',$classID)->findAll();
        // return $this->respond($studentdata);
    }

    public function getYearClass($YearID = null){
        $stumodel = new StudentModel();
        $studentdata = $stumodel->distinct();
        $studentdata = $stumodel->groupBy('class' , 'year_class');
        $studentdata = $stumodel->where('student.year_stu',$YearID)->findAll();
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