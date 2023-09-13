<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\NewsModel;
use App\Models\CouponModel;
use CodeIgniter\Files\File;
use Thedudeguy\Rcon;

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->product =  new ProductModel();
        $this->news  = new NewsModel();
        $this->coupons = new CouponModel();
    }
    private function selectWidget($widget)
    {
        switch ($widget) {
            case 'products':
                $widget = (!empty($pid = $this->request->getGet('edit'))) ? $widget = view('backend/widgets/editProduct', ['product' => $this->getProducts(['*'], $pid)]) : $widget = view('backend/widgets/products', ['products' => $this->getProducts()]);
                break;
            case 'annoucements':
                $widget = (!empty($id = $this->request->getGet('edit'))) ? $widget = view('backend/widgets/editNews', ['data' => $this->news->find($id)]) : $widget = view('backend/widgets/news', ['data' => $this->news->findAll()]);
                break;
            case 'members':
                $widget = view('backend/widgets/members');
                break;
            case 'addProduct':
                $widget = view('backend/widgets/addProduct');
                break;
            case 'addNews':
                $widget = view('backend/widgets/addNews');
                break;
            case 'addCoupon':
                $widget = view('backend/widgets/addCoupon');
                break;
            case 'coupons':
                $widget = view('backend/widgets/editCoupon', ['data' => $this->coupons->where('active', 1)->findAll()]);
                break;
            case 'webSettings':
                $widget = view('backend/widgets/webSettings', ['config' => $this->config]);
                break;
            case 'topupSettings':
                $widget = view('backend/widgets/topupSettings', ['config' => $this->config]);
                break;
            case 'serverSettings':
                $widget = view('backend/widgets/serverSettings', ['config' => $this->config]);
                break;
            case 'systemInfo':
                $widget = view('backend/widgets/systemInfo');
                break;
            default:
                $widget = view('backend/widgets/main', ['players' => $this->database->table('authme')->countAll(), 'income' => (array) $this->database->table('config')->select('total_income')->get(1)->getRow()]);
                break;
        }
        return $widget;
    }
    private function getProducts(array $select = ['*'], $pid = null)
    {
        if ($pid == null) {
            return $this->product->select($select)->findAll();
        } else {
            return (array) $this->database->table('products')->where('pid', $pid)->get(1)->getRow();
        }
    }
    public function index()
    {

        echo view('components/header', ['title' => 'ระบบหลังร้าน', 'config' => $this->config]);
        echo view('backend/index', [
            'page' => $this->selectWidget($this->request->getGet('page')),
        ]);

        echo view('components/footer');
    }
    public function transactions($uid)
    {
        $res = $this->database->table('transactions')
            ->select(['*'])
            ->where('uid', $uid)
            ->get()
            ->getResult();
        echo view('backend/trans', ['trans' => $res]);
    }
    public function updateCredits()
    {
        $credit = $this->request->getPost('credits');
        $uid = $this->request->getPost('uid');
        $query = $this->database->table('playerinfo')
            ->set('credits', $credit)
            ->where('uid', $uid)
            ->update();
        return $this->response->setJSON(['success' => $query]);
    }
    public function updateWebSettings()
    {
        $data = $this->request->getPost();
        if (!empty($data['downloadContent'])) {
            # Escape download page only
            $data['downloadContent'] = esc($data['downloadContent']);
        }
        $res = $this->database->table('config')->update($data);

        $this->updateCache();
        return $this->response->setJSON(['success' => $res]);
    }
    public function addProduct()
    {
        $data = $this->request->getPost();
        $data['product_key'] = uniqid("PROD_");
        return $this->response->setJSON(['success' => (!empty($data['product_name']) && !empty($data['product_command'])) ? $this->product->insert($data, false) : false]);
    }
    public function editProduct()
    {
        $data = $this->request->getPost();
        return $this->response->setJSON(['success' => !empty($data['data']['product_name']) && !empty($data['data']['product_command']) ? $this->product->update($data['pid'], $data['data']) : false]);
    }
    public function removeProduct()
    {
        $product = $this->request->getPost('pid');
        return $this->response->setJSON(['success' => $this->product->delete($product)]);
    }
    public function rconTestConnect()
    {
        $host = $this->config['sv_ip']; // Server host name or IP
        $port = $this->request->getGet('rcon_port');                      // Port rcon is listening on
        $password = $this->request->getGet('rcon_password'); // rcon.password setting set in server.properties
        $timeout = 3;                       // How long to timeout.
        $rcon = new Rcon($host, $port, $password, $timeout);
        return $this->response->setJSON(['success' => $rcon->connect()]);
    }
    public function addCoupon()
    {
        $data = $this->request->getPost();
        $data['coupon_code'] = bin2hex(random_bytes(10));
        $data['active'] = 1;

        return $this->response->setJSON(['success' => !empty($data['coupon_title']) && !empty($data['coupon_action']) ? $this->coupons->insert($data, false) : false]);
    }
    public function deleteCoupon()
    {
        $data = $this->request->getPost('id');
        return $this->response->setJSON(['success' => $this->coupons->delete($data)]);
    }
    public function saveLogo()
    {
        $fileName  =  $_FILES['logo']['name'];
        $tempPath  =  $_FILES['logo']['tmp_name'];
        $fileSize  =  $_FILES['logo']['size'];

        $type = $this->request->getPost('type');

        if (empty($fileName)) {
            $res = [
                "message" => "โปรดเลือกรูปภาพที่จะอัพโหลด", "status" => false
            ];

            $errorMSG = json_encode($res);
            echo $errorMSG;
        } else {
            $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/img/'; // set upload folder path 

            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // get image extension

            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
            if (in_array($fileExt, $valid_extensions)) {
                if ($type == "logo") {
                    $newfilename = "logo.png";
                } else if ($type == "bg") {
                    $newfilename = "background.png";
                } else if ($type == "article") {
                    $newfilename = "newsBackground.png";
                } else if ($type == "banner") {
                    $newfilename = "banner.png";
                }
                if ($fileSize < 5000000) {
                    move_uploaded_file($tempPath, $upload_path . $newfilename); // move file from system temporary path to our upload folder path 
                } else {
                    $errorMSG = json_encode(array("message" => "ไฟล์ใหญ่เกิน 5 MB", "status" => false));
                    echo $errorMSG;
                }
            } else {
                $errorMSG = json_encode(array("message" => "สามารถอัพโหลด JPG, JPEG, PNG & GIF เท่านั้น", "status" => false));
                echo $errorMSG;
            }
        }

        if (!isset($errorMSG)) {
            echo json_encode(array('status' => true));
        }
    }
}
