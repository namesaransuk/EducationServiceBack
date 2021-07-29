<?php
namespace app\Models;
use CodeIgniter\Model;

class UniversityModel extends Model{
    protected $table = 'university';
    protected $primaryKey = 'id_university';
    protected $allowedFields = ['id_university' , 'name_uni' , 'url_uni' , 'logo_uni' , 'detail_uni'];
}
?>