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
                $notif = [
                    'status'    => 'error', 
                    'title'     => 'Oops...', 
                    'message'   => ListHtml($this->validator->getErrors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/account/add')->with('notif', $notif)->withInput();

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
                    'account_username'  => strtolower($this->request->getPost('_username_')),
                    'account_email'     => strtolower($this->request->getPost('_email_')),
                    'account_password'  => strtolower($this->request->getPost('_password_')),
                    'account_passconf'  => strtolower($this->request->getPost('_passconf_')),
                    'account_role'      => $this->request->getPost('_role_'),
                    'account_isactive'  => true,
                    'account_image'     => $imgname,
                ];
    
                if ($this->account->insert($insert) === false) {
                    $notif = [
                        'status'    => 'error', 
                        'title'     => 'Oops...', 
                        'message'   => ListHtml($this->account->errors(), '<ul>', '</ul>')
                    ];
                    return redirect()->to('admin/account/add')->with('notif', $notif)->withInput();

                } else {
                    $notif = [
                        'status'    => 'success', 
                        'title'     => 'Success!', 
                        'message'   => 'Success insert data', 
                        'redirect'  => site_url('admin/account/table')
                    ];
                    return redirect()->to('admin/account/add')->with('notif', $notif);
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
                $notif = [
                    'status'    => 'error', 
                    'title'     => 'Oops...', 
                    'message'   => ListHtml($this->validator->getErrors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/account/add')->with('notif', $notif)->withInput();

            } else {
                // ===[Insert Data To Database]===
                $update = [
                    'id'                => $id,
                    'account_name'      => $this->request->getPost('_name_'),
                    'account_username'  => strtolower($this->request->getPost('_username_')),
                    'account_email'     => strtolower($this->request->getPost('_email_')),
                    'account_role'      => $this->request->getPost('_role_'),
                    'account_isactive'  => true,
                ];

                $password = $this->request->getPost('_password_');
                $passconf = $this->request->getPost('_passconf_');
                if (!empty($password) && !empty($passconf)) {
                    $update['account_password'] = strtolower($password);
                    $update['account_passconf'] = strtolower($passconf);
                }
                
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
                    $notif = [
                        'status'    => 'error', 
                        'title'     => 'Oops...', 
                        'message'   => ListHtml($this->account->errors(), '<ul>', '</ul>')
                    ];
                    return redirect()->to('admin/account/edit/'.$id)->with('notif', $notif)->withInput();
                    
                } else {
                    $notif = [
                        'status'    => 'success', 
                        'title'     => 'Success!', 
                        'message'   => 'Success update data', 
                        'redirect'  => site_url('admin/account/table')
                    ];
                    return redirect()->to('admin/account/edit/'.$id)->with('notif', $notif);
                }
            }
        }

        // ===[Fetch Data]===
        $data['data'] = $this->account->find($id);
        if (!$data['data']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // ===[Load View]===
        return view('admin/account/edit', $data);
    }



    public function delete($id){
        // ===[If Data Not Found]===
        if (!$this->account->find($id)) {
            $notif = [
                'status'    => 'error', 
                'title'     => 'Oops...', 
                'message'   => 'Data not found!',
            ];
            return redirect()->to('admin/account/table')->with('notif', $notif);

        // ===[Logic Delete]===
        } else {
            $account = $this->account->find($id);
            delete_file($this->uploaddir.$account['account_image']);

            $this->account->delete($id); // useSoftDeletes = false "Check The Model"

            $notif = [
                'status'    => 'success', 
                'title'     => 'Success!', 
                'message'   => 'Success delete data',
            ];
            return redirect()->to('admin/account/table')->with('notif', $notif);
        }
    }
}
