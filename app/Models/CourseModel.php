<?php
namespace app\Models;
use CodeIgniter\Model;

class CourseModel extends Model{
    protected $table = 'course';
    protected $primaryKey = 'id_course';
    protected $allowedFields = ['id_course', 'name_course', 'id_major', 'id_degree']; 
}
?>