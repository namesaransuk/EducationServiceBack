<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\EducationDataModel;
use ResourceBundle;

class EducationData extends ResourceController
{
    use ResponseTrait;

    public function getAllEducationData()
    {
        $edumodel = new EducationDataModel();
        $educationdata = $edumodel->join('education', 'education.id_education = education_detail.id_education')
        ->join('course', 'course.id_course = education_detail.id_course')
        ->join('faculty', 'faculty.id_faculty = education_detail.id_faculty')
        ->join('university', 'university.id_university = education.id_university')
        ->join('round', 'round.id_round = education.id_round')
        ->join('group_major', 'group_major.id_major = course.id_major')
        ->select('group_major.*')
        ->select('round.*')
        ->select('university.*')
        ->select('faculty.*')
        ->select('course.*')
        ->select('education.*')
        ->select('education_detail.*')
        ->orderBy('education_detail.id_edu_detail')->findAll();
        return $this->respond($educationdata);
    }

    public function getEducationdataid($educationID = null){
        $edumodel = new EducationDataModel();
        $educationdata = $edumodel->join('education', 'education.id_education = education_detail.id_education')
        ->join('course', 'course.id_course = education_detail.id_course')
        ->join('faculty', 'faculty.id_faculty = education_detail.id_faculty')
        ->join('university', 'university.id_university = education.id_university')
        ->join('round', 'round.id_round = education.id_round')
        ->join('group_major', 'group_major.id_major = course.id_major')
        ->select('group_major.*')
        ->select('round.*')
        ->select('university.*')
        ->select('faculty.*')
        ->select('course.*')
        ->select('education.*')
        ->select('education_detail.*')
        ->where('education.id_education',$educationID)->first();
        return $this->respond($educationdata);
    }

    // public function SearchEducation($educationdata = null)
    // {
    //     $model = new EducationDataModel();
    //     $educationdata = $model->like('id_edu_detail', $this->request->getVar('id_edu_detail'))
    //     ->orLike('id_course', $this->request->getVar('id_course'))->get();
    //     return $this->respond($educationdata);
    // }
    // $educationdata = $model->like('id_edu_detail',$Keyword,'both');
    // $educationdata = $model->orLike('number_of_edu',$Keyword,'both')

    public function SearchEducation()
    {
        $model = new EducationDataModel();
      

        $educationdata ['item'] = $model->like(  [
                    "id_edu_detail"=> $this->request->getvar('id_edu_detail'),
                    "number_of_edu"=> $this->request->getvar('number_of_edu'),
                    "name_course"=> $this->request->getvar('name_course'),
                    "name_faculty"=> $this->request->getvar('name_faculty'),

            ]
            )->join('education', 'education.id_education = education_detail.id_education')
            ->join('course', 'course.id_course = education_detail.id_course')
            ->join('faculty', 'faculty.id_faculty = education_detail.id_faculty')
            ->join('university', 'university.id_university = education.id_university')
            ->join('round', 'round.id_round = education.id_round')
            ->join('group_major', 'group_major.id_major = course.id_major')
            ->select('group_major.*')
            ->select('round.*')
            ->select('university.*')
            ->select('faculty.*')
            ->select('course.*')
            ->select('education.*')
            ->select('education_detail.*')
      
    
      
        ->orderBy('education_detail.id_edu_detail')->findAll();
      
        return $this->respond($educationdata);
    }
  
    public function search2($keyword = null)
    {
        $model = new EducationDataModel();
       $data = $model->like("name_course", $keyword)
       ->orlike("name_faculty", $keyword)
       ->join('course', 'course.id_course = education_detail.id_course')
       ->join('faculty', 'faculty.id_faculty = education_detail.id_faculty')
       ->join('education', 'education.id_education = education_detail.id_education')
       ->where('id_edu_detail',$keyword)->groupBy('id_edu_detail')
       ->findAll();
       return $this->respond($data);
    }

  
}