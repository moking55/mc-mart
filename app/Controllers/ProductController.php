<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CouponModel;
use App\Models\TransactionModel;
use Thedudeguy\Rcon;


class ProductController extends BaseController
{
    public function __construct()
    {
        $this->product = new ProductModel();
        $this->trans = new TransactionModel();
    }
    private function getProducts(array $select = ['*'], $pid = null)
    {
        if ($pid == null) {
            return $this->product->select($select)->findAll();
        } else {
            return (array) $this->database->table('products')->where('product_key', $pid)->get(1)->getRow();
        }
    }
    public function buyItem()
    {
        echo view('components/header', ['title' => 'ยืนยันการซื้อสินค้า', 'config' => $this->config]);
        echo view('buyItem', ['product' => $this->getProducts(['*'], $this->request->getGet('pid'))]);
        echo view('components/footer');
    }
    public function buyItemPoints()
    {
        $command = $this->request->getPost();
        $product = (array) $this->product->select(['product_name', 'product_command', 'product_price'])->where('product_key', $command['key'])->first();
        $checkPoint = (array) $this->database->table('playerinfo')
            ->select('credits')
            ->where('uid', $this->session->get('uid'))
            ->get(1)->getRow();

        if (intVal($checkPoint['credits']) < intVal($product['product_price'])) {
            return $this->response->setJSON(array('success' => 'tw'));
        } else {
            if ($this->sendRcon($product['product_command'])) {
                $builder = $this->database->table('playerinfo');
                $builder->set('credits', intVal($checkPoint['credits']) - intVal($product['product_price']));
                $builder->where('uid', $this->session->get('uid'))->update();
                $transaction_data = [
                    'payment_id' => uniqid(),
                    'uid' => $this->session->uid,
                    'payment_name' => 'ซื้อสินค้า ' . $product['product_name'],
                    'payment_method' => 'Points',
                    'payment_value' => $product['product_price']
                ];
                $this->trans->insert($transaction_data);
                return $this->response->setJSON(array('success' => true));
            } else {
                return $this->response->setJSON(array('success' => false));
            }
        }
    }
    public function sendRcon($command)
    {
        $rcon = new Rcon($this->config['sv_ip'], $this->config['rcon_port'], $this->config['rcon_password'], 5);
        $player = $this->session->get('uid');

        $player = (array) $this->database->table('authme')->select('username')->where('id', $player)->get(1)->getRow();

        $command = str_replace("[player]", $player['username'], $command);

        try {
            if ($rcon->connect()) {
                $rcon->sendCommand($command);
                return true;
            } else {
                return false;
            }
        } catch (\ErrorException $e) {
            return false;
        }
    }

    public function redeemCoupon()
    {
        $coupon = new CouponModel();
        $data = $this->request->getPost();

        $query = $coupon->where('coupon_code', $data['code'])->first();
        if (!empty($query) && $query['active'] == '1') {
            if ($coupon->update($query['id'], ['active' => 0])) {
                $code = $coupon->select('coupon_action')->where('coupon_code', $data['code'])->first();
                if ($this->sendRcon($code['coupon_action']) == true) {
                    $transaction_data = [
                        'payment_id' => uniqid(),
                        'uid' => $this->session->uid,
                        'payment_name' => 'ใช้โค้ด ' . $query['coupon_code'],
                        'payment_method' => 'Redeem Code',
                        'payment_value' => 0
                    ];
                    $this->trans->insert($transaction_data);
                    return $this->response->setJSON(['success' => true, 'message' => 'ใช้โค้ดเรียบร้อยแล้วขอให้สนุก!']);
                } else {
                    $coupon->update($query['id'], ['active' => 1]);
                    return $this->response->setJSON(['success' => false, 'message' => 'ไม่สามารถเชื่อมต่อกับหลังบ้านได้']);
                }
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'มีบางอย่างผิดปกติโปรดลองอีกครั้ง!']);
            }
            return $this->response->setJSON(true);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'โค้ดไม่มีอยู่หรือถูกใช้ไปแล้ว']);
        }
    }
}
