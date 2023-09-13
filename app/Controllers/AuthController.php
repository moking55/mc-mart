<?php

namespace App\Controllers;

use Exception;

class AuthController extends BaseController
{
    public function userLogin()
    {
        $data = array('isSuccess' => false);
        try {
            $userInput = $this->request->getPost();
            $DBSelect = ['id', 'username', 'password', 'isAdmin'];
            $DBData = $this->database->table('authme')
                ->select($DBSelect)
                ->join('playerinfo', 'playerinfo.uid = authme.id')
                ->where('username', $userInput['playerName'])
                ->get(1)
                ->getRow();
            if (!empty($DBData)) {
                if (password_verify($userInput['playerPassword'], $DBData->password)) {
                    $this->session->set('isLogin', 'true');
                    $this->session->set('isAdmin', $DBData->isAdmin);
                    $this->session->set('uid', $DBData->id);
                    $data = array_replace(array('isSuccess' => true));
                }
            }
        } catch (Exception $th) {
        } finally {
            return $this->response->setJSON($data);
        }
    }

    public function login()
    {
        if ($this->session->has('isLogin') && $this->session->get('isLogin') == 'true') {
            return redirect()->to('/');
        }
        echo view('components/header', ['title' => 'เข้าสู่ระบบ','config' => $this->config]);
        echo view('login');
        echo view('components/footer');
    }

    public function logout()
    {
        return $this->session->destroy();
    }
}
