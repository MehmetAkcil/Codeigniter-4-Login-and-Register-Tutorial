<?php

namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{
    protected $table      = 'db_users';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';


    protected $allowedFields = [
        'user_name', 'user_email', 'user_password'
    ];

}