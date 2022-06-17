<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'product';
    protected $primaryKey       = 'product_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['category_id', 'product_code', 'product_name', 'product_description', 'product_stock', 'product_capital', 'product_price', 'product_image'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'product_created';
    protected $updatedField  = 'product_modified';
    protected $deletedField  = 'product_deleted';

    // Validation
    protected $validationRules      = [
        'category_id' => [
            'label' => 'Category',
            'rules' => 'required|numeric|max_length[11]'
        ],

        'product_code' => [
            'label' => 'Code',
            'rules' => 'required|alpha_numeric|max_length[50]'
        ],

        'product_name' => [
            'label' => 'Name',
            'rules' => 'required|alpha_numeric_punct|max_length[250]'
        ],

        'product_description' => [
            'label' => 'Description',
            'rules' => 'required|alpha_numeric_punct|max_length[250]'
        ],

        'product_stock' => [
            'label' => 'Stock',
            'rules' => 'required|numeric|max_length[20]'
        ],

        'product_capital' => [
            'label' => 'Capital',
            'rules' => 'required|numeric|max_length[20]'
        ],

        'product_price' => [
            'label' => 'Price',
            'rules' => 'required|numeric|max_length[20]'
        ],

        // 'product_image' => [
        //     'label' => 'Image',
        //     'rules' => 'uploaded[_image_]|max_size[_image_,2048]|mime_in[_image_,image/png,image/jpg]|ext_in[_image_,png,jpg,gif]|is_image[_image_]'
        // ],
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    
    protected $imageRules = [
        '_image_' => [
            'label' => 'Image',
            'rules' => 'max_size[_image_,2048]|mime_in[_image_,image/png,image/jpg,image/jpeg]|ext_in[_image_,png,jpg,gif,jpeg]|is_image[_image_]'
        ],
    ];


}
