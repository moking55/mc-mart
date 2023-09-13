<?php

namespace App\Controllers;

class ProfileController extends BaseController
{
    private function findPlayerById($uid) {
        $res = $this->database->table('authme')->select(['username','realName'])->where('id',$uid)->get(1)->getRow();
        return $this->response->setJSON($res);
    }

    public function findPlayerByName($username)
    {
        $res = $this->database->table('authme')
        ->select(['*'])
        ->join('playerinfo', 'playerinfo.uid = authme.id')
        ->where('username',$username)
        ->get(1)
        ->getRow();
        return $this->response->setJSON($res);
    }

    public function searchPlayer()
    {
        return $this->findPlayerById($this->request->getGet('uid'));
    }

    public function searchPlayerName(){
        return $this->findPlayerByName($this->request->getPost('playerName'));
    }
}
