<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'category';
    protected $primaryKey       = 'category_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['category_name', 'category_description'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'category_created';
    protected $updatedField  = 'category_modified';
    protected $deletedField  = 'category_deleted';

    // Validation
    protected $validationRules      = [
        'category_name' => [
            'label' => 'Name',
            'rules' => 'required|alpha_numeric_space|max_length[250]'
        ],

        'category_description' => [
            'label' => 'Description',
            'rules' => 'required|alpha_numeric_space|max_length[250]'
        ]
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;


}
