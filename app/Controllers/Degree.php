<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DegreeModel;

class Degree extends ResourceController
{
    use ResponseTrait;

//+createDegree(degree_id, degree_name) : Degree
//+updateDegree(updateAttr,updatedata) : boolean


    public function index()
    {
        $model = new DegreeModel();
        $data['degree'] = $model->orderBy('id_degree','DESC')->findAll();
        return $this->respond($data);
    }

    public function getDegree($id = null){

        $model = new DegreeModel();
        $data = $model->where('id_degree',$id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Product Found');
        }

    }

    public function createDegree(){

//-degree_id : int
//-degree_name :string
//-degree_initials : string


        $degree = new DegreeModel();
        $data =[
            "id_degree"=> $this->request->getvar('id_degree'),
            "name_degree"=> $this->request->getvar('name_degree'),
            "initials_degree"=> $this->request->getvar('initials_degree')
        ];

        $checkdegree = $degree->where('name_degree',$data['name_degree'])->first();

        if ($checkdegree === null){
            $degree->insert($data);
            $response=[
                'satatus'=>201,
                'error'=>null,
                'meessage'=>[
                    'success' => 'เพิ่มหลักสูตรสำเร็จ !!'
                ]
            ];
                return $this->respond($response);
        } else {
            $response = [
                'satatus' => 202,
                'error' => null,
                'meessage' => [
                    'success' => 'หลักสูตรนี้ มีข้อมูลอยู่แล้ว !!'
                ]
            ];

            return $this->respond($response);
        }
        
    } 

    public function updateDegree($id = null)
    {
        
        $model = new DegreeModel();
        $data =[
            "name_degree"=> $this->request->getvar('name_degree'),
            "initials_degree"=> $this->request->getvar('initials_degree')
        ];

        $model->update($id, $data);
        $response=[
            'satatus'=>201,
            'error'=>null,
            'meessage'=>[
                'success' => 'Degree create successfully'
            ]
        ];
            return $this->respond($response);
    } 
   

    
}
?>