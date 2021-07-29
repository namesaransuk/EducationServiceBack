<?php
namespace app\Models;
use CodeIgniter\Model;

class DegreeModel extends Model{
    protected $table = 'degree';
    protected $primaryKey = 'id_degree';
    protected $allowedFields = ['id_degree', 'name_degree','initials_degree'];
}
?>