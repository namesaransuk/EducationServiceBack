<?php

namespace App\Models;

use CodeIgniter\Model;

class TitleModel extends Model{
    protected $table = 'title';
    protected $primaryKey = 'id_title' ;
    protected $allowedFields = ['id_title','name_title'];
   
}
