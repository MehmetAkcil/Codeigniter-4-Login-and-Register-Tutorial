<?php

namespace App\Controllers;

use App\Models\usersModel;

class Auth extends BaseController
{
    public function login(): string
    {
        helper(['form', 'url', 'error']);
        return view('Auth/login');
    }

    public function register(): string
    {
        helper(['form', 'url', 'error']);
        return view('Auth/register');
    }

    public function logout()
    {
        session()->remove('userData');
        return redirect()->to(base_url('auth/login'));
    }

    public function loginPost()
    {
        //post
        $request = $this->request;

        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[db_users.user_email]'
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[255]'
            ]
        ]);

        if ($validation) {
            $usersModel = new usersModel();

            $email = $request->getPost('email');
            $password = $request->getPost('password');

            $userData = $usersModel
                ->where('user_email', $email)
                ->where('user_password', md5(sha1($password)))
                ->first();

            if(! $userData){
                return redirect()->to(base_url('auth/login'))->withInput()->with('error', 'Hatali kullanici adi veya parola');
            }

            session()->set('userData', $userData);

            return redirect()->to('panel');

        } else {
            return redirect()->to(base_url('auth/login'))->withInput()->with('validator', $this->validator);
        }
    }

    public function registerPost()
    {
        //post
        $request = $this->request;

        $validation = $this->validate([
            'name' => [
                'rules' => 'required'
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[db_users.user_email]'
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[255]'
            ],
            'repassword' => [
                'rules' => 'required|matches[password]'
            ],
        ]);

        if ($validation) {
            $usersModel = new usersModel();

            $name = $request->getPost('name');
            $email = $request->getPost('email');
            $password = $request->getPost('password');

            $userInsert = $usersModel
                ->insert([
                    'user_name' => $name,
                    'user_email' => $email,
                    'user_password' => md5(sha1($password))
                ]);

            if($userInsert)
            {
                return redirect()->to(base_url('auth/login'))->withInput()->with('success', 'Kayit Islemi Basarili');
            }else{
                return redirect()->to(base_url('auth/register'))->withInput()->with('error', 'Kayit Islemi basarisiz');
            }

        } else {
            return redirect()->to(base_url('auth/register'))->withInput()->with('validator', $this->validator);
        }

    }


}
