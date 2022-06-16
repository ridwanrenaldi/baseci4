<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Product extends BaseController
{
    public function __construct()
    {
        $this->category = model('App\Models\Category');
        $this->product  = model('App\Models\Product');
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
            'Product'   => site_url('admin/product/index'),
            'Table'     => site_url('admin/product/index'),
        ];
        $data['cardheader'] = [
            'title'     => 'Table',
            'url'       => site_url('admin/product/add'),
            'name'      => 'Add Product',
        ];


        // ===[Fetch Data]===
        $data['data'] = $this->product->findAll();

        // ===[Load View]===
        return view('admin/product/table', $data);
    }



    public function add()
    {
        // ===[Load a CSS And JS File]===
        $data['daterange']      = false;
        $data['icheck']         = false;
        $data['colorpicker']    = false;
        $data['select2']        = true;
        $data['inputmask']      = true;
        $data['switch']         = false;
        $data['summernote']     = false;
        $data['datatables']     = false;

        // ===[Setting View]===
        $data['title']          = 'Form Add';
        $data['cardheader']     = ['title' => 'Form Input'];
        $data['breadcrumb']     = [
            'Product'   => site_url('admin/product/index'),
            'Add'       => site_url('admin/product/index'),
        ];


        // ===[Insert Logic]===
        if ($this->request->getPost()) {

            $rules = [
                '_image_' => [
                    'label' => 'Image',
                    'rules' => 'uploaded[_image_]|max_size[_image_,2048]|mime_in[_image_,image/png,image/jpg]|ext_in[_image_,png,jpg,gif]|is_image[_image_]'
                ],
            ];

            if (!$this->validate($rules)) {
                $data['notif'] = [
                    'status'    =>'error', 
                    'title'     =>'Oops...', 
                    'message'   =>ListHtml($this->validator->getErrors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/product/add')->with('notif', $data['notif']);

            } else {
                $image = $this->request->getFile('_image_');
                $imgname = $image->getRandomName();
                if ($image->isValid() && !$image->hasMoved()) {
                    $image->move(WRITEPATH . 'uploads/product');
                }
                
                $insert = [
                    'category_id'           => $this->request->getPost('_category_'),
                    'product_code'          => strtoupper(bin2hex(random_bytes(3))),
                    'product_name'          => $this->request->getPost('_name_'),
                    'product_description'   => $this->request->getPost('_description_'),
                    'product_stock'         => $this->request->getPost('_stock_'),
                    'product_capital'       => $this->request->getPost('_capital_'),
                    'product_price'         => $this->request->getPost('_price_'),
                    'product_image'         => $imgname,
                ];
    
                // dd($insert);


                if ($this->product->insert($insert) === false) {
                    $data['notif'] = [
                        'status'    =>'error', 
                        'title'     =>'Oops...', 
                        'message'   =>ListHtml($this->product->errors(), '<ul>', '</ul>')
                    ];
                    return redirect()->to('admin/product/add')->with('notif', $data['notif'])->withInput();
                } else {
                    

                    $data['notif'] = [
                        'status'    =>'success', 
                        'title'     =>'Success!', 
                        'message'   =>'Success insert data', 
                        'redirect'  =>site_url('admin/product/table')
                    ];
                    return redirect()->to('admin/product/add')->with('notif', $data['notif']);
                }
            }
        }


        // ===[Fetch Data]===
        $data['category'] = $this->category->findAll();

        // ===[Load View]===
        return view('admin/product/add', $data);
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
            'Product'   => site_url('admin/product/index'),
            'Edit'      => site_url('admin/product/index'),
        ];

        // ===[Update Logic]===
        if ($this->request->getPost()) {
            $update = [
                'product_code'          => '',
                'product_name'          => $this->request->getPost('_name_'),
                'product_description'   => $this->request->getPost('_description_'),
                'product_stock'         => $this->request->getPost('_stock_'),
                'product_capital'       => $this->request->getPost('_capital_'),
                'product_price'         => $this->request->getPost('_price_'),
                'product_image'         => $this->request->getPost('_image_'),
            ];

            if ($this->product->update($id, $update) === false) {
                $data['notif'] = [
                    'status'    =>'error', 
                    'title'     =>'Oops...', 
                    'message'   =>ListHtml($this->product->errors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/product/edit/'.$id)->with('notif', $data['notif'])->withInput();
            } else {
                $data['notif'] = [
                    'status'    =>'success', 
                    'title'     =>'Success!', 
                    'message'   =>'Success update data', 
                    'redirect'  =>site_url('admin/product/table')
                ];
                return redirect()->to('admin/product/edit/'.$id)->with('notif', $data['notif']);
            }
        }

        // ===[Fetch Data To Edit]===
        $data['data'] = $this->product->find($id);
        if (!$data['data']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('ID : '.$id.' Tidak Ditemukan');
        }

        // ===[Load View]===
        return view('admin/product/edit', $data);
    }



    public function delete($id){
        // ===[If Data Not Found]===
        if (!$this->product->find($id)) {
            $data['notif'] = [
                'status'    =>'error', 
                'title'     =>'Oops...', 
                'message'   =>'Data not found!',
            ];
            return redirect()->to('admin/product/table')->with('notif', $data['notif']);

        // ===[Logic Delete]===
        } else {
            $this->product->delete($id); // useSoftDeletes = true "Check The Model"

            // Cleans out the database table by permanently removing all rows that have ‘deleted_at IS NOT NULL’.
            $this->product->purgeDeleted();

            $data['notif'] = [
                'status'    =>'success', 
                'title'     =>'Success!', 
                'message'   =>'Success delete data',
            ];
            return redirect()->to('admin/product/table')->with('notif', $data['notif']);
        }
    }
}
