<?php

namespace App\Models;

use CodeIgniter\Model;

class EduConditionModel extends Model
{
    protected $table = 'edu_condition';
    protected $primarykey = 'id_condition';
    protected $allowedFields = ['GPA','	curriculum_edu','note_condi'];
}
