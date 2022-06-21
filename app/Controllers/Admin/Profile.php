<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->account      = model('App\Models\Account');
        $this->uploaddir    = WRITEPATH . 'uploads/account/';
    }


    private function refreshSession($id)
    {
        $user = $this->account->find($id);

        if (strpos($user['account_image'], 'default') || empty($user['account_image'])) {
            $imgurl = base_url('images/account/default.png');
        } else {
            $imgurl = site_url('uploads/account/'.$user['account_image']);
        }

        $session = [
            'id'            => $user['account_id'],
            'name'          => $user['account_name'],
            'username'      => $user['account_username'],
            'email'         => $user['account_email'],
            'role'          => $user['account_role'],
            'created'       => $user['account_created'],
            'imageurl'      => $imgurl,
            'isLoggedIn'    => true,
        ];

        session()->set($session);
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
        $data['datatables']     = false;

        // ===[Setting View]===
        $data['title']          = 'My Profile';
        $data['breadcrumb']     = [
            'Profile'  => site_url('admin/profile/info'),
            'Info'     => site_url('admin/profile/info'),
        ];


        // ===[Fetch Data To Edit]===
        $data['data'] = $this->account->find(session()->get('id'));
        if (!$data['data']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // ===[Load View]===
        return view('admin/profile/info', $data);
    }


    public function edit(){
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
        $data['title']          = 'Edit Profile';
        $data['breadcrumb']     = [
            'Profile'  => site_url('admin/profile/info'),
            'Edit'     => site_url('admin/profile/info'),
        ];
        $data['cardheader']     = ['title' => 'Form Input'];


        // ===[Fetch Data To Edit]===
        $id = session()->get('id');
        $data['data'] = $this->account->find($id);
        if (!$data['data']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }


        // ===[Update Logic]===
        if ($this->request->getPost()) {

            // ===[Validate Image]===
            if (!$this->validate($this->account->imageRules)) {
                $notif = [
                    'status'    => 'error', 
                    'title'     => 'Oops...', 
                    'message'   => ListHtml($this->validator->getErrors(), '<ul>', '</ul>')
                ];
                return redirect()->to('admin/profile/edit')->with('notif', $notif)->withInput();

            } else {
                // ===[Insert Data To Database]===
                $update = [
                    'id'                => $id,
                    'account_name'      => $this->request->getPost('_name_'),
                    'account_username'  => strtolower($this->request->getPost('_username_')),
                    'account_email'     => strtolower($this->request->getPost('_email_')),
                    'account_isactive'  => true,
                ];

                $password = strtolower($this->request->getPost('_password_'));
                $passconf = strtolower($this->request->getPost('_passconf_'));
                if (!empty($password) && !empty($passconf)) {
                    $update['account_password'] = $password;
                    $update['account_passconf'] = $passconf;
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
                    return redirect()->to('admin/profile/edit')->with('notif', $notif)->withInput();
                    
                } else {
                    $notif = [
                        'status'    => 'success', 
                        'title'     => 'Success!', 
                        'message'   => 'Success update data',
                    ];
                    $this->refreshSession($id);
                    return redirect()->to('admin/profile/edit')->with('notif', $notif);
                }
            }
        }

        // ===[Load View]===
        return view('admin/profile/edit', $data);
    }
}
