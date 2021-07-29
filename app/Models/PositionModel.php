<?php

namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model{
    protected $table = 'position';
    protected $primaryKey = 'id_position' ;
    protected $allowedFields = ['id_position','name_position'];
   
}
