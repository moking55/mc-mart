<?php

namespace App\Controllers;

use App\Models\NewsModel;

class NewsController extends BaseController
{
    public function __construct()
    {
        $this->news = new NewsModel();
    }

    public function index()
    {
        echo view('components/header', ['title' => 'ข่าวสาร', 'config' => $this->config]);
        echo view('news', ['newsList' => $this->news->select(['created_at', 'title', 'id'])
        ->orderBy('id', 'DESC')
        ->findAll()]);
        echo view('components/footer');
    }

    public function saveNews()
    {
        $data = $this->request->getPost();
        if (!empty($data['id'])) {
            // Update exist news
            return $this->response->setJSON(['success' => (!empty($data['data']['title']) && !empty($data['data']['content'])) ? $this->news->update($data['id'], $data['data']) : false]);
        } else {

            // Create News
            $data['content'] = htmlspecialchars($data['content']);
            $data['author'] = (array) $this->database->table('authme')
                ->select('realname')
                ->where('id', $this->session->get('uid'))
                ->get(1)
                ->getRow();
            return $this->response->setJSON(['success' => (!empty($data['title']) && !empty($data['content'])) ? $this->news->insert($data, false) : false]);
        }
    }
    public function createNews()
    {
        echo view('components/header');
        echo view('backend/createNews');
        echo view('components/footer');
    }
    public function deleteNews()
    {
        return $this->response->setJSON(['success' => $this->news->delete($this->request->getPost('id'))]);
    }
    public function readNews($newsID)
    {
        $newsContent = (array) $this->news->where('id', $newsID)->first();
        echo view('components/header', ['title' => $newsContent['title'] . ' :: Mc-Mart', 'config' => $this->config]);
        echo view('readNews', ['newsContent' => $newsContent]);
        echo view('components/footer');
    }
}
