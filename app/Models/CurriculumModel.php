<?php

namespace App\Models;

use CodeIgniter\Model;

class CurriculumModel extends Model{
    protected $table = 'curriculum';
    protected $primaryKey = 'id_curriculum' ;
    protected $allowedFields = ['id_curriculum','name_curriculum'];
   
}
