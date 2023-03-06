<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class NewsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'News'
        ];

        return view('pages/admin/news', $data);
    }

    public function createNews()
    {
        $title = $this->request->getVar('title');
        $content = $this->request->getVar('content');
        $userID = auth()->id();

        $news = new \App\Entities\News();
        $news->userID = $userID;
        $news->title = $title;
        $news->content = $content;

        $newsModel = model(NewsModel::class);
        $newsModel->save($news);
    }
}
