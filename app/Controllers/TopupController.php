<?php

namespace App\Controllers;

use App\Models\TransactionModel;

class TopupController extends BaseController
{
    public function __construct() {
        $this->trans = new TransactionModel();
    }
    private $twResult;

    private function isTruewalletRedeemedSuccess($walletResult, $statusCode, $uid)
    {
        if (!is_null($walletResult['data']) && $walletResult['data']['voucher']['available'] != 0 && $statusCode == 200) {
            $walletResult = $walletResult['data']['voucher']['amount_baht'];
            $multiplier =  $this->config['coin_multiplier'];
            
            $builder = $this->database->table('playerinfo');
            $builder->set('credits', $walletResult . " + credits");
            $builder->set('credits', intVal($walletResult) * intVal($multiplier) . ' + `credits`', false);
            $builder->where('uid', $uid);

            $transaction_data = [
                'payment_id' => uniqid(),
                'uid' => $this->session->uid,
                'payment_name' => 'เติมเงินผ่าน Truewallet',
                'payment_method' => 'True Wallet',
                'payment_value' => intVal($walletResult)
            ];
            $this->trans->insert($transaction_data);


            $log = $this->database->table('config');
            $log->set('total_income', intVal($walletResult). " + total_income");
            $log->update();
            return $builder->update();
        } else {
            return false;
        }
    }

    // return bool
    private function checkTrueWallet($hash, $phone, $uid)
    {
        if (empty($hash) || empty($phone)) return false;
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://webshop-api.test/api/v1/truewallet/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('phone' => $phone,'url' => $hash),
        ));
        
        $result = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->twResult = json_decode($result, true);
        return $this->isTruewalletRedeemedSuccess($this->twResult, $statusCode, $uid);
    }

    public function redeemWallet()
    {
        $twUrl = $this->request->getPost('twUrl');
        $twPhone = $this->config['tw_phone'];
        $uid = $this->session->get('uid');
        return $this->response->setJSON(['isSuccess' => $this->checkTrueWallet($twUrl, $twPhone, $uid)]);
    }

    public function index()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }
        echo view('components/header',['title' => 'เติมเงินเข้าสู่ระบบ', 'config' => $this->config]);
        echo view('topup', ['coin_multiplier' => $this->config['coin_multiplier']]);
        echo view('components/footer');
    }

    public function history()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }
        echo view('components/header',['title' => 'ประวัติการทำรายการ', 'config' => $this->config]);
        echo view('history', [
            'transaction_data' => $this->viewTransaction($this->session->get('uid'))
        ]);
        echo view('components/footer');
    }

    private function viewTransaction($uid){
        return $this->trans->select('*')->where('uid', $uid)->get()->getResult();
    }
}
