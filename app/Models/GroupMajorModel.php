<?php
namespace app\Models;
use CodeIgniter\Model;

class GroupMajorModel extends Model{
    protected $table = 'group_major';
    protected $primaryKey = 'id_major';
    protected $allowedFields = ['id_major', 'name_major'];
}
?>