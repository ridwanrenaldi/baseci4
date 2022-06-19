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
    protected $allowedFields    = ['account_name', 'account_username', 'account_email', 'account_password', 'account_level', 'account_isactive', 'account_image'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'account_created';
    protected $updatedField  = 'account_modified';
    protected $deletedField  = 'account_deleted';

    // Validation
    protected $validationRules      = [
        'account_name' => [
            'label' => 'Name',
            'rules' => 'required|alpha_numeric_space|max_length[20]'
        ],

        'account_username' => [
            'label' => 'Username',
            'rules' => 'required|alpha_numeric|min_length[4]|max_length[12]|is_unique[account.account_username,account_username,{id}]',
        ],

        'account_email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[50]|is_unique[account.account_email,account_email,{id}]'
        ],

        'account_password' => [
            'label' => 'Password',
            'rules' => 'required|alpha_numeric|min_length[4]|max_length[250]'
        ],

        'account_passconf' => [
            'label' => 'Confirm Password',
            'rules' => 'required|matches[account_password]'
        ],

        'account_level' => [
            'label' => 'Level',
            'rules' => 'required|alpha|in_list[root,admin,user]'
        ],

        'account_isactive' => [
            'label' => 'Is Active',
            'rules' => 'required|numeric|max_length[1]|in_list[0,1]'
        ],

        // 'account_image' => [
        //     'label' => 'Image',
        //     'rules' => 'max_size[_image_,2048]|mime_in[_image_,image/png,image/jpg,image/jpeg]|ext_in[_image_,png,jpg,gif,jpeg]|is_image[_image_]'
        // ],
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected $imageRules = [
        '_image_' => [
            'label' => 'Image',
            'rules' => 'max_size[_image_,2048]|mime_in[_image_,image/png,image/jpg,image/jpeg]|ext_in[_image_,png,jpg,gif,jpeg]|is_image[_image_]'
        ],
    ];

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['account_password'])) {
            return $data;
        }

        $data['data']['account_password'] = password_hash($data['data']['account_password'], PASSWORD_BCRYPT);

        return $data;
    }

}
