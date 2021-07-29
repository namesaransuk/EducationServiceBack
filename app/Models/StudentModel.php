<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model{
    protected $table = 'student';
    protected $primaryKey = 'id_stu' ;
    protected $allowedFields = ['id_stu','id_title','fname_stu','lname_stu','id_curriculum','GPA_stu','year_class','class','year_stu','password_stu'];
   
}
