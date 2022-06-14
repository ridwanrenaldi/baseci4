<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function __construct()
    {
        $this->category = model('App\Models\Category');
    }

    public function index()
    {
        $data['path'] = $this->uri->getSegments();
        $data['datatables'] = true;
        $data['title'] = 'Table Data';
        $data['breadcrumb'] = [
            'Category' => site_url('admin/category/index'),
            'Table'   => site_url('admin/category/index'),
        ];
        $data['cardheader']    = [
            'title' => 'Table',
            'url' => site_url('admin/category/add'),
            'name' => 'Add Category',
        ];

        var_dump($this->category->findAll());
        die;

        return view('admin/category/table', $data);
    }

    public function add()
    {
        $data['path'] = $this->uri->getSegments();
        $data['datatables'] = true;
        $data['title'] = 'Form Add';
        $data['breadcrumb'] = [
            'Category' => site_url('admin/category/index'),
            'Add'   => site_url('admin/category/index'),
        ];
        $data['cardheader']    = ['title' => 'Form Add'];


        if ($this->request->getPost()) {
            $insert = [
                'category_name' => $this->request->getVar('_name_'),
                'category_description' => $this->request->getVar('_description_')
            ];


            if ($this->category->save($insert) === false) {
                $data['errors'] = $this->category->errors();
                return view('admin/category/add', $data);

            } else {

                echo "Berhasil Di Simpan";
                // var_dump($insert);
            }
        } else {
            $data['validation'] = $this->validator;
            return view('admin/category/add', $data);
        }
    }

    public function edit()
    {
        $data['path'] = $this->uri->getSegments();
        $data['datatables'] = true;
        $data['title'] = 'Form Add';
        $data['breadcrumb'] = [
            'Category' => site_url('admin/category/index'),
            'Add'   => site_url('admin/category/index'),
        ];
        $data['cardheader']    = ['title' => 'Form Add'];
        return view('admin/category/edit',$data);
    }
}
