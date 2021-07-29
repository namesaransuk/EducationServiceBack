<?php

namespace App\Models;

use CodeIgniter\Model;

class EducationStudentModel extends Model{
    protected $table = 'edu_stu';
    protected $primaryKey = 'id_edu_stu' ;
    protected $allowedFields = ['id_edu_stu','id_stu','id_university','id_faculty','id_course','id_major'];
}