<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\EduConditionModel;
use ResourceBundle;

class EduCondition extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new EduConditionModel();
        $data['eduCondition'] = $model->orderBy('id_condition','DESC')->findAll();
        return $this->respond($data);
    }

     /*public function getEducation()
    {
        $model = new EducationModel();
        $data['geteducation'] = $model->getEducation();
        //print_r($data);
        return $this->respond($data);
    }*/

    public function createEduCondition(){
 
        $model = new EduConditionModel();
        $data =[
           "GPA"=> $this->request->getVar('GPA'),
           "curriculum_edu"=> $this->request->getVar('curriculum_edu'),
           "note_condi"=> $this->request->getVar('note_condi'),
        ];
        $model->insert($data);
        $response=[
            'satatus'=>201,
            'error'=>null,
            'message'=>[
                'success' => 'EduCondition create successfully'
            ]
        ];
            return $this->respond($response);
    } 

    public function updateEduCondition($id = null)
    {
        $model = new EduConditionModel();
        $data =[
            "GPA"=> $this->request->getVar('GPA'),
           "curriculum_edu"=> $this->request->getVar('curriculum_edu'),
           "note_condi"=> $this->request->getVar('note_condi'),
        ];
 
        $model->update($id, $data);
        $response=[
            'satatus'=>201,
            'error'=>null,
            'message'=>[
                'success' => ''
            ]
        ];
            return $this->respond($response);
    } 
}