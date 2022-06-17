<?php

namespace App\Models;

use CodeIgniter\Model;

class Account extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'account';
    protected $primaryKey       = 'account_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'account_created';
    protected $updatedField  = 'account_modified';
    protected $deletedField  = 'account_deleted';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
