<?php

namespace App\Controllers;

use App\Models\ProductModel;
use \Config\Services;
use Thedudeguy\Rcon;


class Home extends BaseController
{
    public function __construct()
    {
        $this->cache = Services::cache();
        $this->product = new ProductModel();
    }
    private function getProducts(array $select = ['*'], $pid = null)
    {
        if ($pid == null) {
            return $this->product->select($select)->findAll();
        } else {
            return (array) $this->database->table('products')->where('product_key', $pid)->get(1)->getRow();
        }
    }
    private function getNews()
    {
        return (array) $this->database->table('news')
            ->select(['title', 'id'])
            ->orderBy('id DESC')
            ->get(1)
            ->getRow();
    }
    private function getPlayerData()
    {
        $builder = $this->database->table('playerinfo');
        $builder->select('*');
        $builder->where('uid', $this->session->get('uid'));
        $builder->join('authme', 'authme.id = playerinfo.uid');
        return $builder->get()->getRow();
    }
    public function index()
    {
        $topTen = $this->database->table('transactions')
            ->select(['payment_name', 'payment_value', 'authme.username','authme.realname'])
            ->join('authme', 'authme.id = transactions.uid')
            ->where('payment_method', 'Points')
            ->orderBy('transactions.id DESC')
            ->get(10)
            ->getResult();
        echo view('components/header', ['title' => $this->config['site_name'], 'config' => $this->config]);
        echo view('landing', [
            'playerData' => $this->getPlayerData(),
            'products' => $this->getProducts(),
            'news' => $this->getNews(),
            'top10' => $topTen
        ]);
        echo view('components/footer');
    }

    // Cache Data ทุกๆ 1 นาที เรียกเว็บไวมาาาาาาก
    public function serverStatus()
    {
        if (!$status = cache('status')) {
            $data = file_get_contents("https://mcapi.xdefcon.com/server/{$this->config['sv_ip']}/full/json");

            // cache data for 1 min
            cache()->save('status', $data, 60);
        }
        return $this->cache->get('status');
    }
    public function uploadImage()
    {
        $file = $_FILES['source'];
        $target_url = "https://api.codename-t.com/v1/upload/?access_key=abc";
        if (function_exists('curl_file_create')) { // php 5.5+
            $cFile = curl_file_create($file['tmp_name'], $file['type'], $file['name']);
        } else { // 
            $cFile = '@' . realpath($file);
        }
        $post = array('image' => $cFile);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $target_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }
    public function download()
    {
        echo view('components/header', [
            'title' => 'ดาวน์โหลดตัวเกม',
            'config' => $this->config
        ]);
        echo view('download');
        echo view('components/footer');
    }
    public function sendRcon()
    {
        $rcon = new Rcon($this->config['sv_ip'], $this->config['rcon_port'], $this->config['rcon_password'], 5);
        $command = $this->request->getPost('command');
        $player = $this->session->get('uid');

        $player = (array) $this->database->table('authme')->select('username')->where('id', $player)->get(1)->getRow();

        $command = str_replace("[player]", $player['username'], $command);

        try {
            if ($rcon->connect()) {
                $res = ($rcon->sendCommand($command)) ? true : false;
                return $this->response->setJSON(array('success' => $res));
            } else {
                return $this->response->setJSON(array('success' => false));
            }
        } catch (\ErrorException $e) {
            return $this->response->setJSON(array('success' => false));
        }
    }
}
