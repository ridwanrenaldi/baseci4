<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Account extends BaseController
{
    public function __construct()
    {
        $this->account      = model('App\Models\Account');
        $this->uploaddir    = WRITEPATH . 'uploads/account/';
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
            'Account'   => site_url('admin/account/index'),
            'Table'     => site_url('admin/account/index'),
        ];
        $data['cardheader'] = [
            'title'     => 'Table',
            'url'       => site_url('admin/account/add'),
            'name'      => 'Add Account',
        ];


        // ===[Fetch Data]===
        $data['data'] = $this->account->findAll();

        // ===[Load View]===
        return view('admin/account/table', $data);
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
            'Account'   => site_url('admin/account/index'),
            'Add'       => site_url('admin/account/index'),
        ];


        // ===[Insert Logic]===
        if ($this->request->getPost()) {

            // ===[Validate Image]===
            if (!$this->validate($this->account->imageRules)) {
                $data['notif'] = [
                    'status'    =>'error', 
                    'title'     =>'Oops...', 
                    'message'   =>ListHtml($this->validator->getErrors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/account/add')->with('notif', $data['notif'])->withInput();

            } else {
                // ===[Save Image]===
                $image = $this->request->getFile('_image_');
                $imgname = NULL;

                if ($image->isValid() && !$image->hasMoved()) {
                    $imgname = $image->getRandomName();
                    $image->move($this->uploaddir, $imgname);
                }
                
                // ===[Insert Data To Database]===
                $insert = [
                    'account_name'      => $this->request->getPost('_name_'),
                    'account_username'  => $this->request->getPost('_username_'),
                    'account_email'     => $this->request->getPost('_email_'),
                    'account_password'  => $this->request->getPost('_password_'),
                    'account_passconf'  => $this->request->getPost('_passconf_'),
                    'account_level'     => $this->request->getPost('_level_'),
                    'account_isactive'  => true,
                    'account_image'     => $imgname,
                ];
    
                if ($this->account->insert($insert) === false) {
                    $data['notif'] = [
                        'status'    =>'error', 
                        'title'     =>'Oops...', 
                        'message'   =>ListHtml($this->account->errors(), '<ul>', '</ul>')
                    ];
                    return redirect()->to('admin/account/add')->with('notif', $data['notif'])->withInput();
                } else {
                    

                    $data['notif'] = [
                        'status'    =>'success', 
                        'title'     =>'Success!', 
                        'message'   =>'Success insert data', 
                        'redirect'  =>site_url('admin/account/table')
                    ];
                    return redirect()->to('admin/account/add')->with('notif', $data['notif']);
                }
            }
        }

        // ===[Load View]===
        return view('admin/account/add', $data);
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
            'Account'   => site_url('admin/account/index'),
            'Edit'      => site_url('admin/account/index'),
        ];

        // ===[Update Logic]===
        if ($this->request->getPost()) {

            // ===[Validate Image]===
            if (!$this->validate($this->account->imageRules)) {
                $data['notif'] = [
                    'status'    =>'error', 
                    'title'     =>'Oops...', 
                    'message'   =>ListHtml($this->validator->getErrors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/account/add')->with('notif', $data['notif'])->withInput();

            } else {
                
                // ===[Insert Data To Database]===
                $update = [
                    'category_id'           => $this->request->getPost('_category_'),
                    'account_name'          => $this->request->getPost('_name_'),
                    'account_description'   => $this->request->getPost('_description_'),
                    'account_stock'         => $this->request->getPost('_stock_'),
                    'account_capital'       => $this->request->getPost('_capital_'),
                    'account_price'         => $this->request->getPost('_price_'),
                ];
                
                // ===[Save Image If Uploaded]===
                $image = $this->request->getFile('_image_');
                if ($image->isValid() && !$image->hasMoved()) {
                    $imgname = $image->getRandomName();
                    $update['account_image'] = $imgname;
                    $image->move($this->uploaddir, $imgname);

                    $account = $this->account->find($id);
                    delete_file($this->uploaddir.$account['account_image']);
                }

    
                if ($this->account->update($id, $update) === false) {
                    $data['notif'] = [
                        'status'    =>'error', 
                        'title'     =>'Oops...', 
                        'message'   =>ListHtml($this->account->errors(), '<ul>', '</ul>')
                    ];
                    return redirect()->to('admin/account/add')->with('notif', $data['notif'])->withInput();
                } else {
                    

                    $data['notif'] = [
                        'status'    =>'success', 
                        'title'     =>'Success!', 
                        'message'   =>'Success insert data', 
                        'redirect'  =>site_url('admin/account/table')
                    ];
                    return redirect()->to('admin/account/add')->with('notif', $data['notif']);
                }
            }
        }

        // ===[Fetch Data]===
        $data['data'] = $this->account->find($id);
        if (!$data['data']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('ID : '.$id.' Not Found');
        }

        // ===[Load View]===
        return view('admin/account/edit', $data);
    }



    public function delete($id){
        // ===[If Data Not Found]===
        if (!$this->account->find($id)) {
            $data['notif'] = [
                'status'    =>'error', 
                'title'     =>'Oops...', 
                'message'   =>'Data not found!',
            ];
            return redirect()->to('admin/account/table')->with('notif', $data['notif']);

        // ===[Logic Delete]===
        } else {
            $account = $this->account->find($id);
            delete_file($this->uploaddir.$account['account_image']);

            $this->account->delete($id); // useSoftDeletes = false "Check The Model"

            $data['notif'] = [
                'status'    =>'success', 
                'title'     =>'Success!', 
                'message'   =>'Success delete data',
            ];
            return redirect()->to('admin/account/table')->with('notif', $data['notif']);
        }
    }
}
