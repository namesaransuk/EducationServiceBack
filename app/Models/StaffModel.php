<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model{
    protected $table = 'staff';
    protected $primaryKey = 'id_staff' ;
    protected $allowedFields = ['id_staff','id_title','fname_staff','lname_staff','phone_staff','password_staff','id_position'];
   
}