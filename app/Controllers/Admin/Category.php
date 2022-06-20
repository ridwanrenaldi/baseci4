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
        $data['title']          = 'Table Data';
        $data['breadcrumb']     = [
            'Category'  => site_url('admin/category/index'),
            'Table'     => site_url('admin/category/index'),
        ];
        $data['cardheader']     = [
            'title'     => 'Table',
            'url'       => site_url('admin/category/add'),
            'name'      => 'Add Category',
        ];


        // ===[Fetch Data]===
        $data['data'] = $this->category->findAll();

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
        $data['title']          = 'Form Add';
        $data['cardheader']     = ['title' => 'Form Input'];
        $data['breadcrumb']     = [
            'Category'  => site_url('admin/category/index'),
            'Add'       => site_url('admin/category/index'),
        ];

        // ===[Insert Logic]===
        if ($this->request->getPost()) {
            $insert = [
                'category_name'         => $this->request->getPost('_name_'),
                'category_description'  => $this->request->getPost('_description_')
            ];

            if ($this->category->insert($insert) === false) {
                $notif = [
                    'status'    => 'error', 
                    'title'     => 'Oops...', 
                    'message'   => ListHtml($this->category->errors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/category/add')->with('notif', $notif)->withInput();

            } else {
                $notif = [
                    'status'    => 'success', 
                    'title'     => 'Success!', 
                    'message'   => 'Success insert data', 
                    'redirect'  => site_url('admin/category/table')
                ];
                return redirect()->to('admin/category/add')->with('notif', $notif);
            }
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
        $data['title']          = 'Form Edit';
        $data['cardheader']     = ['title' => 'Form Input'];
        $data['breadcrumb']     = [
            'Category'  => site_url('admin/category/index'),
            'Edit'      => site_url('admin/category/index'),
        ];

        // ===[Update Logic]===
        if ($this->request->getPost()) {
            $update = [
                'category_name'         => $this->request->getPost('_name_'),
                'category_description'  => $this->request->getPost('_description_')
            ];

            if ($this->category->update($id, $update) === false) {
                $notif = [
                    'status'    => 'error', 
                    'title'     => 'Oops...', 
                    'message'   => ListHtml($this->category->errors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/category/edit/'.$id)->with('notif', $notif)->withInput();

            } else {
                $notif = [
                    'status'    => 'success', 
                    'title'     => 'Success!', 
                    'message'   => 'Success update data', 
                    'redirect'  => site_url('admin/category/table')
                ];
                return redirect()->to('admin/category/edit/'.$id)->with('notif', $notif);
            }
        }

        // ===[Fetch Data To Edit]===
        $data['data'] = $this->category->find($id);
        if (!$data['data']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // ===[Load View]===
        return view('admin/category/edit', $data);
    }


    
    public function delete($id){
        // ===[If Data Not Found]===
        if (!$this->category->find($id)) {
            $notif = [
                'status'    => 'error', 
                'title'     => 'Oops...', 
                'message'   => 'Data not found!',
            ];
            return redirect()->to('admin/category/table')->with('notif', $notif);

        // ===[Logic Delete]===
        } else {
            $this->category->delete($id); // useSoftDeletes = false "Check The Model"

            $notif = [
                'status'    => 'success', 
                'title'     => 'Success!', 
                'message'   => 'Success delete data',
            ];
            return redirect()->to('admin/category/table')->with('notif', $notif);
        }
    }
}
