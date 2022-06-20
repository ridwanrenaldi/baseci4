<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->account      = model('App\Models\Account');
    }

    public function login()
    {
        // ===[Setting View]===
        $data['body'] = 'login-page';
        $data['box'] = 'login-box';

        // ===[Login Validation]===
        if ($this->request->getPost()) {
            $username = strtolower($this->request->getPost('_username_'));
            $password = strtolower($this->request->getPost('_password_'));
            $user = $this->account->where('account_username', $username)->first();

            if ($user) {
                if ($user['account_isactive']) {
                    if (password_verify($password, $user['account_password'])) {

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
                        return redirect()->to('admin/dashboard');

                    } else {
                        $notif = [
                            'status'    => 'error', 
                            'title'     => 'Login Failed!',  
                            'message'   => 'The username and password you entered did not match our records. Please double-check and try again.',
                            // 'message'   =>'Incorrect username or password!',
                            // 'message'   =>'Invalid Login Credentials',
                            // 'message'   =>'Please enter a correct username and password!',
                            // 'message'   =>'Please ensure the username and password are valid',
                        ];
                        return redirect()->to('auth/login')->with('notif', $notif);
                    }

                } else {
                    $notif = [
                        'status'    => 'error', 
                        'title'     => 'Login Failed!',  
                        'message'   => 'This username has not been activated, please contact the admin.',
                    ];
                    return redirect()->to('auth/login')->with('notif', $notif);
                }
            } else {
                $notif = [
                    'status'    => 'error', 
                    'title'     => 'Login Failed!',  
                    'message'   => 'The username and password you entered did not match our records. Please double-check and try again.',
                    // 'message'   =>'Incorrect username or password!',
                    // 'message'   =>'Invalid Login Credentials',
                    // 'message'   =>'Please enter a correct username and password!',
                    // 'message'   =>'Please ensure the username and password are valid',
                ];
                return redirect()->to('auth/login')->with('notif', $notif);
            }
        }

        // ===[Load View]===
        return view('auth/login', $data);
    }

    public function register()
    {
        // ===[Setting View]===
        $data['body']   = 'register-page';
        $data['box']    = 'register-box';

        // ===[Insert Logic]===
        if ($this->request->getPost()) {
            // ===[Insert Data To Database]===
            $insert = [
                'account_name'      => $this->request->getPost('_name_'),
                'account_username'  => strtolower($this->request->getPost('_username_')),
                'account_email'     => strtolower($this->request->getPost('_email_')),
                'account_password'  => strtolower($this->request->getPost('_password_')),
                'account_passconf'  => strtolower($this->request->getPost('_passconf_')),
                'account_role'      => 'user',
                'account_isactive'  => true,
                'account_image'     => NULL,
            ];

            if ($this->account->insert($insert) === false) {
                $data['notif'] = [
                    'status'    => 'error', 
                    'title'     => 'Oops...', 
                    'message'   => ListHtml($this->account->errors(), '<ul>', '</ul>')
                ];
                return redirect()->to('auth/register')->with('notif', $data['notif'])->withInput();
            } else {
                

                $data['notif'] = [
                    'status'    => 'success', 
                    'title'     => 'Success!', 
                    'message'   => 'Success insert data',
                ];
                return redirect()->to('auth/login')->with('notif', $data['notif']);
            }
        }

        // ===[Load View]===
        return view('auth/register', $data);
    }

    public function forgot()
    {
        // ===[Setting View]===
        $data['body']   = 'login-page';
        $data['box']    = 'login-box';

        // ===[Load View]===
        return view('auth/forgot', $data);
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('auth/login');
    }
}
