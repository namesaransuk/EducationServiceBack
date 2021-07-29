<?php

namespace App\Models;

use CodeIgniter\Model;

class RoundModel extends Model{
    protected $table = 'round';
    protected $primaryKey = 'id_round' ;
    protected $allowedFields = ['name_round'];
}