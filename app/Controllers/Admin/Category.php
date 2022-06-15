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
        // ===[Load a CSS And JS File]===
        $data['daterange']      = false;
        $data['icheck']         = false;
        $data['colorpicker']    = false;
        $data['select2']        = false;
        $data['inputmask']      = false;
        $data['switch']         = false;
        $data['summernote']     = false;
        $data['datatables']     = true;

        // ===[Setting View]===
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


        $data['data'] = $this->category->findAll();
        // var_dump($data['data']);
        // die;

        // ===[Load View]===
        return view('admin/category/table', $data);
    }



    public function add()
    {
        // ===[Load a CSS And JS File]===
        $data['daterange']      = false;
        $data['icheck']         = false;
        $data['colorpicker']    = false;
        $data['select2']        = false;
        $data['inputmask']      = false;
        $data['switch']         = false;
        $data['summernote']     = false;
        $data['datatables']     = false;

        // ===[Setting View]===
        $data['title'] = 'Form Add';
        $data['cardheader']    = ['title' => 'Form Add'];
        $data['breadcrumb'] = [
            'Category' => site_url('admin/category/index'),
            'Add'   => site_url('admin/category/index'),
        ];

        // ===[Insert Logic]===
        if ($this->request->getPost()) {
            $insert = [
                'category_name' => $this->request->getPost('_name_'),
                'category_description' => $this->request->getPost('_description_')
            ];

            if ($this->category->insert($insert) === false) {
                $data['notif'] = [
                    'status'=>'error', 
                    'title'=>'Oops...', 
                    'message'=>ListHtml($this->category->errors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/category/add')->with('notif', $data['notif'])->withInput();
            } else {
                $data['notif'] = [
                    'status'=>'success', 
                    'title'=>'Success!', 
                    'message'=>'Success insert data', 
                    'redirect'=>site_url('admin/category/table')
                ];
                return redirect()->to('admin/category/add')->with('notif', $data['notif']);
            }
        }


        if ($this->session->has('notif')) {
            $data['notif'] = $this->session->getFlashdata('notif');
        }

        // ===[Load View]===
        return view('admin/category/add', $data);
    }



    public function edit($id)
    {
        // ===[Load a CSS And JS File]===
        $data['daterange']      = false;
        $data['icheck']         = false;
        $data['colorpicker']    = false;
        $data['select2']        = false;
        $data['inputmask']      = false;
        $data['switch']         = false;
        $data['summernote']     = false;
        $data['datatables']     = false;


        // ===[Setting View]===
        $data['title'] = 'Form Add';
        $data['cardheader']    = ['title' => 'Form Add'];
        $data['breadcrumb'] = [
            'Category' => site_url('admin/category/index'),
            'Add'   => site_url('admin/category/index'),
        ];

        // ===[Update Logic]===
        if ($this->request->getPost()) {
            $update = [
                'category_name' => $this->request->getPost('_name_'),
                'category_description' => $this->request->getPost('_description_')
            ];

            if ($this->category->update($id, $update) === false) {
                $data['notif'] = [
                    'status'=>'error', 
                    'title'=>'Oops...', 
                    'message'=>ListHtml($this->category->errors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/category/edit/'.$id)->with('notif', $data['notif'])->withInput();
            } else {
                $data['notif'] = [
                    'status'=>'success', 
                    'title'=>'Success!', 
                    'message'=>'Success insert data', 
                    'redirect'=>site_url('admin/category/table')
                ];
                return redirect()->to('admin/category/edit/'.$id)->with('notif', $data['notif']);
            }
        }

        // ===[Fetch Data To Edit]===
        $data['data'] = $this->category->find($id);
        if (!$data['data']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('ID : '.$id.' Tidak Ditemukan');
        }

        // ===[Get Notif]===
        if ($this->session->has('notif')) {
            $data['notif'] = $this->session->getFlashdata('notif');
        }

        // ===[Load View]===
        return view('admin/category/edit', $data);
    }
}
